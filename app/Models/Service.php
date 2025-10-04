<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Service extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
        'duration_minutes',
        'is_popular',
        'status'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'duration_minutes' => 'integer',
        'is_popular' => 'boolean'
    ];

    public function bookings(): BelongsToMany
    {
        return $this->belongsToMany(Booking::class, 'booking_services')
                   ->withPivot(['service_price', 'service_duration_minutes'])
                   ->withTimestamps();
    }

    public function bookingServices(): HasMany
    {
        return $this->hasMany(BookingService::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopePopular($query)
    {
        return $query->where('is_popular', true);
    }

    public function getFormattedPriceAttribute(): string
    {
        return 'KSh ' . number_format($this->price, 0);
    }

    public function getFormattedDurationAttribute(): string
    {
        $hours = floor($this->duration_minutes / 60);
        $minutes = $this->duration_minutes % 60;
        
        if ($hours > 0 && $minutes > 0) {
            return "{$hours}h {$minutes}min";
        } elseif ($hours > 0) {
            return "{$hours}h";
        } else {
            return "{$minutes}min";
        }
    }

    public function getImageUrlAttribute(): string
    {
        if ($this->image && \Storage::disk('public')->exists($this->image)) {
            return asset('storage/' . $this->image);
        }
        
        // Return a placeholder URL if no image or file doesn't exist
        return '/placeholder.svg?height=300&width=400&text=' . urlencode($this->name ?? 'Nail Service');
    }

    public function getIsActiveAttribute(): bool
    {
        return $this->status === 'active';
    }
}