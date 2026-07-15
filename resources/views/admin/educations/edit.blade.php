@extends('layouts.admin')

@section('content')
<div class="px-4 py-8 max-w-4xl mx-auto">
    <h1 class="text-3xl font-bold text-white mb-6">Edit Pendidikan</h1>
    
    <form action="{{ route('admin.educations.update', $education->id) }}" method="POST" 
          class="bg-gray-900/50 backdrop-blur-xl p-8 rounded-3xl border border-gray-800 shadow-xl">
        @csrf 
        @method('PUT')
        
        <div class="space-y-6">
            <div>
                <label class="block text-sm font-medium text-gray-400 mb-2">Nama Institusi</label>
                <input type="text" name="institution" value="{{ old('institution', $education->institution) }}" 
                       class="w-full bg-gray-950 border border-gray-700 rounded-xl p-3 text-white focus:border-purple-500 outline-none transition" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-400 mb-2">Gelar / Jurusan (Opsional)</label>
                <input type="text" name="degree" value="{{ old('degree', $education->degree) }}" 
                       class="w-full bg-gray-950 border border-gray-700 rounded-xl p-3 text-white focus:border-purple-500 outline-none transition">
            </div>

            <div class="grid grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-400 mb-2">Tahun Mulai</label>
                    <input type="text" name="start_year" value="{{ old('start_year', $education->start_year) }}" 
                           class="w-full bg-gray-950 border border-gray-700 rounded-xl p-3 text-white focus:border-purple-500 outline-none transition" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-400 mb-2">Tahun Selesai</label>
                    <input type="text" name="end_year" value="{{ old('end_year', $education->end_year) }}" 
                           class="w-full bg-gray-950 border border-gray-700 rounded-xl p-3 text-white focus:border-purple-500 outline-none transition" required>
                </div>
            </div>

            <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white px-8 py-3 rounded-xl font-bold transition">
                Update Data
            </button>
        </div>
    </form>
</div>
@endsection