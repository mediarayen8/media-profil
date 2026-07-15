<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Experience;

class ProfileSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Data Profil
        Profile::create([
            'full_name' => 'Nama Anda',
            'job_title' => 'Fullstack Developer',
            'bio' => 'Passionate about building scalable web applications and clean UI/UX.',
        ]);

        // 2. Data Project
        Project::create([
            'title' => 'SaaS Dashboard',
            'description' => 'A modern analytics dashboard for tracking user data.',
            'tech_stack' => 'Laravel, Tailwind CSS, Alpine.js',
        ]);

        // 3. Data Experience
        Experience::create([
            'company' => 'Tech Corp',
            'position' => 'Frontend Developer',
            'period' => '2023 - 2025',
            'description' => 'Developed responsive user interfaces and improved performance by 30%.',
        ]);
    }
}
