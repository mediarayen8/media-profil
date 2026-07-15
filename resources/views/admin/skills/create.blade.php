@extends('layouts.admin')

@section('content')
<div class="max-w-2xl mx-auto px-4 py-8">
    <div class="mb-8">
        <h1 class="text-3xl font-extrabold text-white">Tambah Skill Baru</h1>
        <p class="text-gray-400 mt-2">Tambahkan keahlian teknis Anda ke dalam portofolio.</p>
    </div>

    <form action="{{ route('admin.skills.store') }}" method="POST" 
        class="bg-gray-900/50 backdrop-blur-xl p-8 rounded-3xl border border-gray-800 shadow-2xl space-y-6">
        @csrf
        <div class="space-y-2">
            <label class="text-gray-400 text-sm font-medium">Kategori</label>
            <select name="category" required 
                class="w-full bg-gray-800/50 border border-gray-700 rounded-xl p-3.5 text-white focus:ring-2 focus:ring-purple-500 focus:border-transparent outline-none transition appearance-none">
                <option value="" disabled selected>Pilih Kategori</option>
                <option value="tech" class="bg-gray-800 text-white">Tech Stack</option>
                <option value="basic" class="bg-gray-800 text-white">Basic Skill</option>
            </select>
            <p class="text-xs text-gray-500">Pilih 'Tech Stack' untuk skill teknis atau 'Basic' untuk soft skill.</p>
        </div>

        <div class="space-y-2">
            <label class="text-gray-400 text-sm font-medium">Nama Skill</label>
            <input type="text" name="name" placeholder="Contoh: Laravel" required 
                class="w-full bg-gray-800/50 border border-gray-700 rounded-xl p-3.5 text-white focus:ring-2 focus:ring-purple-500 focus:border-transparent outline-none transition">
        </div>


        <div class="space-y-2">
            <label class="text-gray-400 text-sm font-medium">Tingkat Kemahiran (1-100)</label>
            <div class="flex items-center gap-4">
                <input type="number" name="proficiency" min="1" max="100" required placeholder="85"
                    class="w-full bg-gray-800/50 border border-gray-700 rounded-xl p-3.5 text-white focus:ring-2 focus:ring-purple-500 focus:border-transparent outline-none transition">
            </div>
            <p class="text-xs text-gray-500">Gunakan angka antara 1 sampai 100.</p>
        </div>

        <button type="submit" 
            class="w-full bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-500 hover:to-indigo-500 text-white py-4 rounded-xl font-bold shadow-lg shadow-purple-500/20 transition-all transform hover:scale-[1.02] active:scale-95">
            Simpan Skill
        </button>
    </form>
</div>
@endsection