<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index() {
        $educations = auth()->user()->educations()->latest()->get();
        return view('admin.educations.index', compact('educations'));
    }

    public function create() {
        return view('admin.educations.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'institution' => 'required',
            'degree'      => 'nullable|string',
            'start_year' => 'required',
            'end_year' => 'required',
        ]);
        auth()->user()->educations()->create($request->all());
        return redirect()->route('admin.educations.index')->with('success', 'Data ditambahkan!');
    }

    public function edit(Education $education) {
        return view('admin.educations.edit', compact('education'));
    }

    public function update(Request $request, Education $education) {
        $validated = $request->validate([
            'institution' => 'required',
            'degree' => 'required',
            'start_year' => 'required',
            'end_year' => 'required',
        ]);
        $education->update($validated);
        return redirect()->route('admin.educations.index')->with('success', 'Data diupdate!');
    }

    public function destroy(Education $education) {
        $education->delete();
        return back()->with('success', 'Data dihapus');
    }
}