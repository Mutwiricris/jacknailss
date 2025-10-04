<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            // Manicure Services
            [
                'name' => 'Classic Manicure',
                'description' => 'Traditional nail care including cuticle care, nail shaping, and polish application.',
                'price' => 1500.00,
                'duration_minutes' => 45,
                'is_popular' => true,
                'status' => 'active'
            ],
            [
                'name' => 'French Manicure',
                'description' => 'Elegant white-tip manicure with natural pink base for a classic, sophisticated look.',
                'price' => 2000.00,
                'duration_minutes' => 60,
                'is_popular' => true,
                'status' => 'active'
            ],
            [
                'name' => 'Gel Manicure',
                'description' => 'Long-lasting gel polish manicure that provides chip-resistant color for up to 2 weeks.',
                'price' => 2500.00,
                'duration_minutes' => 75,
                'is_popular' => true,
                'status' => 'active'
            ],
            
            // Pedicure Services
            [
                'name' => 'Classic Pedicure',
                'description' => 'Complete foot care including soaking, exfoliation, nail care, and polish.',
                'price' => 2000.00,
                'duration_minutes' => 60,
                'is_popular' => true,
                'status' => 'active'
            ],
            [
                'name' => 'Spa Pedicure',
                'description' => 'Luxurious pedicure with extended massage, moisturizing treatment, and premium polish.',
                'price' => 3000.00,
                'duration_minutes' => 90,
                'is_popular' => false,
                'status' => 'active'
            ],
            
            // Acrylic Services
            [
                'name' => 'Acrylic Full Set',
                'description' => 'Complete acrylic nail extensions with shaping and polish of your choice.',
                'price' => 4000.00,
                'duration_minutes' => 120,
                'is_popular' => true,
                'status' => 'active'
            ],
            [
                'name' => 'Acrylic Fill',
                'description' => 'Maintenance service for existing acrylic nails, including growth area fill and reshaping.',
                'price' => 2500.00,
                'duration_minutes' => 90,
                'is_popular' => false,
                'status' => 'active'
            ],
            
            // Nail Art & Enhancements
            [
                'name' => 'Nail Art Design',
                'description' => 'Custom nail art designs including patterns, rhinestones, and decorative elements.',
                'price' => 1000.00,
                'duration_minutes' => 30,
                'is_popular' => false,
                'status' => 'active'
            ],
            [
                'name' => 'Chrome Nails',
                'description' => 'Mirror-finish chrome powder application for a stunning metallic look.',
                'price' => 3500.00,
                'duration_minutes' => 105,
                'is_popular' => false,
                'status' => 'active'
            ],
            
            // Removal Services
            [
                'name' => 'Gel Polish Removal',
                'description' => 'Safe removal of gel polish with nail conditioning treatment.',
                'price' => 800.00,
                'duration_minutes' => 30,
                'is_popular' => false,
                'status' => 'active'
            ],
            [
                'name' => 'Acrylic Removal',
                'description' => 'Professional acrylic nail removal with nail restoration treatment.',
                'price' => 1500.00,
                'duration_minutes' => 45,
                'is_popular' => false,
                'status' => 'active'
            ]
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
