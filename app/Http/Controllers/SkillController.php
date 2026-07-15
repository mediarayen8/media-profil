<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class SkillController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $skills = auth()->user()->skills()->orderBy('proficiency', 'desc')->get();
        return view('admin.skills.index', compact('skills'));
    }

    public function create()
    {
        return view('admin.skills.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'category'    => 'required|string|max:100',
            'proficiency' => 'required|integer|between:1,100'
        ]);

        auth()->user()->skills()->create($validated);
        
        return redirect()->route('admin.skills.index')->with('success', 'Skill berhasil ditambahkan!');
    }

    public function edit(Skill $skill)
    {
        // Opsional: Aktifkan jika Anda sudah membuat Policy
        // $this->authorize('update', $skill);
        
        return view('admin.skills.edit', compact('skill'));
    }

    public function update(Request $request, Skill $skill)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'category'    => 'required|string|max:100',
            'proficiency' => 'required|integer|between:1,100'
        ]);

        $skill->update($validated);
        return redirect()->route('admin.skills.index')->with('success', 'Skill diperbarui!');
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();
        return back()->with('success', 'Skill dihapus!');
    }
}