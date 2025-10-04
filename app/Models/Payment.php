<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;
use Carbon\Carbon;

class Payment extends Model
{
    protected $fillable = [
        'booking_id',
        'payment_reference',
        'amount',
        'method',
        'status',
        'transaction_id',
        'mpesa_transaction_id',
        'provider',
        'provider_response',
        'notes',
        'processed_at',
        'failed_at'
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'provider_response' => 'array',
        'processed_at' => 'datetime',
        'failed_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($payment) {
            if (!$payment->payment_reference) {
                $payment->payment_reference = $payment->generatePaymentReference();
            }
        });
    }

    // Relationships
    public function booking(): BelongsTo
    {
        return $this->belongsTo(Booking::class);
    }

    // Scopes
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeProcessing($query)
    {
        return $query->where('status', 'processing');
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    public function scopeFailed($query)
    {
        return $query->where('status', 'failed');
    }

    public function scopeRefunded($query)
    {
        return $query->where('status', 'refunded');
    }

    // Accessors
    public function getFormattedAmountAttribute(): string
    {
        return 'KSh ' . number_format($this->amount, 0);
    }

    public function getIsCompletedAttribute(): bool
    {
        return $this->status === 'completed';
    }

    public function getIsPendingAttribute(): bool
    {
        return $this->status === 'pending';
    }

    public function getIsFailedAttribute(): bool
    {
        return $this->status === 'failed';
    }

    public function getStatusBadgeClassAttribute(): string
    {
        return match($this->status) {
            'pending' => 'bg-yellow-100 text-yellow-800 border-yellow-200',
            'processing' => 'bg-blue-100 text-blue-800 border-blue-200',
            'completed' => 'bg-green-100 text-green-800 border-green-200',
            'failed' => 'bg-red-100 text-red-800 border-red-200',
            'cancelled' => 'bg-gray-100 text-gray-800 border-gray-200',
            'refunded' => 'bg-purple-100 text-purple-800 border-purple-200',
            default => 'bg-gray-100 text-gray-800 border-gray-200',
        };
    }

    // Methods
    public function markAsCompleted(?string $transactionId = null): void
    {
        $this->update([
            'status' => 'completed',
            'transaction_id' => $transactionId ?? $this->transaction_id,
            'processed_at' => now()
        ]);

        // Update booking payment status
        $this->booking->update(['payment_status' => 'completed']);
    }

    public function markAsFailed(?string $reason = null): void
    {
        $this->update([
            'status' => 'failed',
            'notes' => $reason,
            'failed_at' => now()
        ]);

        // Update booking payment status
        $this->booking->update(['payment_status' => 'failed']);
    }

    public function markAsRefunded(?string $reason = null): void
    {
        $this->update([
            'status' => 'refunded',
            'notes' => $reason
        ]);

        // Update booking payment status
        $this->booking->update(['payment_status' => 'refunded']);
    }

    public function canBeRefunded(): bool
    {
        return $this->status === 'completed' && 
               $this->processed_at &&
               $this->processed_at->diffInDays(now()) <= 30; // 30 day refund policy
    }

    private function generatePaymentReference(): string
    {
        do {
            $reference = 'PAY' . strtoupper(Str::random(8));
        } while (static::where('payment_reference', $reference)->exists());
        
        return $reference;
    }

    // Static methods
    public static function createForBooking(Booking $booking, array $paymentData): self
    {
        return self::create([
            'booking_id' => $booking->id,
            'amount' => $paymentData['amount'] ?? $booking->total_amount,
            'method' => $paymentData['method'],
            'provider' => $paymentData['provider'] ?? null,
            'transaction_id' => $paymentData['transaction_id'] ?? null,
            'mpesa_transaction_id' => $paymentData['mpesa_transaction_id'] ?? null,
            'notes' => $paymentData['notes'] ?? null,
        ]);
    }
}
