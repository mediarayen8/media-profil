@extends('layouts.admin')

@section('content')
<div class="px-4 py-8">
    <div class="flex flex-col sm:flex-row justify-between items-center mb-8 gap-4">
        <div>
            <h1 class="text-3xl font-bold text-white">Daftar Proyek</h1>
            <p class="text-gray-400 mt-1">Kelola portofolio proyek Anda di sini.</p>
        </div>
        
        <a href="{{ route('admin.projects.create') }}" 
           class="flex items-center gap-2 bg-purple-600 hover:bg-purple-700 text-white px-5 py-2.5 rounded-xl font-semibold transition-all shadow-lg shadow-purple-500/20 active:scale-95">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            <span>Tambah Proyek</span>
        </a>
    </div>

    <div class="bg-gray-900 rounded-3xl border border-gray-800 overflow-hidden shadow-xl">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-800/50 text-gray-400 text-sm uppercase tracking-wider">
                        <th class="p-5 font-semibold">Gambar</th>
                        <th class="p-5 font-semibold">Judul</th>
                        <th class="p-5 font-semibold">Tech Stack</th>
                        <th class="p-5 font-semibold text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-800">
                    @foreach($projects as $project)
                    <tr class="hover:bg-gray-800/30 transition-colors group">
                        <td class="p-5">
                            @if($project->image_path)
                                <img src="{{ asset('storage/' . $project->image_path) }}" 
                                     class="w-20 h-14 object-cover rounded-lg border border-gray-700 shadow-sm">
                            @else
                                <div class="w-20 h-14 bg-gray-800 rounded-lg flex items-center justify-center border border-gray-700 text-[10px] text-gray-500">No Image</div>
                            @endif
                        </td>
                        <td class="p-5 font-medium text-white group-hover:text-purple-400 transition-colors">{{ $project->title }}</td>
                        <td class="p-5">
                            <div class="flex flex-wrap gap-1.5">
                                @foreach($project->tech_stack as $tech)
                                    <span class="bg-gray-800 border border-gray-700 px-3 py-1 rounded-full text-[10px] text-gray-300 font-medium">
                                        {{ $tech }}
                                    </span>
                                @endforeach
                            </div>
                        </td>
                        <td class="p-5 text-center">
                            <div class="flex justify-center items-center gap-3">
                                <a href="{{ route('admin.projects.edit', $project->id) }}" 
                                   class="text-sm text-blue-400 hover:text-blue-300 font-medium transition">Edit</a>
                                <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-sm text-red-400 hover:text-red-300 font-medium transition">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        @if($projects->isEmpty())
        <div class="p-10 text-center text-gray-500">
            Belum ada proyek yang ditambahkan.
        </div>
        @endif
    </div>
</div>
@endsection