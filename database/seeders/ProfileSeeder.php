<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Experience;
use App\Models\User; // Tambahkan ini

class ProfileSeeder extends Seeder
{
    public function run(): void
    {
        // Pastikan ada user (buat user jika belum ada)
        $user = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            ['name' => 'Admin', 'password' => bcrypt('password123')]
        );

        // 1. Data Profil
        Profile::create([
            'user_id'   => $user->id, // Tambahkan ini
            'full_name' => 'Nama Anda',
            'job_title' => 'Fullstack Developer',
            'bio'       => 'Passionate about building scalable web applications and clean UI/UX.',
        ]);

        // 2. Data Project
        Project::create([
            'user_id'     => $user->id, // Tambahkan ini
            'title'       => 'SaaS Dashboard',
            'description' => 'A modern analytics dashboard for tracking user data.',
            'tech_stack'  => 'Laravel, Tailwind CSS, Alpine.js',
        ]);

        // 3. Data Experience
        Experience::create([
            'user_id'     => $user->id, // Tambahkan ini
            'company'     => 'Tech Corp',
            'position'    => 'Frontend Developer',
            'period'      => '2023 - 2025',
            'description' => 'Developed responsive user interfaces and improved performance by 30%.',
        ]);
    }
}