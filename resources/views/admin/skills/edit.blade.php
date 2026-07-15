@extends('layouts.admin')

@section('content')
<div class="max-w-2xl mx-auto px-4 py-8">
    <div class="mb-8">
        <h1 class="text-3xl font-extrabold text-white">Edit Skill: {{ $skill->name }}</h1>
        <p class="text-gray-400 mt-2">Perbarui informasi keahlian Anda.</p>
    </div>

    <form action="{{ route('admin.skills.update', $skill->id) }}" method="POST" 
        class="bg-gray-900/50 backdrop-blur-xl p-8 rounded-3xl border border-gray-800 shadow-2xl space-y-6">
        @csrf
        @method('PUT')

        <div class="space-y-2">
            <label class="text-gray-400 text-sm font-medium">Nama Skill</label>
            <input type="text" name="name" value="{{ old('name', $skill->name) }}" required 
                class="w-full bg-gray-800/50 border border-gray-700 rounded-xl p-3.5 text-white focus:ring-2 focus:ring-purple-500 focus:border-transparent outline-none transition">
        </div>

        <div class="space-y-2">
            <label class="text-gray-400 text-sm font-medium">Kategori</label>
            <input type="text" name="category" value="{{ old('category', $skill->category) }}" required 
                class="w-full bg-gray-800/50 border border-gray-700 rounded-xl p-3.5 text-white focus:ring-2 focus:ring-purple-500 focus:border-transparent outline-none transition">
        </div>

        <div class="space-y-2">
            <label class="text-gray-400 text-sm font-medium">Tingkat Kemahiran (1-100)</label>
            <input type="number" name="proficiency" value="{{ old('proficiency', $skill->proficiency) }}" min="1" max="100" required 
                class="w-full bg-gray-800/50 border border-gray-700 rounded-xl p-3.5 text-white focus:ring-2 focus:ring-purple-500 focus:border-transparent outline-none transition">
        </div>

        <div class="pt-4 flex flex-col gap-4">
            <button type="submit" 
                class="w-full bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-500 hover:to-indigo-500 text-white py-4 rounded-xl font-bold shadow-lg shadow-purple-500/20 transition-all transform hover:scale-[1.02] active:scale-95">
                Update Skill
            </button>
            
            <a href="{{ route('admin.skills.index') }}" 
                class="text-center text-gray-500 hover:text-white transition font-medium">
                Batal & Kembali
            </a>
        </div>
    </form>
</div>
@endsection