<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BookingService extends Model
{
    protected $fillable = [
        'booking_id',
        'service_id',
        'service_price',
        'service_duration_minutes'
    ];

    protected $casts = [
        'service_price' => 'decimal:2',
        'service_duration_minutes' => 'integer'
    ];

    public function booking(): BelongsTo
    {
        return $this->belongsTo(Booking::class);
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function getFormattedPriceAttribute(): string
    {
        return 'KSh ' . number_format($this->service_price, 0);
    }

    public function getFormattedDurationAttribute(): string
    {
        $hours = floor($this->service_duration_minutes / 60);
        $minutes = $this->service_duration_minutes % 60;
        
        if ($hours > 0 && $minutes > 0) {
            return "{$hours}h {$minutes}min";
        } elseif ($hours > 0) {
            return "{$hours}h";
        } else {
            return "{$minutes}min";
        }
    }
}