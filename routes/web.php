<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $services = \App\Models\Service::active()->inRandomOrder()->limit(6)->get();
    return view('welcome', compact('services'));
})->name('home');

// Booking Routes
Route::get('/booking', [App\Http\Controllers\BookingController::class, 'index'])->name('booking.index');
Route::get('/booking/timeslots', [App\Http\Controllers\BookingController::class, 'getTimeSlots'])->name('booking.timeslots');
Route::post('/booking', [App\Http\Controllers\BookingController::class, 'store'])->name('booking.store');
Route::get('/booking/confirmation/{booking}', [App\Http\Controllers\BookingController::class, 'confirmation'])->name('booking.confirmation');

Route::get('dashboard', [AdminController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Admin Routes
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    // Bookings Management
    Route::get('/bookings', [AdminController::class, 'bookings'])->name('bookings');
    Route::get('/bookings/{booking}', [AdminController::class, 'bookingShow'])->name('bookings.show');
    Route::patch('/bookings/{booking}', [AdminController::class, 'bookingUpdate'])->name('bookings.update');
    
    // Services Management
    Route::get('/services', [AdminController::class, 'services'])->name('services');
    Route::get('/services/create', [AdminController::class, 'servicesCreate'])->name('services.create');
    Route::post('/services', [AdminController::class, 'servicesStore'])->name('services.store');
    
    // Time Slots Management
    Route::get('/timeslots', [AdminController::class, 'timeSlots'])->name('timeslots');
    Route::post('/timeslots/generate', [AdminController::class, 'timeSlotsGenerate'])->name('timeslots.generate');
    Route::post('/timeslots/generate-weekly', [AdminController::class, 'timeSlotsGenerateWeekly'])->name('timeslots.generate-weekly');
    
    // Payments Management
    Route::get('/payments', [AdminController::class, 'payments'])->name('payments');
    Route::patch('/payments/{payment}', [AdminController::class, 'paymentUpdate'])->name('payments.update');
});

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';
