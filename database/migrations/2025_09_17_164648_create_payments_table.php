<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained()->onDelete('cascade');
            $table->string('payment_reference', 20)->unique();
            $table->decimal('amount', 8, 2);
            $table->enum('method', ['mpesa', 'cash', 'card'])->default('mpesa');
            $table->enum('status', ['pending', 'processing', 'completed', 'failed', 'cancelled', 'refunded'])->default('pending');
            $table->string('transaction_id')->nullable();
            $table->string('mpesa_transaction_id')->nullable();
            $table->string('provider')->nullable();
            $table->json('provider_response')->nullable();
            $table->text('notes')->nullable();
            $table->timestamp('processed_at')->nullable();
            $table->timestamp('failed_at')->nullable();
            $table->timestamps();
            
            $table->index(['booking_id', 'status']);
            $table->index('payment_reference');
            $table->index(['status', 'method']);
            $table->index('mpesa_transaction_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
