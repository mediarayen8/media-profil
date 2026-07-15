@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-8">
    <div class="mb-8">
        <h1 class="text-3xl font-extrabold text-white">Edit Profil</h1>
        <p class="text-gray-400 mt-2">Perbarui informasi identitas publik Anda.</p>
    </div>

    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data" 
        class="bg-gray-900/50 backdrop-blur-xl p-6 md:p-8 rounded-3xl border border-gray-800 shadow-2xl space-y-8">
        @csrf
        @method('PUT')

        <div class="flex flex-col sm:flex-row items-center gap-6 pb-6 border-b border-gray-800">
            <div class="relative group">
                @if($profile->photo_path)
                    <img src="{{ asset('storage/' . $profile->photo_path) }}" class="w-28 h-28 rounded-2xl object-cover border-2 border-purple-500/30 shadow-lg">
                @else
                    <div class="w-28 h-28 rounded-2xl bg-gray-800 flex items-center justify-center text-gray-500 border border-gray-700">No Photo</div>
                @endif
                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition rounded-2xl flex items-center justify-center text-xs text-white">Update</div>
            </div>
            
            <div class="flex-1 w-full">
                <label class="block text-gray-400 font-medium mb-2">Ganti Foto Profil</label>
                <input type="file" name="photo" class="w-full text-sm text-gray-400 file:mr-4 file:py-2.5 file:px-5 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-purple-600 file:text-white hover:file:bg-purple-700 transition cursor-pointer">
                <p class="text-xs text-gray-500 mt-2">Format: JPG, PNG. Maksimal 2MB.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-2">
                <label class="text-gray-400 text-sm font-medium">Nama Lengkap</label>
                <input type="text" name="full_name" value="{{ old('full_name', $profile->full_name) }}" required 
                    class="w-full bg-gray-800/50 border border-gray-700 rounded-xl p-3.5 text-white focus:ring-2 focus:ring-purple-500 focus:border-transparent outline-none transition">
            </div>
            <div class="space-y-2">
                <label class="text-gray-400 text-sm font-medium">Job Title</label>
                <input type="text" name="job_title" value="{{ old('job_title', $profile->job_title) }}" 
                    class="w-full bg-gray-800/50 border border-gray-700 rounded-xl p-3.5 text-white focus:ring-2 focus:ring-purple-500 focus:border-transparent outline-none transition">
            </div>
        </div>

        <div class="space-y-2">
            <label class="text-gray-400 text-sm font-medium">Bio</label>
            <textarea name="bio" rows="4" 
                class="w-full bg-gray-800/50 border border-gray-700 rounded-xl p-3.5 text-white focus:ring-2 focus:ring-purple-500 focus:border-transparent outline-none transition">{{ old('bio', $profile->bio) }}</textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach(['linkedin_url' => 'LinkedIn', 'github_url' => 'GitHub', 'whatsapp' => 'WhatsApp'] as $name => $label)
            <div class="space-y-2">
                <label class="text-gray-400 text-sm font-medium">{{ $label }}</label>
                <input type="text" name="{{ $name }}" value="{{ old($name, $profile->$name) }}" 
                    class="w-full bg-gray-800/50 border border-gray-700 rounded-xl p-3.5 text-white focus:ring-2 focus:ring-purple-500 focus:border-transparent outline-none transition">
            </div>
            @endforeach
        </div>

        <div class="pt-4">
            <button type="submit" 
                class="w-full md:w-auto bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-500 hover:to-indigo-500 text-white px-10 py-4 rounded-xl font-bold shadow-lg shadow-purple-500/20 transition-all transform hover:scale-[1.02] active:scale-95">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection