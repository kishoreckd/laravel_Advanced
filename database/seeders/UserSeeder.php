<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**One method of creating random user
         *DB::insert('insert into users (id, name) values (?, ?)', [1, 'Dayle'])

         */

         /**New method of creating dummy user */
         User::factory()->create([
            'name'=>'member1',
            'email'=>'member1@gmail.com',

         ]);
         User::factory()->create([
            'name'=>'member2',
            'email'=>'member2@gmail.com',

         ]);
         User::factory()->create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'role'=>'admin'

         ]);
         User::factory()->create([
            'name'=>'instructor1',
            'email'=>'instructor1@gmail.com',
            'role'=>'instructor1'

         ]);
         User::factory()->create([
            'name'=>'instructor2',
            'email'=>'instructor2@gmail.com',
            'role'=>'instructor2'

         ]);
         User::factory()->count(10)->create();
         User::factory()->count(10)->create([
            'role'=>'instructor'
         ]);


    }
}
