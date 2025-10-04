<x-layouts.app :title="__('Manage Payments')">
    <div class="flex h-full w-full flex-1 flex-col gap-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-neutral-900 dark:text-white">Manage Payments</h1>
                <p class="text-neutral-600 dark:text-neutral-400">Track and manage payment transactions</p>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid gap-4 md:grid-cols-4">
            <div class="rounded-xl border border-neutral-200 bg-white p-4 dark:border-neutral-700 dark:bg-neutral-800">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-neutral-600 dark:text-neutral-400">Total Revenue</p>
                        <p class="text-xl font-bold text-green-600 dark:text-green-400">
                            KSh {{ number_format($payments->where('status', 'completed')->sum('amount')) }}
                        </p>
                    </div>
                    <flux:icon name="currency-dollar" class="h-8 w-8 text-green-600 dark:text-green-400" />
                </div>
            </div>
            
            <div class="rounded-xl border border-neutral-200 bg-white p-4 dark:border-neutral-700 dark:bg-neutral-800">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-neutral-600 dark:text-neutral-400">Pending</p>
                        <p class="text-xl font-bold text-orange-600 dark:text-orange-400">
                            KSh {{ number_format($payments->where('status', 'pending')->sum('amount')) }}
                        </p>
                    </div>
                    <flux:icon name="clock" class="h-8 w-8 text-orange-600 dark:text-orange-400" />
                </div>
            </div>
            
            <div class="rounded-xl border border-neutral-200 bg-white p-4 dark:border-neutral-700 dark:bg-neutral-800">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-neutral-600 dark:text-neutral-400">Failed</p>
                        <p class="text-xl font-bold text-red-600 dark:text-red-400">
                            KSh {{ number_format($payments->where('status', 'failed')->sum('amount')) }}
                        </p>
                    </div>
                    <flux:icon name="exclamation-triangle" class="h-8 w-8 text-red-600 dark:text-red-400" />
                </div>
            </div>
            
            <div class="rounded-xl border border-neutral-200 bg-white p-4 dark:border-neutral-700 dark:bg-neutral-800">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-neutral-600 dark:text-neutral-400">Total Transactions</p>
                        <p class="text-xl font-bold text-neutral-900 dark:text-white">{{ $payments->count() }}</p>
                    </div>
                    <flux:icon name="credit-card" class="h-8 w-8 text-neutral-600 dark:text-neutral-400" />
                </div>
            </div>
        </div>

        <!-- Filters -->
        <div class="flex flex-wrap gap-4">
            <select name="status_filter" class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                <option value="">All Statuses</option>
                <option value="pending">Pending</option>
                <option value="completed">Completed</option>
                <option value="failed">Failed</option>
                <option value="refunded">Refunded</option>
            </select>
            
            <select name="method_filter" class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                <option value="">All Methods</option>
                <option value="mpesa">M-Pesa</option>
                <option value="cash">Cash</option>
                <option value="card">Card</option>
            </select>
            
            <input type="date" name="date_filter" placeholder="Filter by date" class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white" />
        </div>

        <!-- Payments Table -->
        <div class="rounded-xl border border-neutral-200 bg-white dark:border-neutral-700 dark:bg-neutral-800">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="border-b border-neutral-200 dark:border-neutral-700">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-medium text-neutral-600 dark:text-neutral-400">Payment ID</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-neutral-600 dark:text-neutral-400">Booking</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-neutral-600 dark:text-neutral-400">Client</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-neutral-600 dark:text-neutral-400">Amount</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-neutral-600 dark:text-neutral-400">Method</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-neutral-600 dark:text-neutral-400">Status</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-neutral-600 dark:text-neutral-400">Date</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-neutral-600 dark:text-neutral-400">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-neutral-200 dark:divide-neutral-700">
                        @forelse($payments as $payment)
                            <tr class="hover:bg-neutral-50 dark:hover:bg-neutral-700/50">
                                <td class="px-6 py-4">
                                    <p class="font-mono text-sm text-neutral-900 dark:text-white">#{{ $payment->id }}</p>
                                    @if($payment->transaction_id)
                                        <p class="text-xs text-neutral-600 dark:text-neutral-400">{{ $payment->transaction_id }}</p>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <p class="font-medium text-neutral-900 dark:text-white">Booking #{{ $payment->booking->id }}</p>
                                    <p class="text-sm text-neutral-600 dark:text-neutral-400">
                                        {{ \Carbon\Carbon::parse($payment->booking->appointment_date)->format('M d, Y') }}
                                    </p>
                                </td>
                                <td class="px-6 py-4">
                                    <div>
                                        <p class="font-medium text-neutral-900 dark:text-white">{{ $payment->booking->client_name }}</p>
                                        <p class="text-sm text-neutral-600 dark:text-neutral-400">{{ $payment->booking->client_phone }}</p>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="font-bold text-neutral-900 dark:text-white">KSh {{ number_format($payment->amount) }}</p>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        @if($payment->payment_method === 'mpesa')
                                            <div class="flex items-center">
                                                <div class="w-2 h-2 bg-green-500 rounded-full mr-2"></div>
                                                <span class="text-sm font-medium text-neutral-900 dark:text-white">M-Pesa</span>
                                            </div>
                                        @elseif($payment->payment_method === 'cash')
                                            <div class="flex items-center">
                                                <div class="w-2 h-2 bg-blue-500 rounded-full mr-2"></div>
                                                <span class="text-sm font-medium text-neutral-900 dark:text-white">Cash</span>
                                            </div>
                                        @else
                                            <div class="flex items-center">
                                                <div class="w-2 h-2 bg-purple-500 rounded-full mr-2"></div>
                                                <span class="text-sm font-medium text-neutral-900 dark:text-white">{{ ucfirst($payment->payment_method) }}</span>
                                            </div>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex rounded-full px-2 py-1 text-xs font-medium
                                        @if($payment->status === 'pending') bg-orange-100 text-orange-800 dark:bg-orange-900 dark:text-orange-200
                                        @elseif($payment->status === 'completed') bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200
                                        @elseif($payment->status === 'failed') bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200
                                        @else bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200 @endif">
                                        {{ ucfirst($payment->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-sm text-neutral-900 dark:text-white">{{ $payment->created_at->format('M d, Y') }}</p>
                                    <p class="text-xs text-neutral-600 dark:text-neutral-400">{{ $payment->created_at->format('g:i A') }}</p>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex space-x-2">
                                        @if($payment->status === 'pending')
                                            <form method="POST" action="{{ route('admin.payments.update', $payment->id) }}" class="inline">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status" value="completed">
                                                <flux:button size="sm" type="submit" variant="outline">
                                                    Mark Paid
                                                </flux:button>
                                            </form>
                                        @endif
                                        <flux:button size="sm" href="{{ route('admin.bookings.show', $payment->booking->id) }}" wire:navigate>
                                            View Booking
                                        </flux:button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-6 py-12 text-center text-neutral-500 dark:text-neutral-400">
                                    No payments found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        @if($payments->hasPages())
            <div class="flex justify-center">
                {{ $payments->links() }}
            </div>
        @endif
    </div>
</x-layouts.app>
