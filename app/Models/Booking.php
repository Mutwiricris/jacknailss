<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;
use Carbon\Carbon;

class Booking extends Model
{
    protected $fillable = [
        'booking_reference',
        'service_id',
        'client_id',
        'client_name',
        'client_email',
        'client_phone',
        'appointment_date',
        'start_time',
        'end_time',
        'status',
        'notes',
        'total_amount',
        'payment_status',
        'payment_method',
        'mpesa_transaction_id',
        'cancellation_reason',
        'cancelled_at',
        'confirmed_at'
    ];

    protected $casts = [
        'appointment_date' => 'date',
        'total_amount' => 'decimal:2',
        'cancelled_at' => 'datetime',
        'confirmed_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($booking) {
            if (!$booking->booking_reference) {
                $booking->booking_reference = $booking->generateBookingReference();
            }
        });
    }

    public function services(): HasMany
    {
        return $this->hasMany(BookingService::class);
    }

    public function servicesWithDetails(): BelongsToMany
    {
        return $this->belongsToMany(Service::class, 'booking_services')
                   ->withPivot(['service_price', 'service_duration_minutes'])
                   ->withTimestamps();
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function timeSlot(): BelongsTo
    {
        return $this->belongsTo(TimeSlot::class);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    public function latestPayment(): HasOne
    {
        return $this->hasOne(Payment::class)->latestOfMany();
    }

    public function completedPayment(): HasOne
    {
        return $this->hasOne(Payment::class)->where('status', 'completed');
    }

    public function scopeUpcoming($query)
    {
        return $query->where('appointment_date', '>=', now()->toDateString())
                    ->whereIn('status', ['pending', 'confirmed']);
    }

    public function scopeForDate($query, $date)
    {
        return $query->where('appointment_date', $date);
    }

    public function scopeActive($query)
    {
        return $query->whereNotIn('status', ['cancelled', 'no_show']);
    }

    public function scopeToday($query)
    {
        return $query->where('appointment_date', now()->toDateString());
    }

    public function isConfirmed(): bool
    {
        return $this->status === 'confirmed';
    }

    public function isPending(): bool
    {
        return $this->status === 'pending';
    }

    public function isCancelled(): bool
    {
        return $this->status === 'cancelled';
    }

    public function canBeCancelled(): bool
    {
        return in_array($this->status, ['pending', 'confirmed']) && 
               $this->appointment_date >= now()->addHours(24)->toDateString();
    }

    private function generateBookingReference(): string
    {
        do {
            $reference = 'JN' . strtoupper(Str::random(6));
        } while (static::where('booking_reference', $reference)->exists());
        
        return $reference;
    }

    public function getFormattedTimeSlotAttribute(): string
    {
        return Carbon::createFromFormat('H:i:s', $this->start_time)->format('g:i A') . 
               ' - ' . 
               Carbon::createFromFormat('H:i:s', $this->end_time)->format('g:i A');
    }

    public function getFormattedDateAttribute(): string
    {
        return $this->appointment_date->format('l, F j, Y');
    }

    public function getDurationInMinutesAttribute(): int
    {
        $start = Carbon::createFromFormat('H:i:s', $this->start_time);
        $end = Carbon::createFromFormat('H:i:s', $this->end_time);
        return $start->diffInMinutes($end);
    }

    public function getFormattedAmountAttribute(): string
    {
        return 'KSh ' . number_format($this->total_amount, 0);
    }

    public function getStatusBadgeClassAttribute(): string
    {
        return match($this->status) {
            'pending' => 'bg-yellow-100 text-yellow-800',
            'confirmed' => 'bg-green-100 text-green-800',
            'in_progress' => 'bg-blue-100 text-blue-800',
            'completed' => 'bg-green-100 text-green-800',
            'cancelled' => 'bg-red-100 text-red-800',
            'no_show' => 'bg-gray-100 text-gray-800',
            default => 'bg-gray-100 text-gray-800'
        };
    }
}