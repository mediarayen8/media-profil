@extends('layouts.admin')

@section('content')
<div class="px-4 py-8">
    <div class="flex flex-col sm:flex-row justify-between items-center mb-8 gap-4">
        <div>
            <h1 class="text-3xl font-bold text-white">Kelola Keahlian</h1>
            <p class="text-gray-400 mt-1">Atur daftar keahlian teknis Anda.</p>
        </div>
        
        <a href="{{ route('admin.skills.create') }}" 
           class="flex items-center gap-2 bg-purple-600 hover:bg-purple-700 text-white px-5 py-2.5 rounded-xl font-semibold transition-all shadow-lg shadow-purple-500/20 active:scale-95">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            <span>Tambah Skill</span>
        </a>
    </div>

    <div class="bg-gray-900/50 backdrop-blur-xl rounded-3xl border border-gray-800 shadow-2xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-800/50 text-gray-400 text-sm uppercase tracking-wider">
                        <th class="p-6 font-semibold">Nama Skill</th>
                        <th class="p-6 font-semibold">Kategori</th>
                        <th class="p-6 font-semibold">Proficiency</th>
                        <th class="p-6 font-semibold text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-800">
                    @foreach($skills as $skill)
                    <tr class="hover:bg-gray-800/30 transition-colors group">
                        <td class="p-6 font-semibold text-white group-hover:text-purple-400 transition-colors">
                            {{ $skill->name }}
                        </td>
                        <td class="p-6 text-gray-400">
                            <span class="bg-gray-800 px-3 py-1 rounded-full text-xs border border-gray-700">
                                {{ $skill->category }}
                            </span>
                        </td>
                        <td class="p-6">
                            <div class="flex items-center gap-4">
                                <div class="w-32 bg-gray-800 h-2 rounded-full overflow-hidden border border-gray-700">
                                    <div class="bg-gradient-to-r from-purple-500 to-indigo-500 h-2 rounded-full transition-all duration-500" 
                                         style="width: {{ $skill->proficiency }}%"></div>
                                </div>
                                <span class="text-sm font-mono font-medium text-gray-300 w-10">{{ $skill->proficiency }}%</span>
                            </div>
                        </td>
                        <td class="p-6 text-center">
                            <div class="flex justify-center items-center gap-4">
                                <a href="{{ route('admin.skills.edit', $skill->id) }}" 
                                   class="text-sm text-blue-400 hover:text-blue-300 font-medium transition">Edit</a>
                                <form action="{{ route('admin.skills.destroy', $skill->id) }}" method="POST" 
                                      onsubmit="return confirm('Hapus skill ini?')">
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

        @if($skills->isEmpty())
        <div class="p-12 text-center text-gray-500">
            Belum ada keahlian yang ditambahkan.
        </div>
        @endif
    </div>
</div>
@endsection