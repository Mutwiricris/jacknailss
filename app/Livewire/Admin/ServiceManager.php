<?php

namespace App\Livewire\Admin;

use App\Models\Service;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ServiceManager extends Component
{
    use WithFileUploads, WithPagination;

    // Form properties
    public $name = '';
    public $description = '';
    public $price = '';
    public $duration_minutes = '';
    public $is_popular = false;
    public $image;
    public $currentImage = null;

    // Modal and editing state
    public $showCreateModal = false;
    public $showEditModal = false;
    public $editingService = null;

    // Validation rules
    protected $rules = [
        'name' => 'required|string|max:255',
        'description' => 'nullable|string|max:1000',
        'price' => 'required|numeric|min:0|max:999999.99',
        'duration_minutes' => 'required|integer|min:1|max:480',
        'is_popular' => 'boolean',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
    ];

    protected $messages = [
        'name.required' => 'Service name is required.',
        'price.required' => 'Price is required.',
        'price.numeric' => 'Price must be a valid number.',
        'duration_minutes.required' => 'Duration is required.',
        'duration_minutes.integer' => 'Duration must be a whole number.',
        'image.image' => 'The file must be an image.',
        'image.mimes' => 'Only JPEG, PNG, GIF, and WebP images are allowed.',
        'image.max' => 'Image size cannot exceed 10MB.',
    ];

    public function openCreateModal()
    {
        $this->resetForm();
        $this->showCreateModal = true;
    }

    public function closeCreateModal()
    {
        $this->showCreateModal = false;
        $this->resetForm();
    }

    public function openEditModal($serviceId)
    {
        $service = Service::findOrFail($serviceId);
        $this->editingService = $service;
        
        $this->name = $service->name;
        $this->description = $service->description;
        $this->price = $service->price;
        $this->duration_minutes = $service->duration_minutes;
        $this->is_popular = $service->is_popular;
        $this->currentImage = $service->image;
        
        $this->showEditModal = true;
    }

    public function closeEditModal()
    {
        $this->showEditModal = false;
        $this->resetForm();
    }

    public function createService()
    {
        $this->validate();

        try {
            $serviceData = [
                'name' => $this->name,
                'description' => $this->description,
                'price' => $this->price,
                'duration_minutes' => $this->duration_minutes,
                'is_popular' => $this->is_popular,
                'status' => 'active',
            ];

            // Handle image upload
            if ($this->image) {
                $imagePath = $this->image->store('services', 'public');
                $serviceData['image'] = $imagePath;
                Log::info("Service image uploaded: {$imagePath}");
            }

            Service::create($serviceData);

            $this->closeCreateModal();
            $this->dispatch('service-created');
            session()->flash('success', 'Service created successfully!');

        } catch (\Exception $e) {
            Log::error('Service creation failed: ' . $e->getMessage());
            session()->flash('error', 'Failed to create service: ' . $e->getMessage());
        }
    }

    public function updateService()
    {
        $this->validate();

        try {
            $serviceData = [
                'name' => $this->name,
                'description' => $this->description,
                'price' => $this->price,
                'duration_minutes' => $this->duration_minutes,
                'is_popular' => $this->is_popular,
            ];

            // Handle image upload
            if ($this->image) {
                // Delete old image if exists
                if ($this->editingService->image && Storage::disk('public')->exists($this->editingService->image)) {
                    Storage::disk('public')->delete($this->editingService->image);
                    Log::info("Deleted old image: {$this->editingService->image}");
                }

                $imagePath = $this->image->store('services', 'public');
                $serviceData['image'] = $imagePath;
                Log::info("Service image updated: {$imagePath}");
            }

            $this->editingService->update($serviceData);

            $this->closeEditModal();
            $this->dispatch('service-updated');
            session()->flash('success', 'Service updated successfully!');

        } catch (\Exception $e) {
            Log::error('Service update failed: ' . $e->getMessage());
            session()->flash('error', 'Failed to update service: ' . $e->getMessage());
        }
    }

    public function deleteService($serviceId)
    {
        try {
            $service = Service::findOrFail($serviceId);
            
            // Delete image if exists
            if ($service->image && Storage::disk('public')->exists($service->image)) {
                Storage::disk('public')->delete($service->image);
                Log::info("Deleted image for service '{$service->name}': {$service->image}");
            }
            
            $service->delete();
            
            $this->dispatch('service-deleted');
            session()->flash('success', 'Service deleted successfully!');

        } catch (\Exception $e) {
            Log::error('Service deletion failed: ' . $e->getMessage());
            session()->flash('error', 'Failed to delete service: ' . $e->getMessage());
        }
    }

    public function removeImage()
    {
        $this->image = null;
    }

    private function resetForm()
    {
        $this->name = '';
        $this->description = '';
        $this->price = '';
        $this->duration_minutes = '';
        $this->is_popular = false;
        $this->image = null;
        $this->currentImage = null;
        $this->editingService = null;
        $this->resetValidation();
    }

    public function render()
    {
        $services = Service::orderBy('name')->paginate(12);
        
        return view('livewire.admin.service-manager', [
            'services' => $services
        ]);
    }
}
