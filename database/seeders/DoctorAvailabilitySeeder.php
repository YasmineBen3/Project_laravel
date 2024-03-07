<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\DoctorAvailability;

class DoctorAvailabilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $doctorIds = \App\Models\Doctor::pluck('id')->toArray();
        $data = [];

        foreach ($doctorIds as $doctorId) {
            $data[] = [
                'doctor_id' => $doctorId,
                'day' => now()->dayOfWeek,
                'start_time' => '09:00', 
                'end_time' => '17:00', 
            ];
        }

        DoctorAvailability::insert($data);
    }
}
