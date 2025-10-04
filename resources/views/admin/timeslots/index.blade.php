<x-layouts.app :title="__('Manage Time Slots')">
    <div class="flex h-full w-full flex-1 flex-col gap-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-neutral-900 dark:text-white">Manage Time Slots</h1>
                <p class="text-neutral-600 dark:text-neutral-400">Generate and manage available appointment slots</p>
            </div>
            <button onclick="document.getElementById('quick-generate-modal').showModal()" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg flex items-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Quick Generate Weekly
            </button>
        </div>

        <!-- Generate Time Slots Form -->
        <div class="rounded-xl border border-neutral-200 bg-white p-6 dark:border-neutral-700 dark:bg-neutral-800">
            <h3 class="mb-4 text-lg font-semibold text-neutral-900 dark:text-white">Generate New Time Slots</h3>
            
            <form method="POST" action="{{ route('admin.timeslots.generate') }}">
                @csrf
                <div class="grid gap-4 md:grid-cols-5">
                    <flux:input type="date" name="start_date" label="Start Date" required />
                    <flux:input type="date" name="end_date" label="End Date" required />
                    <flux:input type="time" name="start_time" label="Start Time" value="09:00" required />
                    <flux:input type="time" name="end_time" label="End Time" value="18:00" required />
                    <div>
                        <label class="block text-sm font-medium text-neutral-600 dark:text-neutral-400 mb-2">Slot Duration (minutes)</label>
                        <select name="slot_duration" required class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            <option value="30">30 minutes</option>
                            <option value="45">45 minutes</option>
                            <option value="60" selected>60 minutes</option>
                            <option value="90">90 minutes</option>
                            <option value="120">120 minutes</option>
                        </select>
                    </div>
                </div>
                <div class="mt-4">
                    <flux:button type="submit">Generate Time Slots</flux:button>
                </div>
            </form>
        </div>

        <!-- Filters -->
        <div class="flex flex-wrap gap-4">
            <select name="status_filter" class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                <option value="">All Statuses</option>
                <option value="available">Available</option>
                <option value="booked">Booked</option>
            </select>
            
            <input type="date" name="date_filter" placeholder="Filter by date" class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white" />
        </div>

        <!-- Weekly Time Slots View -->
        <div class="rounded-xl border border-neutral-200 bg-white p-6 dark:border-neutral-700 dark:bg-neutral-800">
            <h3 class="mb-4 text-lg font-semibold text-neutral-900 dark:text-white">Weekly Schedule</h3>
            
            @php
                $currentWeekStart = \Carbon\Carbon::now()->startOfWeek();
                $weekDays = [];
                for ($i = 0; $i < 7; $i++) {
                    $weekDays[] = $currentWeekStart->copy()->addDays($i);
                }
                $groupedSlots = $timeSlots->groupBy(function($slot) {
                    return \Carbon\Carbon::parse($slot->date)->format('Y-m-d');
                });
            @endphp
            
            <div class="grid grid-cols-7 gap-4">
                @foreach($weekDays as $day)
                    <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-3">
                        <div class="text-center mb-3">
                            <h4 class="font-semibold text-neutral-900 dark:text-white">{{ $day->format('D') }}</h4>
                            <p class="text-sm text-neutral-600 dark:text-neutral-400">{{ $day->format('M d') }}</p>
                        </div>
                        
                        <div class="space-y-2">
                            @php
                                $daySlots = $groupedSlots->get($day->format('Y-m-d'), collect());
                                $availableSlots = $daySlots->where('status', 'available');
                                $bookedSlots = $daySlots->where('status', 'booked');
                            @endphp
                            
                            @if($daySlots->isNotEmpty())
                                <div class="text-xs text-center mb-2">
                                    <span class="inline-block w-2 h-2 bg-green-500 rounded-full mr-1"></span>
                                    {{ $availableSlots->count() }} available
                                    <br>
                                    <span class="inline-block w-2 h-2 bg-red-500 rounded-full mr-1"></span>
                                    {{ $bookedSlots->count() }} booked
                                </div>
                                
                                @foreach($daySlots->sortBy('start_time') as $slot)
                                    <div class="p-2 rounded text-xs
                                        @if($slot->status === 'available') bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200
                                        @else bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200 @endif">
                                        <div class="font-medium">
                                            {{ \Carbon\Carbon::parse($slot->start_time)->format('g:i A') }}
                                        </div>
                                        @if($slot->booking)
                                            <div class="text-xs opacity-75 truncate">
                                                {{ $slot->booking->client_name }}
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            @else
                                <div class="text-center text-gray-400 text-xs py-4">
                                    No slots
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        
        <!-- Detailed Time Slots Table -->
        <div class="rounded-xl border border-neutral-200 bg-white dark:border-neutral-700 dark:bg-neutral-800">
            <div class="px-6 py-4 border-b border-neutral-200 dark:border-neutral-700">
                <h3 class="text-lg font-semibold text-neutral-900 dark:text-white">All Time Slots</h3>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="border-b border-neutral-200 dark:border-neutral-700">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-medium text-neutral-600 dark:text-neutral-400">Date</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-neutral-600 dark:text-neutral-400">Time</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-neutral-600 dark:text-neutral-400">Duration</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-neutral-600 dark:text-neutral-400">Status</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-neutral-600 dark:text-neutral-400">Booking</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-neutral-600 dark:text-neutral-400">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-neutral-200 dark:divide-neutral-700">
                        @forelse($timeSlots as $slot)
                            @php
                                // Determine actual availability based on booking status
                                $isActuallyAvailable = !$slot->booking || 
                                    ($slot->booking && in_array($slot->booking->status, ['completed', 'cancelled']));
                                $displayStatus = $isActuallyAvailable ? 'available' : 'booked';
                            @endphp
                            <tr class="hover:bg-neutral-50 dark:hover:bg-neutral-700/50">
                                <td class="px-6 py-4">
                                    <p class="font-medium text-neutral-900 dark:text-white">
                                        {{ \Carbon\Carbon::parse($slot->date)->format('M d, Y') }}
                                    </p>
                                    <p class="text-sm text-neutral-600 dark:text-neutral-400">
                                        {{ \Carbon\Carbon::parse($slot->date)->format('l') }}
                                    </p>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="font-medium text-neutral-900 dark:text-white">
                                        {{ \Carbon\Carbon::parse($slot->start_time)->format('g:i A') }} - 
                                        {{ \Carbon\Carbon::parse($slot->end_time)->format('g:i A') }}
                                    </p>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-neutral-900 dark:text-white">
                                        {{ \Carbon\Carbon::parse($slot->start_time)->diffInMinutes(\Carbon\Carbon::parse($slot->end_time)) }} min
                                    </p>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex rounded-full px-2 py-1 text-xs font-medium
                                        @if($displayStatus === 'available') bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200
                                        @else bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200 @endif">
                                        {{ ucfirst($displayStatus) }}
                                    </span>
                                    @if($slot->booking && in_array($slot->booking->status, ['completed', 'cancelled']))
                                        <span class="ml-2 inline-flex rounded-full px-2 py-1 text-xs font-medium bg-gray-100 text-gray-600 dark:bg-gray-700 dark:text-gray-300">
                                            ({{ ucfirst($slot->booking->status) }})
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    @if($slot->booking && !in_array($slot->booking->status, ['completed', 'cancelled']))
                                        <div>
                                            <p class="font-medium text-neutral-900 dark:text-white">{{ $slot->booking->client_name }}</p>
                                            <p class="text-sm text-neutral-600 dark:text-neutral-400">{{ $slot->booking->client_phone }}</p>
                                            <span class="inline-flex rounded-full px-2 py-1 text-xs font-medium
                                                @if($slot->booking->status === 'pending') bg-orange-100 text-orange-800 dark:bg-orange-900 dark:text-orange-200
                                                @elseif($slot->booking->status === 'confirmed') bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200
                                                @endif">
                                                {{ ucfirst($slot->booking->status) }}
                                            </span>
                                        </div>
                                    @elseif($slot->booking)
                                        <div class="text-sm text-gray-500 dark:text-gray-400">
                                            Previous: {{ $slot->booking->client_name }}
                                            <br>
                                            <span class="text-xs">({{ ucfirst($slot->booking->status) }})</span>
                                        </div>
                                    @else
                                        <span class="text-neutral-500 dark:text-neutral-400">-</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex space-x-2">
                                        @if($slot->booking)
                                            <a href="{{ route('admin.bookings.show', $slot->booking->id) }}" class="inline-flex items-center px-3 py-1 text-sm bg-blue-100 text-blue-700 rounded-lg hover:bg-blue-200 dark:bg-blue-900 dark:text-blue-200">
                                                View Booking
                                            </a>
                                        @else
                                            <span class="text-neutral-500 dark:text-neutral-400 text-sm">Available for booking</span>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center text-neutral-500 dark:text-neutral-400">
                                    No time slots found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        @if($timeSlots->hasPages())
            <div class="flex justify-center">
                {{ $timeSlots->links() }}
            </div>
        @endif
    </div>

    <!-- Quick Generate Weekly Modal -->
    <dialog id="quick-generate-modal" class="rounded-xl border-0 bg-white p-0 shadow-xl dark:bg-neutral-800">
        <div class="w-full max-w-md p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-neutral-900 dark:text-white">Quick Generate Weekly Slots</h3>
                <button onclick="document.getElementById('quick-generate-modal').close()" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
                This will generate timeslots for Monday through Saturday (excluding Sundays) for the specified number of weeks ahead.
            </p>

            <form method="POST" action="{{ route('admin.timeslots.generate-weekly') }}">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Number of Weeks Ahead</label>
                        <select name="weeks_ahead" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            <option value="2">2 weeks</option>
                            <option value="4" selected>4 weeks (1 month)</option>
                            <option value="8">8 weeks (2 months)</option>
                            <option value="12">12 weeks (3 months)</option>
                        </select>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Start Time</label>
                            <input type="time" name="start_time" value="09:00" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">End Time</label>
                            <input type="time" name="end_time" value="18:00" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Slot Duration</label>
                        <select name="slot_duration" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            <option value="30">30 minutes</option>
                            <option value="45">45 minutes</option>
                            <option value="60" selected>60 minutes</option>
                            <option value="90">90 minutes</option>
                            <option value="120">120 minutes</option>
                        </select>
                    </div>

                    <div class="bg-blue-50 dark:bg-blue-900 p-3 rounded-lg">
                        <div class="flex items-start">
                            <svg class="w-5 h-5 text-blue-400 mt-0.5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                            </svg>
                            <div>
                                <h4 class="text-sm font-medium text-blue-800 dark:text-blue-200">Schedule Info</h4>
                                <p class="text-sm text-blue-700 dark:text-blue-300">
                                    • Monday to Saturday only<br>
                                    • Sundays automatically excluded<br>
                                    • Existing slots will be skipped
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end space-x-3 mt-6">
                    <button type="button" onclick="document.getElementById('quick-generate-modal').close()" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-700">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg">
                        Generate Weekly Slots
                    </button>
                </div>
            </form>
        </div>
    </dialog>
</x-layouts.app>
