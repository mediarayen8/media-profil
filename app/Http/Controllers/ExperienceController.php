<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;
// 1. Tambahkan use statement ini
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ExperienceController extends Controller
{
    // 2. Tambahkan trait ini di dalam kelas
    use AuthorizesRequests;

    public function index()
    {
        $experiences = auth()->user()->experiences()->orderBy('start_date', 'desc')->get();
        return view('admin.experiences.index', compact('experiences'));
    }

    public function create()
    {
        return view('admin.experiences.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'company' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'description' => 'nullable|string'
        ]);

        auth()->user()->experiences()->create($validated);
        return redirect()->route('admin.experiences.index')->with('success', 'Pengalaman berhasil ditambahkan!');
    }

    public function edit(Experience $experience)
    {
        // Sekarang authorize() akan bekerja karena sudah ada Trait AuthorizesRequests
        
        return view('admin.experiences.edit', compact('experience'));
    }

    public function update(Request $request, Experience $experience)
    {
        

        $validated = $request->validate([
            'company' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'description' => 'nullable|string'
        ]);

        $experience->update($validated);
        return redirect()->route('admin.experiences.index')->with('success', 'Pengalaman diperbarui!');
    }

    public function destroy(Experience $experience)
    {
        
        $experience->delete();
        return back()->with('success', 'Pengalaman dihapus!');
    }
}