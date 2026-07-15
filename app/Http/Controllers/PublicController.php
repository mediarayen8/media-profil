<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use App\Models\Project;      // Tambahkan ini
use App\Models\Experience;   // Tambahkan ini
use App\Models\Skill;        // Tambahkan ini
use App\Models\Education;    // Tambahkan ini
use Illuminate\Http\Request;
use Spatie\Browsershot\Browsershot;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class PublicController extends Controller
{
    /**
     * Menampilkan profil publik user berdasarkan 'name'
     */
    public function index($name)
    {
        $cleanName = str_replace('-', ' ', $name);

        $user = User::where('name', $cleanName)
            ->with([
                'profile', 
                'skills', 
                'projects' => function($query) {
                    $query->where('is_published', true)->latest();
                }, 
                'experiences' => function($query) {
                    $query->orderBy('start_date', 'desc');
                }, 
                'educations' => function($query) {
                    $query->orderBy('start_year', 'desc');
                }
            ])
            ->firstOrFail();

        return view('welcome', [
            'user'        => $user,
            'profile'     => $user->profile ?? new Profile(['full_name' => $user->name]),
            'skills'      => $user->skills,
            'experiences' => $user->experiences,
            'educations'  => $user->educations,
            'projects'    => $user->projects,
            'avgSkill'    => $user->skills->avg('proficiency') ?? 0,
        ]);
    }

    /**
     * Menangani tampilan CV untuk user spesifik
     */
    public function viewCv($userId)
{
    // Menggunakan User::findOrFail agar data relasi mudah diakses
    $user = User::with(['profile', 'projects', 'experiences', 'skills', 'educations'])
                ->findOrFail($userId);

    return view('cv.template', [
        'user'        => $user,
        'profile'     => $user->profile ?? new Profile(['full_name' => $user->name]),
        'skills'      => $user->skills,
        'experiences' => $user->experiences,
        'educations'  => $user->educations, // Pastikan nama variabel konsisten dengan view
        'projects'    => $user->projects,
    ]);
}

    /**
     * Menangani download CV
     */
    public function downloadCv($userId)
{
    $user = User::with(['profile', 'projects', 'experiences', 'skills', 'educations'])->findOrFail($userId);
    
    $data = [
        'profile' => $user->profile,
        'educations' => $user->educations,
        'experiences' => $user->experiences,
        'projects' => $user->projects,
        'skills' => $user->skills,
        'user' => $user
    ];

    $html = view('cv.pdf', $data)->render();

    // Inisialisasi Browsershot
    $pdf = Browsershot::html($html)
        ->format('A4')
        ->showBackground()
        ->margins(0, 0, 0, 0)
        ->waitUntilNetworkIdle()
        // PENTING: Jika di Windows, tambahkan path Chrome. Jika di Linux (VPS), biasanya otomatis.
        // ->setChromePath('C:\Program Files\Google\Chrome\Application\chrome.exe') 
        ->pdf();

    // Di Controller, tambahkan opsi --print-background
return Browsershot::html($html)
    ->format('A4')
    ->showBackground() // WAJIB ada
    ->emulateMedia('screen') // <--- KUNCI: Memaksa PDF merender tampilan layar, bukan tampilan print
    ->pdf();
}
}