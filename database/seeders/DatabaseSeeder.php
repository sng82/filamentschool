<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Guardian;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

         User::factory()->create([
             'name' => 'Sam',
             'email' => 'sam@asapcomputers.co.uk',
             'password' => bcrypt('asap3434'),
         ]);

         Student::factory(10)
                ->has(Guardian::factory()->count(3))
                ->create();

         $this->call(StandardSeeder::class);
    }
}
