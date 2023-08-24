<?php

namespace Database\Seeders;

use App\Models\ScheduleClass;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ScheduledClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ScheduleClass::factory()->count(10)->create();
    }
}
