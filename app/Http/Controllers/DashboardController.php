<?php

namespace App\Http\Controllers;

// Pastikan 'Contact' TIDAK ADA di dalam baris use di bawah ini
use App\Models\{Profile, Project, Skill, Experience}; 
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $profile = Profile::firstOrCreate(
            ['user_id' => $userId],
            ['full_name' => Auth::user()->name]
        );

        $projects = Project::where('user_id', $userId)->get();
        $skills = Skill::where('user_id', $userId)->get();
        $experiences = Experience::where('user_id', $userId)->get();
        
        $projectsCount = $projects->count();
        $avgSkill = $skills->avg('proficiency') ?? 0;

        // PASTIKAN variabel 'unreadMessages' atau 'Contact::' tidak lagi dipanggil di sini
        return view('admin.dashboard', compact(
            'profile', 
            'projectsCount', 
            'skills', 
            'experiences', 
            'projects', 
            'avgSkill'
        ));
    }
}