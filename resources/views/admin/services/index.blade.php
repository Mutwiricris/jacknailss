<x-layouts.app :title="__('Manage Services')">
    <div class="flex h-full w-full flex-1 flex-col gap-6">
        <!-- Header with Create Button -->
        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-2xl font-bold text-neutral-900 dark:text-white">Manage Services</h1>
                <p class="text-neutral-600 dark:text-neutral-400">Add, edit, and manage nail salon services</p>
            </div>
            <a href="{{ route('admin.services.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Add Service
            </a>
        </div>
        
        @livewire('admin.service-manager')
    </div>
</x-layouts.app>
