<x-layouts.app :title="__('Booking Details')">
    <div class="flex h-full w-full flex-1 flex-col gap-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-neutral-900 dark:text-white">Booking #{{ $booking->id }}</h1>
                <p class="text-neutral-600 dark:text-neutral-400">Booking details and management</p>
            </div>
            <flux:button href="{{ route('admin.bookings') }}" variant="outline" wire:navigate>
                <flux:icon name="arrow-left" class="mr-2 h-4 w-4" />
                Back to Bookings
            </flux:button>
        </div>

        <div class="grid gap-6 lg:grid-cols-3">
            <!-- Booking Details -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Client Information -->
                <div class="rounded-xl border border-neutral-200 bg-white p-6 dark:border-neutral-700 dark:bg-neutral-800">
                    <h3 class="mb-4 text-lg font-semibold text-neutral-900 dark:text-white">Client Information</h3>
                    <div class="grid gap-4 md:grid-cols-2">
                        <div>
                            <label class="text-sm font-medium text-neutral-600 dark:text-neutral-400">Name</label>
                            <p class="text-neutral-900 dark:text-white">{{ $booking->client_name }}</p>
                        </div>
                        <div>
                            <label class="text-sm font-medium text-neutral-600 dark:text-neutral-400">Email</label>
                            <p class="text-neutral-900 dark:text-white">{{ $booking->client_email }}</p>
                        </div>
                        <div>
                            <label class="text-sm font-medium text-neutral-600 dark:text-neutral-400">Phone</label>
                            <p class="text-neutral-900 dark:text-white">{{ $booking->client_phone }}</p>
                        </div>
                        <div>
                            <label class="text-sm font-medium text-neutral-600 dark:text-neutral-400">Booking Date</label>
                            <p class="text-neutral-900 dark:text-white">{{ $booking->created_at->format('M d, Y g:i A') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Appointment Details -->
                <div class="rounded-xl border border-neutral-200 bg-white p-6 dark:border-neutral-700 dark:bg-neutral-800">
                    <h3 class="mb-4 text-lg font-semibold text-neutral-900 dark:text-white">Appointment Details</h3>
                    <div class="grid gap-4 md:grid-cols-2">
                        <div>
                            <label class="text-sm font-medium text-neutral-600 dark:text-neutral-400">Date</label>
                            <p class="text-neutral-900 dark:text-white">
                                {{ \Carbon\Carbon::parse($booking->appointment_date)->format('l, M d, Y') }}
                            </p>
                        </div>
                        <div>
                            <label class="text-sm font-medium text-neutral-600 dark:text-neutral-400">Time</label>
                            <p class="text-neutral-900 dark:text-white">
                                {{ \Carbon\Carbon::parse($booking->start_time)->format('g:i A') }} - 
                                {{ \Carbon\Carbon::parse($booking->end_time)->format('g:i A') }}
                            </p>
                        </div>
                        <div class="md:col-span-2">
                            <label class="text-sm font-medium text-neutral-600 dark:text-neutral-400">Special Requests</label>
                            <p class="text-neutral-900 dark:text-white">{{ $booking->notes ?: 'None' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Services -->
                <div class="rounded-xl border border-neutral-200 bg-white p-6 dark:border-neutral-700 dark:bg-neutral-800">
                    <h3 class="mb-4 text-lg font-semibold text-neutral-900 dark:text-white">Booked Services</h3>
                    <div class="space-y-4">
                        @foreach($booking->servicesWithDetails as $service)
                            <div class="flex items-center justify-between border-b border-neutral-100 pb-3 last:border-0 dark:border-neutral-700">
                                <div>
                                    <p class="font-medium text-neutral-900 dark:text-white">{{ $service->name }}</p>
                                    <p class="text-sm text-neutral-600 dark:text-neutral-400">
                                        {{ $service->pivot->service_duration_minutes }} minutes
                                    </p>
                                </div>
                                <p class="font-medium text-neutral-900 dark:text-white">
                                    KSh {{ number_format($service->pivot->service_price) }}
                                </p>
                            </div>
                        @endforeach
                        <div class="flex items-center justify-between pt-3 border-t border-neutral-200 dark:border-neutral-700">
                            <p class="font-semibold text-neutral-900 dark:text-white">Total Amount</p>
                            <p class="font-semibold text-neutral-900 dark:text-white">KSh {{ number_format($booking->total_amount) }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Status & Actions -->
            <div class="space-y-6">
                <!-- Status Update -->
                <div class="rounded-xl border border-neutral-200 bg-white p-6 dark:border-neutral-700 dark:bg-neutral-800">
                    <h3 class="mb-4 text-lg font-semibold text-neutral-900 dark:text-white">Status Management</h3>
                    
                    <form method="POST" action="{{ route('admin.bookings.update', $booking->id) }}">
                        @csrf
                        @method('PATCH')
                        
                        <div class="space-y-4">
                            <div>
                                <label class="text-sm font-medium text-neutral-600 dark:text-neutral-400">Current Status</label>
                                <span class="mt-1 inline-flex rounded-full px-3 py-1 text-sm font-medium
                                    @if($booking->status === 'pending') bg-orange-100 text-orange-800 dark:bg-orange-900 dark:text-orange-200
                                    @elseif($booking->status === 'confirmed') bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200
                                    @elseif($booking->status === 'completed') bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200
                                    @else bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200 @endif">
                                    {{ ucfirst($booking->status) }}
                                </span>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-neutral-600 dark:text-neutral-400 mb-2">Update Status</label>
                                <select name="status" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                    <option value="pending" {{ $booking->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="confirmed" {{ $booking->status === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                    <option value="completed" {{ $booking->status === 'completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="cancelled" {{ $booking->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-neutral-600 dark:text-neutral-400 mb-2">Notes</label>
                                <textarea name="notes" placeholder="Add notes about this booking..." rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">{{ $booking->notes }}</textarea>
                            </div>
                            
                            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition-colors">Update Booking</button>
                        </div>
                    </form>
                </div>

                <!-- Payment Information -->
                <div class="rounded-xl border border-neutral-200 bg-white p-6 dark:border-neutral-700 dark:bg-neutral-800">
                    <h3 class="mb-4 text-lg font-semibold text-neutral-900 dark:text-white">Payment Information</h3>
                    
                    @if($booking->payments->isNotEmpty())
                        @foreach($booking->payments as $payment)
                            <div class="space-y-3">
                                <div class="flex items-center justify-between">
                                    <span class="text-sm font-medium text-neutral-600 dark:text-neutral-400">Amount</span>
                                    <span class="font-medium text-neutral-900 dark:text-white">KSh {{ number_format($payment->amount) }}</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-sm font-medium text-neutral-600 dark:text-neutral-400">Method</span>
                                    <span class="font-medium text-neutral-900 dark:text-white">{{ ucfirst($payment->payment_method) }}</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-sm font-medium text-neutral-600 dark:text-neutral-400">Status</span>
                                    <span class="inline-flex rounded-full px-2 py-1 text-xs font-medium
                                        @if($payment->status === 'pending') bg-orange-100 text-orange-800 dark:bg-orange-900 dark:text-orange-200
                                        @elseif($payment->status === 'completed') bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200
                                        @else bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200 @endif">
                                        {{ ucfirst($payment->status) }}
                                    </span>
                                </div>
                                @if($payment->transaction_id)
                                    <div class="flex items-center justify-between">
                                        <span class="text-sm font-medium text-neutral-600 dark:text-neutral-400">Transaction ID</span>
                                        <span class="text-sm font-mono text-neutral-900 dark:text-white">{{ $payment->transaction_id }}</span>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    @else
                        <p class="text-neutral-500 dark:text-neutral-400">No payment information available</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
