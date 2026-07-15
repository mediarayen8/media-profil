@extends('layouts.admin')

@section('content')
<div class="max-w-2xl mx-auto px-4 py-8">
    <div class="mb-8">
        <h1 class="text-3xl font-extrabold text-white">Edit Proyek</h1>
        <p class="text-gray-400 mt-2">Perbarui detail proyek Anda.</p>
    </div>

    <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data" 
        class="bg-gray-900/50 backdrop-blur-xl p-8 rounded-3xl border border-gray-800 shadow-2xl space-y-6">
        @csrf
        @method('PUT')

        <div class="space-y-2">
            <label class="text-gray-400 text-sm font-medium">Judul Proyek</label>
            <input type="text" name="title" value="{{ old('title', $project->title) }}" required
                class="w-full bg-gray-800/50 border border-gray-700 rounded-xl p-3.5 text-white focus:ring-2 focus:ring-purple-500 focus:border-transparent outline-none transition">
        </div>

        <div class="space-y-2">
            <label class="text-gray-400 text-sm font-medium">Deskripsi</label>
            <textarea name="description" rows="4" required
                class="w-full bg-gray-800/50 border border-gray-700 rounded-xl p-3.5 text-white focus:ring-2 focus:ring-purple-500 focus:border-transparent outline-none transition">{{ old('description', $project->description) }}</textarea>
        </div>

        <div class="space-y-2">
            <label class="text-gray-400 text-sm font-medium">Tech Stack</label>
            <input type="text" name="tech_stack" value="{{ old('tech_stack', implode(',', $project->tech_stack)) }}" required
                class="w-full bg-gray-800/50 border border-gray-700 rounded-xl p-3.5 text-white focus:ring-2 focus:ring-purple-500 focus:border-transparent outline-none transition">
            <p class="text-xs text-gray-500">Pisahkan dengan koma.</p>
        </div>

        <div class="space-y-2">
            <label class="text-gray-400 text-sm font-medium">Gambar Saat Ini</label>
            @if($project->image_path)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $project->image_path) }}" alt="Project Image" 
                        class="w-32 h-32 object-cover rounded-xl border border-gray-700 shadow-lg">
                </div>
            @endif
            <input type="file" name="image" accept="image/*"
                class="w-full text-sm text-gray-400 file:mr-4 file:py-2.5 file:px-5 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-purple-600 file:text-white hover:file:bg-purple-700 transition cursor-pointer bg-gray-800/50 border border-gray-700 rounded-xl">
        </div>

        <button type="submit" 
            class="w-full bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-500 hover:to-indigo-500 text-white py-4 rounded-xl font-bold shadow-lg shadow-purple-500/20 transition-all transform hover:scale-[1.02] active:scale-95">
            Update Proyek
        </button>
    </form>
</div>
@endsection