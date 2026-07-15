<?php

namespace App\Http\Controllers;

// Pastikan 'Contact' TIDAK ADA di dalam baris use di bawah ini
use App\Models\{Profile, Project, Skill, Experience}; 
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // App\Http\Controllers\Admin\DashboardController.php
public function index()
{
    $user = auth()->user()->load(['profile', 'skills', 'projects', 'experiences', 'educations']);

    return view('admin.dashboard', [
        'user'          => $user,
        'projects'      => $user->projects,
        'projectsCount' => $user->projects->count(),
        'skills'        => $user->skills,
        'experiences'   => $user->experiences,
        'educations'    => $user->educations,
        'avgSkill'      => $user->skills->avg('proficiency') ?? 0,
    ]);
}
}