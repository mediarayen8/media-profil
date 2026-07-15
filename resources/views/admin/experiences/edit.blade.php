@extends('layouts.admin')

@section('content')
<div class="max-w-2xl mx-auto px-4 py-8">
    <div class="mb-8">
        <h1 class="text-3xl font-extrabold text-white">Edit Pengalaman</h1>
        <p class="text-gray-400 mt-2">Perbarui detail riwayat pekerjaan Anda.</p>
    </div>

    <form action="{{ route('admin.experiences.update', $experience->id) }}" method="POST" 
        class="bg-gray-900/50 backdrop-blur-xl p-8 rounded-3xl border border-gray-800 shadow-2xl space-y-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-2">
                <label class="text-gray-400 text-sm font-medium">Posisi/Jabatan</label>
                <input type="text" name="position" value="{{ old('position', $experience->position) }}" required
                    class="w-full bg-gray-800/50 border border-gray-700 rounded-xl p-3.5 text-white focus:ring-2 focus:ring-purple-500 focus:border-transparent outline-none transition">
            </div>
            <div class="space-y-2">
                <label class="text-gray-400 text-sm font-medium">Nama Perusahaan</label>
                <input type="text" name="company" value="{{ old('company', $experience->company) }}" required
                    class="w-full bg-gray-800/50 border border-gray-700 rounded-xl p-3.5 text-white focus:ring-2 focus:ring-purple-500 focus:border-transparent outline-none transition">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-2">
                <label class="text-gray-400 text-sm font-medium">Tanggal Mulai</label>
                <input type="date" name="start_date" value="{{ old('start_date', $experience->start_date ? \Carbon\Carbon::parse($experience->start_date)->format('Y-m-d') : '') }}" required
                    class="w-full bg-gray-800/50 border border-gray-700 rounded-xl p-3.5 text-white focus:ring-2 focus:ring-purple-500 focus:border-transparent outline-none transition [color-scheme:dark]">
            </div>
            <div class="space-y-2">
                <label class="text-gray-400 text-sm font-medium">Tanggal Selesai</label>
                <input type="date" name="end_date" value="{{ old('end_date', $experience->end_date ? \Carbon\Carbon::parse($experience->end_date)->format('Y-m-d') : '') }}"
                    class="w-full bg-gray-800/50 border border-gray-700 rounded-xl p-3.5 text-white focus:ring-2 focus:ring-purple-500 focus:border-transparent outline-none transition [color-scheme:dark]">
            </div>
        </div>

        <div class="space-y-2">
            <label class="text-gray-400 text-sm font-medium">Deskripsi Pekerjaan</label>
            <textarea name="description" rows="4"
                class="w-full bg-gray-800/50 border border-gray-700 rounded-xl p-3.5 text-white focus:ring-2 focus:ring-purple-500 focus:border-transparent outline-none transition">{{ old('description', $experience->description) }}</textarea>
        </div>

        <button type="submit" 
            class="w-full bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-500 hover:to-indigo-500 text-white py-4 rounded-xl font-bold shadow-lg shadow-purple-500/20 transition-all transform hover:scale-[1.02] active:scale-95">
            Update Pengalaman
        </button>
    </form>
</div>
@endsection