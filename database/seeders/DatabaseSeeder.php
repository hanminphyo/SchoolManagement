<?php

namespace Database\Seeders;

use App\Models\Classes;
use App\Models\Course;
use App\Models\Group;
use App\Models\Role;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::factory()->create([
            'name' => 'Admin'
        ]);
        Role::factory()->create([
            'name' => 'Teacher'
        ]);
        Role::factory()->create([
            'name' => 'Student'
        ]);
    }
}
// User::factory()->create([
//     'name' => 'Test User',
//     'email' => 'test@example.com',
// ]);
