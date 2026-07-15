@extends('layouts.admin')

@section('content')
<div class="max-w-2xl mx-auto px-4 py-8">
    <div class="mb-8">
        <h1 class="text-3xl font-extrabold text-white">Tambah Proyek Baru</h1>
    </div>

    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" 
        class="bg-gray-900/50 backdrop-blur-xl p-8 rounded-3xl border border-gray-800 shadow-2xl space-y-6">
        @csrf

        <div class="space-y-2">
            <label class="text-gray-400 text-sm font-medium">Judul Proyek</label>
            <input type="text" name="title" required placeholder="Contoh: Sistem Inventaris Toko"
                class="w-full bg-gray-800/50 border border-gray-700 rounded-xl p-3.5 text-white focus:ring-2 focus:ring-purple-500 focus:border-transparent outline-none transition">
        </div>

        <div class="space-y-2">
            <label class="text-gray-400 text-sm font-medium">Deskripsi</label>
            <textarea name="description" rows="4" required placeholder="Ceritakan fitur utama proyek ini..."
                class="w-full bg-gray-800/50 border border-gray-700 rounded-xl p-3.5 text-white focus:ring-2 focus:ring-purple-500 focus:border-transparent outline-none transition"></textarea>
        </div>

        <div class="space-y-2">
            <label class="text-gray-400 text-sm font-medium">Tech Stack</label>
            <input type="text" name="tech_stack" required placeholder="Laravel,Tailwind,MySQL"
                class="w-full bg-gray-800/50 border border-gray-700 rounded-xl p-3.5 text-white focus:ring-2 focus:ring-purple-500 focus:border-transparent outline-none transition">
            <p class="text-xs text-gray-500">Pisahkan setiap teknologi dengan koma.</p>
        </div>

        <div class="space-y-2">
            <label class="text-gray-400 text-sm font-medium">Project URL</label>
            <input type="url" name="project_url" placeholder="https://..."
                class="w-full bg-gray-800/50 border border-gray-700 rounded-xl p-3.5 text-white focus:ring-2 focus:ring-purple-500 focus:border-transparent outline-none transition">
        </div>

        <div class="space-y-2">
            <label class="text-gray-400 text-sm font-medium">Gambar Proyek</label>
            <input type="file" name="image" accept="image/*"
                class="w-full text-sm text-gray-400 file:mr-4 file:py-2.5 file:px-5 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-purple-600 file:text-white hover:file:bg-purple-700 transition cursor-pointer bg-gray-800/50 border border-gray-700 rounded-xl">
        </div>

        <button type="submit" 
            class="w-full bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-500 hover:to-indigo-500 text-white py-4 rounded-xl font-bold shadow-lg shadow-purple-500/20 transition-all transform hover:scale-[1.02] active:scale-95">
            Simpan Proyek
        </button>
    </form>
</div>
@endsection