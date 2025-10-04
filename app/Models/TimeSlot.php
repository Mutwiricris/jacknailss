<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;

class TimeSlot extends Model
{
    protected $fillable = [
        'date',
        'start_time',
        'end_time',
        'status',
        'booking_id',
        'notes'
    ];

    protected $casts = [
        'date' => 'date',
    ];

    public function booking(): BelongsTo
    {
        return $this->belongsTo(Booking::class);
    }

    // Scopes
    public function scopeAvailable($query)
    {
        return $query->where('status', 'available');
    }

    public function scopeBooked($query)
    {
        return $query->where('status', 'booked');
    }

    public function scopeUnavailable($query)
    {
        return $query->where('status', 'unavailable');
    }

    public function scopeForDate($query, $date)
    {
        return $query->where('date', $date);
    }

    public function scopeUpcoming($query)
    {
        return $query->where('date', '>=', now()->toDateString());
    }

    // Accessors
    public function getFormattedTimeSlotAttribute(): string
    {
        $startTime = Carbon::parse($this->start_time);
        $endTime = Carbon::parse($this->end_time);
        return $startTime->format('g:i A') . ' - ' . $endTime->format('g:i A');
    }

    public function getIsAvailableAttribute(): bool
    {
        return $this->status === 'available';
    }

    public function getIsBookedAttribute(): bool
    {
        return $this->status === 'booked';
    }

    public function getIsUnavailableAttribute(): bool
    {
        return $this->status === 'unavailable';
    }

    // Methods
    public function markAsBooked(Booking $booking): void
    {
        $this->update([
            'status' => 'booked',
            'booking_id' => $booking->id
        ]);
    }

    public function markAsAvailable(): void
    {
        $this->update([
            'status' => 'available',
            'booking_id' => null
        ]);
    }

    public function markAsUnavailable(?string $notes = null): void
    {
        $this->update([
            'status' => 'unavailable',
            'booking_id' => null,
            'notes' => $notes
        ]);
    }

    // Static methods for common operations
    public static function createTimeSlot(string $date, string $startTime, string $endTime): self
    {
        return self::create([
            'date' => $date,
            'start_time' => $startTime,
            'end_time' => $endTime,
            'status' => 'available'
        ]);
    }

    public static function getAvailableForDate(string $date)
    {
        return self::forDate($date)
            ->available()
            ->orderBy('start_time')
            ->get();
    }

    public static function markDayUnavailable(string $date, string $notes = 'Day off'): void
    {
        self::forDate($date)->update([
            'status' => 'unavailable',
            'booking_id' => null,
            'notes' => $notes
        ]);
    }

    public static function markDayAvailable(string $date): void
    {
        self::forDate($date)
            ->where('status', 'unavailable')
            ->update([
                'status' => 'available',
                'notes' => null
            ]);
    }
}