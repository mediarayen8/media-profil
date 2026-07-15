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
            ['email' => 'mediarayen8@gmail.com'],
            ['name' => 'riyan', 'password' => bcrypt('riyan180203')]
        );

        // 1. Data Profil
        Profile::create([
            'user_id'   => $user->id, // Gunakan $user->id (lebih aman)
            'full_name' => 'RIYAN MEDIA FEBRIANA',
            'job_title' => 'Web Developer',
            'bio'       => 'Passionate about building scalable web applications and clean UI/UX.',
        ]);
    }
}