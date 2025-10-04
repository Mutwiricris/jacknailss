<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use App\Models\TimeSlot;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'total_bookings' => Booking::count(),
            'pending_bookings' => Booking::where('status', 'pending')->count(),
            'confirmed_bookings' => Booking::where('status', 'confirmed')->count(),
            'completed_bookings' => Booking::where('status', 'completed')->count(),
            'total_revenue' => Payment::where('status', 'completed')->sum('amount'),
            'pending_payments' => Payment::where('status', 'pending')->sum('amount'),
            'total_services' => Service::count(),
            'available_slots' => TimeSlot::where('status', 'available')->count(),
        ];

        $recent_bookings = Booking::with(['servicesWithDetails', 'payments'])
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        $upcoming_appointments = Booking::where('appointment_date', '>=', Carbon::today())
            ->where('status', '!=', 'cancelled')
            ->orderBy('appointment_date')
            ->orderBy('start_time')
            ->limit(10)
            ->get();

        return view('dashboard', compact('stats', 'recent_bookings', 'upcoming_appointments'));
    }

    public function bookings()
    {
        $bookings = Booking::with(['servicesWithDetails', 'payments'])
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('admin.bookings.index', compact('bookings'));
    }

    public function bookingShow($id)
    {
        $booking = Booking::with(['servicesWithDetails', 'payments'])->findOrFail($id);
        return view('admin.bookings.show', compact('booking'));
    }

    public function bookingUpdate(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $oldStatus = $booking->status;
        
        $validated = $request->validate([
            'status' => 'required|in:pending,confirmed,completed,cancelled',
            'notes' => 'nullable|string|max:1000'
        ]);

        $booking->update($validated);

        // Update timeslot availability when booking is completed or cancelled
        if (($validated['status'] === 'completed' || $validated['status'] === 'cancelled') && $oldStatus !== $validated['status']) {
            TimeSlot::where('booking_id', $booking->id)
                ->update(['status' => 'available', 'booking_id' => null]);
        }
        // Mark timeslot as booked when status changes to confirmed
        elseif ($validated['status'] === 'confirmed' && $oldStatus !== 'confirmed') {
            $timeSlot = TimeSlot::where('date', $booking->appointment_date)
                ->where('start_time', $booking->start_time)
                ->where('end_time', $booking->end_time)
                ->first();
            
            if ($timeSlot) {
                $timeSlot->update(['status' => 'booked', 'booking_id' => $booking->id]);
            }
        }

        return redirect()->route('admin.bookings.show', $booking->id)
            ->with('success', 'Booking updated successfully');
    }

    public function services()
    {
        return view('admin.services.index');
    }

    public function servicesCreate()
    {
        return view('admin.services.create');
    }

    public function servicesStore(Request $request)
    {
        return $this->serviceStore($request);
    }

    public function serviceStore(Request $request)
    {
        try {
            // Handle checkbox for is_popular
            $requestData = $request->all();
            $requestData['is_popular'] = $request->has('is_popular') ? 1 : 0;

            // Validate form data
            $validated = Validator::make($requestData, [
                'name' => 'required|string|max:255',
                'description' => 'nullable|string|max:1000',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
                'price' => 'required|numeric|min:0|max:999999.99',
                'duration_minutes' => 'required|integer|min:1|max:480',
                'is_popular' => 'boolean'
            ])->validate();

            // Handle image upload
            $imagePath = $this->handleImageUpload($request, 'image');
            if ($imagePath) {
                $validated['image'] = $imagePath;
            }

            // Set default status
            $validated['status'] = 'active';

            // Create service
            $service = Service::create($validated);

            return redirect()->route('admin.services')
                ->with('success', 'Service created successfully');

        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Exception $e) {
            Log::error('Service creation failed: ' . $e->getMessage());
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to create service: ' . $e->getMessage());
        }
    }


    public function serviceUpdate(Request $request, $id)
    {
        try {
            $service = Service::findOrFail($id);

            // Handle checkbox for is_popular
            $requestData = $request->all();
            $requestData['is_popular'] = $request->has('is_popular') ? 1 : 0;

            // Validate form data
            $validated = Validator::make($requestData, [
                'name' => 'required|string|max:255',
                'description' => 'nullable|string|max:1000',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
                'price' => 'required|numeric|min:0|max:999999.99',
                'duration_minutes' => 'required|integer|min:1|max:480',
                'is_popular' => 'boolean'
            ])->validate();

            // Handle image upload and deletion
            $imagePath = $this->handleImageUpload($request, 'image', $service->image);
            if ($imagePath !== null) {
                $validated['image'] = $imagePath;
            }

            // Update service
            $service->update($validated);

            return redirect()->route('admin.services')
                ->with('success', 'Service updated successfully');

        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Exception $e) {
            Log::error('Service update failed: ' . $e->getMessage());
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to update service: ' . $e->getMessage());
        }
    }


    public function serviceDestroy($id)
    {
        try {
            $service = Service::findOrFail($id);
            
            // Delete associated image if it exists
            if ($service->image && Storage::disk('public')->exists($service->image)) {
                Storage::disk('public')->delete($service->image);
                Log::info("Deleted image for service '{$service->name}': {$service->image}");
            }
            
            $service->delete();

            return redirect()->route('admin.services')
                ->with('success', 'Service deleted successfully');
                
        } catch (\Exception $e) {
            Log::error('Service deletion failed: ' . $e->getMessage());
            return redirect()->route('admin.services')
                ->with('error', 'Failed to delete service: ' . $e->getMessage());
        }
    }

    public function timeSlots()
    {
        // Get time slots for the current week and upcoming weeks
        $timeSlots = TimeSlot::with(['booking' => function($query) {
                $query->select('id', 'client_name', 'client_phone', 'status');
            }])
            ->where('date', '>=', now()->startOfWeek())
            ->orderBy('date', 'asc')
            ->orderBy('start_time', 'asc')
            ->paginate(50);

        return view('admin.timeslots.index', compact('timeSlots'));
    }

    public function timeSlotsGenerate(Request $request)
    {
        $validated = $request->validate([
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'slot_duration' => 'required|integer|min:15|max:240'
        ]);

        $startDate = Carbon::parse($validated['start_date']);
        $endDate = Carbon::parse($validated['end_date']);
        $slotDuration = (int) $validated['slot_duration'];

        $generated = 0;

        while ($startDate->lte($endDate)) {
            // Skip Sundays (assuming salon is closed)
            if ($startDate->dayOfWeek !== Carbon::SUNDAY) {
                $currentTime = Carbon::parse($validated['start_time']);
                $endTime = Carbon::parse($validated['end_time']);

                while ($currentTime->lt($endTime)) {
                    $slotEndTime = $currentTime->copy()->addMinutes($slotDuration);
                    
                    if ($slotEndTime->lte($endTime)) {
                        // Check if slot already exists
                        $exists = TimeSlot::where('date', $startDate->toDateString())
                            ->where('start_time', $currentTime->toTimeString())
                            ->exists();

                        if (!$exists) {
                            TimeSlot::create([
                                'date' => $startDate->toDateString(),
                                'start_time' => $currentTime->toTimeString(),
                                'end_time' => $slotEndTime->toTimeString(),
                                'status' => 'available'
                            ]);
                            $generated++;
                        }
                    }
                    
                    $currentTime->addMinutes($slotDuration);
                }
            }
            
            $startDate->addDay();
        }

        return redirect()->route('admin.timeslots')
            ->with('success', "Generated {$generated} new time slots");
    }

    public function timeSlotsGenerateWeekly(Request $request)
    {
        $validated = $request->validate([
            'weeks_ahead' => 'required|integer|min:1|max:12',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'slot_duration' => 'required|integer|min:15|max:240'
        ]);

        $weeksAhead = (int) $validated['weeks_ahead'];
        $slotDuration = (int) $validated['slot_duration'];
        $startTime = $validated['start_time'];
        $endTime = $validated['end_time'];

        $generated = 0;
        $startDate = Carbon::today();
        $endDate = $startDate->copy()->addWeeks($weeksAhead);

        while ($startDate->lte($endDate)) {
            // Skip Sundays (salon closed)
            if ($startDate->dayOfWeek !== Carbon::SUNDAY) {
                $currentTime = Carbon::parse($startTime);
                $endTimeCarbon = Carbon::parse($endTime);

                while ($currentTime->lt($endTimeCarbon)) {
                    $slotEndTime = $currentTime->copy()->addMinutes($slotDuration);
                    
                    if ($slotEndTime->lte($endTimeCarbon)) {
                        // Check if slot already exists
                        $exists = TimeSlot::where('date', $startDate->toDateString())
                            ->where('start_time', $currentTime->toTimeString())
                            ->exists();

                        if (!$exists) {
                            TimeSlot::create([
                                'date' => $startDate->toDateString(),
                                'start_time' => $currentTime->toTimeString(),
                                'end_time' => $slotEndTime->toTimeString(),
                                'status' => 'available'
                            ]);
                            $generated++;
                        }
                    }
                    
                    $currentTime->addMinutes($slotDuration);
                }
            }
            
            $startDate->addDay();
        }

        return redirect()->route('admin.timeslots')
            ->with('success', "Generated {$generated} new time slots for the next {$weeksAhead} weeks (Monday-Saturday)");
    }

    public function payments()
    {
        $payments = Payment::with('booking')
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('admin.payments.index', compact('payments'));
    }

    public function paymentUpdate(Request $request, $id)
    {
        $payment = Payment::findOrFail($id);
        
        $validated = $request->validate([
            'status' => 'required|in:pending,completed,failed,refunded'
        ]);

        $payment->update($validated);

        return redirect()->route('admin.payments')
            ->with('success', 'Payment status updated successfully');
    }

    /**
     * Handle image upload with comprehensive error handling
     *
     * @param Request $request
     * @param string $fieldName
     * @param string|null $existingImagePath
     * @return string|null
     * @throws \Exception
     */
    private function handleImageUpload(Request $request, string $fieldName, string $existingImagePath = null): ?string
    {
        // Check if file was uploaded
        if (!$request->hasFile($fieldName)) {
            return null;
        }

        $uploadedFile = $request->file($fieldName);

        // Validate file upload
        if (!$uploadedFile->isValid()) {
            $error = $uploadedFile->getErrorMessage();
            Log::error("Image upload validation failed for field '{$fieldName}': {$error}");
            throw new \Exception("Image upload failed: {$error}");
        }

        // Check file size (Laravel validation should catch this, but double-check)
        $maxSize = 10240 * 1024; // 10MB in bytes
        if ($uploadedFile->getSize() > $maxSize) {
            Log::error("Image file too large: {$uploadedFile->getSize()} bytes (max: {$maxSize})");
            throw new \Exception('Image file is too large. Maximum size allowed is 10MB.');
        }

        // Check file type
        $allowedMimes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/webp'];
        if (!in_array($uploadedFile->getMimeType(), $allowedMimes)) {
            Log::error("Invalid image type: {$uploadedFile->getMimeType()}");
            throw new \Exception('Invalid image type. Only JPEG, PNG, GIF, and WebP images are allowed.');
        }

        try {
            // Delete existing image if updating
            if ($existingImagePath && Storage::disk('public')->exists($existingImagePath)) {
                Storage::disk('public')->delete($existingImagePath);
                Log::info("Deleted existing image: {$existingImagePath}");
            }

            // Generate unique filename
            $extension = $uploadedFile->getClientOriginalExtension();
            $filename = uniqid('service_') . '.' . $extension;
            
            // Store the file
            $storedPath = $uploadedFile->storeAs('services', $filename, 'public');
            
            // Verify the file was stored
            if (!Storage::disk('public')->exists($storedPath)) {
                throw new \Exception('File was not saved properly to storage.');
            }

            Log::info("Image uploaded successfully: {$storedPath}");
            return $storedPath;

        } catch (\Exception $e) {
            Log::error("Image storage failed: {$e->getMessage()}");
            Log::error("File details - Name: {$uploadedFile->getClientOriginalName()}, Size: {$uploadedFile->getSize()}, Type: {$uploadedFile->getMimeType()}");
            throw new \Exception("Failed to save image: {$e->getMessage()}");
        }
    }
}
