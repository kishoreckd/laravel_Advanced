<?php

namespace Database\Seeders;

use App\Models\ClassType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        ClassType::create([
            'name'=>'yoga',
            'description'=>fake()->text(),
            'minutes'=>60
        ]);
        ClassType::create([
            'name'=>'dance',
            'description'=>fake()->text(),
            'minutes'=>50
        ]);
        ClassType::create([
            'name'=>'work',
            'description'=>fake()->text(),
            'minutes'=>55
        ]);
        ClassType::create([
            'name'=>'medidate',
            'description'=>fake()->text(),
            'minutes'=>40
        ]);
        ClassType::create([
            'name'=>'Boxing',
            'description'=>fake()->text(),
            'minutes'=>30
        ]);
        ClassType::create([
            'name'=>'Gymnastic',
            'description'=>fake()->text(),
            'minutes'=>35
        ]);
    }
}
