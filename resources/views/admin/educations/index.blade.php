@extends('layouts.admin')

@section('content')
<div class="px-4 py-8">
    <div class="flex flex-col sm:flex-row justify-between items-center mb-8 gap-4">
        <div>
            <h1 class="text-3xl font-bold text-white">Riwayat Pendidikan</h1>
            <p class="text-gray-400 mt-1">Kelola latar belakang pendidikan Anda.</p>
        </div>
        
        <a href="{{ route('admin.educations.create') }}" 
           class="flex items-center gap-2 bg-purple-600 hover:bg-purple-700 text-white px-5 py-2.5 rounded-xl font-semibold transition-all shadow-lg shadow-purple-500/20 active:scale-95">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            <span>Tambah Pendidikan</span>
        </a>
    </div>

    <div class="bg-gray-900/50 backdrop-blur-xl rounded-3xl border border-gray-800 shadow-2xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-800/50 text-gray-400 text-sm uppercase tracking-wider">
                        <th class="p-6 font-semibold">Institusi</th>
                        <th class="p-6 font-semibold">Gelar/Jurusan</th>
                        <th class="p-6 font-semibold">Tahun</th>
                        <th class="p-6 font-semibold text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-800">
                    @foreach($educations as $education)
                    <tr class="hover:bg-gray-800/30 transition-colors group">
                        <td class="p-6 font-medium text-white">{{ $education->institution }}</td>
                        <td class="p-6 text-gray-300">{{ $education->degree }}</td>
                        <td class="p-6 text-sm text-gray-400 font-mono">
                            {{ $education->start_year }} → {{ $education->end_year }}
                        </td>
                        <td class="p-6 text-center">
                            <div class="flex justify-center items-center gap-4">
                                <a href="{{ route('admin.educations.edit', $education->id) }}" 
                                   class="text-sm text-blue-400 hover:text-blue-300 font-medium transition">Edit</a>
                                <form action="{{ route('admin.educations.destroy', $education->id) }}" method="POST" 
                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-sm text-red-400 hover:text-red-300 font-medium transition">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if($educations->isEmpty())
        <div class="p-12 text-center text-gray-500">
            Belum ada riwayat pendidikan yang ditambahkan.
        </div>
        @endif
    </div>
</div>
@endsection