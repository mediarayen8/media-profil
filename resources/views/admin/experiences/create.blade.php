@extends('layouts.admin')

@section('content')
<div class="max-w-2xl mx-auto px-4 py-8">
    <div class="mb-8">
        <h1 class="text-3xl font-extrabold text-white">Tambah Pengalaman Baru</h1>
        <p class="text-gray-400 mt-2">Tambahkan riwayat profesional Anda untuk melengkapi portofolio.</p>
    </div>

    <form action="{{ route('admin.experiences.store') }}" method="POST" 
        class="bg-gray-900/50 backdrop-blur-xl p-8 rounded-3xl border border-gray-800 shadow-2xl space-y-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-2">
                <label class="text-gray-400 text-sm font-medium">Posisi/Jabatan</label>
                <input type="text" name="position" required placeholder="Contoh: Senior Developer"
                    class="w-full bg-gray-800/50 border border-gray-700 rounded-xl p-3.5 text-white focus:ring-2 focus:ring-purple-500 focus:border-transparent outline-none transition">
            </div>
            <div class="space-y-2">
                <label class="text-gray-400 text-sm font-medium">Nama Perusahaan</label>
                <input type="text" name="company" required placeholder="Contoh: PT Teknologi Maju"
                    class="w-full bg-gray-800/50 border border-gray-700 rounded-xl p-3.5 text-white focus:ring-2 focus:ring-purple-500 focus:border-transparent outline-none transition">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-2">
                <label class="text-gray-400 text-sm font-medium">Tanggal Mulai</label>
                <input type="date" name="start_date" required 
                    class="w-full bg-gray-800/50 border border-gray-700 rounded-xl p-3.5 text-white focus:ring-2 focus:ring-purple-500 focus:border-transparent outline-none transition [color-scheme:dark]">
            </div>
            <div class="space-y-2">
                <label class="text-gray-400 text-sm font-medium">Tanggal Selesai</label>
                <input type="date" name="end_date" 
                    class="w-full bg-gray-800/50 border border-gray-700 rounded-xl p-3.5 text-white focus:ring-2 focus:ring-purple-500 focus:border-transparent outline-none transition [color-scheme:dark]">
                <p class="text-[10px] text-gray-500">Kosongkan jika masih bekerja di sini.</p>
            </div>
        </div>

        <div class="space-y-2">
            <label class="text-gray-400 text-sm font-medium">Deskripsi Pekerjaan</label>
            <textarea name="description" rows="4" placeholder="Jelaskan tanggung jawab utama Anda..."
                class="w-full bg-gray-800/50 border border-gray-700 rounded-xl p-3.5 text-white focus:ring-2 focus:ring-purple-500 focus:border-transparent outline-none transition"></textarea>
        </div>

        <button type="submit" 
            class="w-full bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-500 hover:to-indigo-500 text-white py-4 rounded-xl font-bold shadow-lg shadow-purple-500/20 transition-all transform hover:scale-[1.02] active:scale-95">
            Simpan Pengalaman
        </button>
    </form>
</div>
@endsection