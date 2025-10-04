<x-layouts.app :title="__('Manage Bookings')">
    <div class="flex h-full w-full flex-1 flex-col gap-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-neutral-900 dark:text-white">Manage Bookings</h1>
                <p class="text-neutral-600 dark:text-neutral-400">View and manage all salon bookings</p>
            </div>
        </div>

        <!-- Filters -->
        <div class="flex flex-wrap gap-4">
            <select name="status_filter" class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                <option value="">All Statuses</option>
                <option value="pending">Pending</option>
                <option value="confirmed">Confirmed</option>
                <option value="completed">Completed</option>
                <option value="cancelled">Cancelled</option>
            </select>
            
            <input type="date" name="date_filter" placeholder="Filter by date" class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white" />
            
            <input type="search" name="search" placeholder="Search by client name or phone..." class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white" />
        </div>

        <!-- Bookings Table -->
        <div class="rounded-xl border border-neutral-200 bg-white dark:border-neutral-700 dark:bg-neutral-800">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="border-b border-neutral-200 dark:border-neutral-700">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-medium text-neutral-600 dark:text-neutral-400">Client</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-neutral-600 dark:text-neutral-400">Date & Time</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-neutral-600 dark:text-neutral-400">Services</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-neutral-600 dark:text-neutral-400">Amount</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-neutral-600 dark:text-neutral-400">Status</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-neutral-600 dark:text-neutral-400">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-neutral-200 dark:divide-neutral-700">
                        @forelse($bookings as $booking)
                            <tr class="hover:bg-neutral-50 dark:hover:bg-neutral-700/50">
                                <td class="px-6 py-4">
                                    <div>
                                        <p class="font-medium text-neutral-900 dark:text-white">{{ $booking->client_name }}</p>
                                        <p class="text-sm text-neutral-600 dark:text-neutral-400">{{ $booking->client_email }}</p>
                                        <p class="text-sm text-neutral-600 dark:text-neutral-400">{{ $booking->client_phone }}</p>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div>
                                        <p class="font-medium text-neutral-900 dark:text-white">
                                            {{ \Carbon\Carbon::parse($booking->appointment_date)->format('M d, Y') }}
                                        </p>
                                        <p class="text-sm text-neutral-600 dark:text-neutral-400">
                                            {{ \Carbon\Carbon::parse($booking->start_time)->format('g:i A') }} - 
                                            {{ \Carbon\Carbon::parse($booking->end_time)->format('g:i A') }}
                                        </p>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="space-y-1">
                                        @foreach($booking->servicesWithDetails as $service)
                                            <p class="text-sm text-neutral-900 dark:text-white">{{ $service->name }}</p>
                                        @endforeach
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="font-medium text-neutral-900 dark:text-white">KSh {{ number_format($booking->total_amount) }}</p>
                                    @if($booking->payments->isNotEmpty())
                                        <p class="text-sm text-neutral-600 dark:text-neutral-400">
                                            {{ ucfirst($booking->payments->first()->status) }}
                                        </p>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex rounded-full px-2 py-1 text-xs font-medium
                                        @if($booking->status === 'pending') bg-orange-100 text-orange-800 dark:bg-orange-900 dark:text-orange-200
                                        @elseif($booking->status === 'confirmed') bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200
                                        @elseif($booking->status === 'completed') bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200
                                        @else bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200 @endif">
                                        {{ ucfirst($booking->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex space-x-2">
                                        <flux:button size="sm" href="{{ route('admin.bookings.show', $booking->id) }}" wire:navigate>
                                            View
                                        </flux:button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center text-neutral-500 dark:text-neutral-400">
                                    No bookings found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        @if($bookings->hasPages())
            <div class="flex justify-center">
                {{ $bookings->links() }}
            </div>
        @endif
    </div>
</x-layouts.app>
