<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TimeSlot;
use Carbon\Carbon;

class TimeSlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Generate time slots for the next 30 days
        $startDate = Carbon::today();
        $endDate = Carbon::today()->addDays(30);
        
        // Business hours: 9 AM to 6 PM, Monday to Saturday
        $businessHours = [
            'start' => '09:00',
            'end' => '18:00',
            'slot_duration' => 60 // 1 hour slots
        ];
        
        // Days off (Sunday = 0)
        $daysOff = [0]; // Sunday
        
        for ($date = $startDate->copy(); $date->lte($endDate); $date->addDay()) {
            // Skip days off
            if (in_array($date->dayOfWeek, $daysOff)) {
                continue;
            }
            
            $currentTime = Carbon::createFromFormat('H:i', $businessHours['start']);
            $endTime = Carbon::createFromFormat('H:i', $businessHours['end']);
            
            while ($currentTime->lt($endTime)) {
                $slotEndTime = $currentTime->copy()->addMinutes($businessHours['slot_duration']);
                
                // Don't create slot if it would extend beyond business hours
                if ($slotEndTime->gt($endTime)) {
                    break;
                }
                
                TimeSlot::create([
                    'date' => $date->toDateString(),
                    'start_time' => $currentTime->format('H:i:s'),
                    'end_time' => $slotEndTime->format('H:i:s'),
                    'status' => 'available'
                ]);
                
                $currentTime->addMinutes($businessHours['slot_duration']);
            }
        }
        
        // Mark some random slots as unavailable for demonstration
        $totalSlots = TimeSlot::count();
        $unavailableCount = min(10, intval($totalSlots * 0.1)); // 10% or max 10 slots
        
        TimeSlot::inRandomOrder()
            ->limit($unavailableCount)
            ->update([
                'status' => 'unavailable',
                'notes' => 'Staff unavailable'
            ]);
    }
}
