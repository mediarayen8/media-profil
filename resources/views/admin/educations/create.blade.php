@extends('layouts.admin')

@section('content')
<div class="px-4 py-8 max-w-4xl mx-auto">
    <h1 class="text-3xl font-bold text-white mb-6">Tambah Riwayat Pendidikan</h1>
    
    <form action="{{ route('admin.educations.store') }}" method="POST" class="bg-gray-900/50 backdrop-blur-xl p-8 rounded-3xl border border-gray-800 shadow-xl">
        @csrf
        <div class="space-y-6">
            <div>
                <label class="block text-sm font-medium text-gray-400 mb-2">Nama Institusi</label>
                <input type="text" name="institution" class="w-full bg-gray-950 border border-gray-700 rounded-xl p-3 text-white focus:border-purple-500 outline-none transition" required>
            </div>
            
            <div>
    <label class="block text-sm font-medium text-gray-400 mb-2">Gelar / Jurusan (Opsional)</label>
    <input type="text" name="degree" class="w-full bg-gray-950 border border-gray-700 rounded-xl p-3 text-white focus:border-purple-500 outline-none transition">
</div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-400 mb-2">Tahun Mulai</label>
                    <input type="text" name="start_year" class="w-full bg-gray-950 border border-gray-700 rounded-xl p-3 text-white focus:border-purple-500 outline-none transition" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-400 mb-2">Tahun Lulus</label>
                    <input type="text" name="end_year" class="w-full bg-gray-950 border border-gray-700 rounded-xl p-3 text-white focus:border-purple-500 outline-none transition" required>
                </div>
            </div>

            <div class="flex justify-end gap-4 mt-8">
                <a href="{{ route('admin.educations.index') }}" class="px-6 py-3 rounded-xl text-gray-400 hover:text-white transition">Batal</a>
                <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white px-8 py-3 rounded-xl font-bold shadow-lg shadow-purple-500/20 transition">Simpan Data</button>
            </div>
        </div>
    </form>
</div>
@endsection