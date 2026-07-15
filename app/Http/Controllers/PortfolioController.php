<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PortfolioController extends Controller
{
    public function index()
    {
        $projects = Auth::user()->projects()->latest()->get(); 
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'tech_stack' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'project_url' => 'nullable|url'
        ]);

        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('projects', 'public');
        }

        // Pastikan tech_stack di-trim agar tidak ada spasi berlebih
        $validated['tech_stack'] = array_map('trim', explode(',', $request->tech_stack));

        Auth::user()->projects()->create($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Proyek berhasil ditambahkan!');
    }

    public function edit(Project $project)
    {
        // Keamanan: Hanya pemilik proyek yang bisa edit
        if ($project->user_id !== Auth::id()) {
            abort(403);
        }

        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        // Keamanan
        if ($project->user_id !== Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'tech_stack' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'project_url' => 'nullable|url'
        ]);

        if ($request->hasFile('image')) {
            if ($project->image_path) {
                Storage::disk('public')->delete($project->image_path);
            }
            $validated['image_path'] = $request->file('image')->store('projects', 'public');
        }

        $validated['tech_stack'] = array_map('trim', explode(',', $request->tech_stack));
        
        $project->update($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Proyek diperbarui!');
    }

    public function destroy(Project $project)
    {
        // Keamanan
        if ($project->user_id !== Auth::id()) {
            abort(403);
        }

        if ($project->image_path) {
            Storage::disk('public')->delete($project->image_path);
        }
        
        $project->delete();

        return back()->with('success', 'Proyek dihapus!');
    }
}