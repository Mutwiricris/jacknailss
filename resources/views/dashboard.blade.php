<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-6">
        <!-- Stats Cards -->
        <div class="grid gap-4 md:grid-cols-4">
            <div class="rounded-xl border border-neutral-200 bg-white p-6 dark:border-neutral-700 dark:bg-neutral-800">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-neutral-600 dark:text-neutral-400">Total Bookings</p>
                        <p class="text-2xl font-bold text-neutral-900 dark:text-white">{{ $stats['total_bookings'] }}</p>
                    </div>
                    <div class="rounded-full bg-blue-100 p-3 dark:bg-blue-900">
                        <flux:icon name="calendar" class="h-6 w-6 text-blue-600 dark:text-blue-400" />
                    </div>
                </div>
            </div>
            
            <div class="rounded-xl border border-neutral-200 bg-white p-6 dark:border-neutral-700 dark:bg-neutral-800">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-neutral-600 dark:text-neutral-400">Pending Bookings</p>
                        <p class="text-2xl font-bold text-orange-600 dark:text-orange-400">{{ $stats['pending_bookings'] }}</p>
                    </div>
                    <div class="rounded-full bg-orange-100 p-3 dark:bg-orange-900">
                        <flux:icon name="clock" class="h-6 w-6 text-orange-600 dark:text-orange-400" />
                    </div>
                </div>
            </div>
            
            <div class="rounded-xl border border-neutral-200 bg-white p-6 dark:border-neutral-700 dark:bg-neutral-800">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-neutral-600 dark:text-neutral-400">Total Revenue</p>
                        <p class="text-2xl font-bold text-green-600 dark:text-green-400">KSh {{ number_format($stats['total_revenue']) }}</p>
                    </div>
                    <div class="rounded-full bg-green-100 p-3 dark:bg-green-900">
                        <flux:icon name="currency-dollar" class="h-6 w-6 text-green-600 dark:text-green-400" />
                    </div>
                </div>
            </div>
            
            <div class="rounded-xl border border-neutral-200 bg-white p-6 dark:border-neutral-700 dark:bg-neutral-800">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-neutral-600 dark:text-neutral-400">Available Slots</p>
                        <p class="text-2xl font-bold text-purple-600 dark:text-purple-400">{{ $stats['available_slots'] }}</p>
                    </div>
                    <div class="rounded-full bg-purple-100 p-3 dark:bg-purple-900">
                        <flux:icon name="squares-plus" class="h-6 w-6 text-purple-600 dark:text-purple-400" />
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Recent Activity -->
        <div class="grid gap-6 lg:grid-cols-2">
            <!-- Recent Bookings -->
            <div class="rounded-xl border border-neutral-200 bg-white p-6 dark:border-neutral-700 dark:bg-neutral-800">
                <div class="mb-4 flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-neutral-900 dark:text-white">Recent Bookings</h3>
                    <flux:button size="sm" href="{{ route('admin.bookings') }}" wire:navigate>View All</flux:button>
                </div>
                
                <div class="space-y-4">
                    @forelse($recent_bookings as $booking)
                        <div class="flex items-center justify-between border-b border-neutral-100 pb-3 last:border-0 dark:border-neutral-700">
                            <div>
                                <p class="font-medium text-neutral-900 dark:text-white">{{ $booking->client_name }}</p>
                                <p class="text-sm text-neutral-600 dark:text-neutral-400">{{ $booking->appointment_date }} at {{ $booking->start_time }}</p>
                            </div>
                            <div class="text-right">
                                <span class="inline-flex rounded-full px-2 py-1 text-xs font-medium
                                    @if($booking->status === 'pending') bg-orange-100 text-orange-800 dark:bg-orange-900 dark:text-orange-200
                                    @elseif($booking->status === 'confirmed') bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200
                                    @elseif($booking->status === 'completed') bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200
                                    @else bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200 @endif">
                                    {{ ucfirst($booking->status) }}
                                </span>
                                <p class="text-sm font-medium text-neutral-900 dark:text-white">KSh {{ number_format($booking->total_amount) }}</p>
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-neutral-500 dark:text-neutral-400">No recent bookings</p>
                    @endforelse
                </div>
            </div>
            
            <!-- Upcoming Appointments -->
            <div class="rounded-xl border border-neutral-200 bg-white p-6 dark:border-neutral-700 dark:bg-neutral-800">
                <div class="mb-4 flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-neutral-900 dark:text-white">Upcoming Appointments</h3>
                    <flux:button size="sm" href="{{ route('admin.timeslots') }}" wire:navigate>Manage Slots</flux:button>
                </div>
                
                <div class="space-y-4">
                    @forelse($upcoming_appointments as $appointment)
                        <div class="flex items-center justify-between border-b border-neutral-100 pb-3 last:border-0 dark:border-neutral-700">
                            <div>
                                <p class="font-medium text-neutral-900 dark:text-white">{{ $appointment->client_name }}</p>
                                <p class="text-sm text-neutral-600 dark:text-neutral-400">
                                    {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('M d, Y') }} 
                                    at {{ \Carbon\Carbon::parse($appointment->start_time)->format('g:i A') }}
                                </p>
                            </div>
                            <div class="text-right">
                                <p class="text-sm font-medium text-neutral-900 dark:text-white">{{ $appointment->servicesWithDetails->count() }} service(s)</p>
                                <p class="text-xs text-neutral-600 dark:text-neutral-400">{{ $appointment->client_phone }}</p>
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-neutral-500 dark:text-neutral-400">No upcoming appointments</p>
                    @endforelse
                </div>
            </div>
        </div>
        
        <!-- Quick Actions -->
        <div class="grid gap-4 md:grid-cols-4">
            <flux:button href="{{ route('admin.bookings') }}" variant="outline" class="h-20 flex-col" wire:navigate>
                <flux:icon name="calendar-days" class="h-6 w-6 mb-2" />
                Manage Bookings
            </flux:button>
            
            <flux:button href="{{ route('admin.services') }}" variant="outline" class="h-20 flex-col" wire:navigate>
                <flux:icon name="sparkles" class="h-6 w-6 mb-2" />
                Manage Services
            </flux:button>
            
            <flux:button href="{{ route('admin.timeslots') }}" variant="outline" class="h-20 flex-col" wire:navigate>
                <flux:icon name="clock" class="h-6 w-6 mb-2" />
                Time Slots
            </flux:button>
            
            <flux:button href="{{ route('admin.payments') }}" variant="outline" class="h-20 flex-col" wire:navigate>
                <flux:icon name="credit-card" class="h-6 w-6 mb-2" />
                Payments
            </flux:button>
        </div>
    </div>
</x-layouts.app>
