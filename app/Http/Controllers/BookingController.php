<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\TimeSlot;
use App\Models\Booking;
use App\Models\Payment;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function index()
    {
        $services = Service::active()->get();
        return view('booking.index', compact('services'));
    }

    public function getTimeSlots(Request $request)
    {
        $date = $request->get('date', Carbon::today()->toDateString());
        $serviceId = $request->get('service_id');
        
        $service = Service::findOrFail($serviceId);
        $timeSlots = TimeSlot::where('date', $date)
            ->where('status', 'available')
            ->orderBy('start_time')
            ->get();

        return response()->json([
            'timeSlots' => $timeSlots,
            'service' => $service
        ]);
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'service_ids' => 'required|string',
                'time_slot_id' => 'required|exists:time_slots,id',
                'client_name' => 'required|string|max:255',
                'client_email' => 'required|email|max:255',
                'client_phone' => 'required|string|max:20',
                'special_requests' => 'nullable|string|max:1000',
                'payment_method' => 'required|in:mpesa,cash,card'
            ]);

            // Parse service_ids from JSON string
            $serviceIds = json_decode($validated['service_ids'], true);
            if (!is_array($serviceIds) || empty($serviceIds)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Please select at least one service'
                ], 422);
            }

            // Calculate total amount
            $services = Service::whereIn('id', $serviceIds)->get();
            $totalAmount = $services->sum('price');

            // Get time slot details
            $timeSlot = TimeSlot::findOrFail($validated['time_slot_id']);
            
            // Create booking
            $booking = Booking::create([
                'client_name' => $validated['client_name'],
                'client_email' => $validated['client_email'],
                'client_phone' => $validated['client_phone'],
                'appointment_date' => $timeSlot->date,
                'start_time' => $timeSlot->start_time,
                'end_time' => $timeSlot->end_time,
                'total_amount' => $totalAmount,
                'status' => 'pending',
                'notes' => $validated['special_requests']
            ]);

            // Attach services to booking
            foreach ($services as $service) {
                $booking->servicesWithDetails()->attach($service->id, [
                    'service_price' => $service->price,
                    'service_duration_minutes' => $service->duration_minutes
                ]);
            }

            // Mark time slot as booked
            TimeSlot::where('id', $validated['time_slot_id'])->update([
                'status' => 'booked',
                'booking_id' => $booking->id
            ]);

            // Create payment record
            $payment = Payment::create([
                'booking_id' => $booking->id,
                'amount' => $totalAmount,
                'payment_method' => $validated['payment_method'],
                'status' => 'pending'
            ]);

            return response()->json([
                'success' => true,
                'booking' => $booking->load(['servicesWithDetails']),
                'payment' => $payment
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong: ' . $e->getMessage()
            ], 500);
        }
    }

    public function confirmation($bookingId)
    {
        $booking = Booking::with(['servicesWithDetails', 'payments'])
            ->findOrFail($bookingId);
            
        return view('booking.confirmation', compact('booking'));
    }
}
