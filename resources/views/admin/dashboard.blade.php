@extends('layouts.admin')

@section('content')
<div class="grid grid-cols-12 gap-6 p-2">
    
    <div class="col-span-12 xl:col-span-4 space-y-6">
        <div class="bg-slate-900 rounded-3xl border border-slate-800 p-6 shadow-2xl relative">
            <div class="h-32 bg-gradient-to-r from-purple-600 to-indigo-600 rounded-2xl mb-12"></div>
            
            <div class="w-24 h-24 bg-slate-800 rounded-2xl border-4 border-slate-950 absolute top-20 left-10 shadow-xl overflow-hidden flex items-center justify-center z-[999]" 
     style="background-image: url('{{ asset('storage/' . $profile->photo_path) }}'); background-size: cover; background-position: center;">
    
    @if(isset($profile) && $profile->photo_path)
        <img src="{{ asset('storage/' . $profile->photo_path) }}" 
             class="w-full h-full object-cover" 
             style="display: block !important; visibility: visible !important;"
             alt="Profile">
    @else
        <span class="text-slate-500 font-bold text-2xl uppercase">ra</span>
    @endif
</div>
            
            <div class="mt-4">
                <h2 class="text-2xl font-bold text-white">
    {{ isset($profile) ? $profile->full_name : auth()->user()->name }}
</h2>
                <p class="text-purple-400 text-sm font-medium">{{ isset($profile) ? $profile->job_title : 'Developer' }}</p>
            </div>

            <div class="mt-6">
                <p class="text-[10px] text-slate-500 uppercase tracking-widest font-bold mb-3">Skills</p>
                <div class="flex flex-wrap gap-2">
                    @forelse($skills as $skill)
                        <span class="bg-slate-800 border border-slate-700 px-3 py-1 rounded-lg text-xs text-slate-300">{{ $skill->name }}</span>
                    @empty
                        <p class="text-slate-600 text-xs italic">Belum ada skill.</p>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="bg-slate-900 rounded-3xl border border-slate-800 p-6">
            <h3 class="font-bold text-white mb-4">Latest Experiences</h3>
            <div class="space-y-4">
                @forelse($experiences as $exp)
                <div class="flex items-center gap-4 group">
                    <div class="w-10 h-10 bg-slate-800 rounded-xl flex items-center justify-center border border-slate-700 group-hover:border-purple-500 transition">🚀</div>
                    <div>
                        <p class="text-sm font-bold text-white">{{ $exp->position }}</p>
                        <p class="text-xs text-slate-500">{{ $exp->company }}</p>
                    </div>
                </div>
                @empty
                    <p class="text-slate-600 text-xs italic">Belum ada riwayat pekerjaan.</p>
                @endforelse
            </div>
        </div>
    </div>

    <div class="col-span-12 xl:col-span-8 space-y-6">
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-slate-900 p-6 rounded-3xl border border-slate-800 hover:border-slate-700 transition">
                <p class="text-3xl font-bold text-white">{{ $projectsCount }}</p>
                <p class="text-slate-500 text-sm">Total Projects</p>
            </div>
            <div class="bg-slate-900 p-6 rounded-3xl border border-slate-800 hover:border-slate-700 transition">
                <p class="text-3xl font-bold text-white">{{ $skills->count() }}</p>
                <p class="text-slate-500 text-sm">Skills Set</p>
            </div>
        </div>

        <div class="bg-slate-900 p-8 rounded-3xl border border-slate-800">
            <div class="flex justify-between items-center mb-4">
                <h3 class="font-bold text-white">Aspect Score</h3>
                <span class="text-purple-400 font-bold text-2xl">{{ number_format($avgSkill, 1) }}%</span>
            </div>
            <div class="w-full h-3 bg-slate-800 rounded-full overflow-hidden">
                <div class="h-full bg-gradient-to-r from-purple-500 to-indigo-500 rounded-full" style="width: {{ $avgSkill }}%"></div>
            </div>
        </div>

        <div class="bg-slate-900 p-6 rounded-3xl border border-slate-800">
            <div class="flex justify-between items-center mb-6">
                <h3 class="font-bold text-white">My Projects</h3>
                <a href="{{ route('admin.projects.index') }}" class="text-xs text-purple-400 hover:text-white transition">View All</a>
            </div>
            <div class="space-y-3">
                @forelse($projects->take(3) as $project)
                <div class="flex justify-between items-center p-4 border border-slate-800 rounded-2xl hover:bg-slate-800 transition">
                    <span class="font-medium text-slate-200">{{ $project->title }}</span>
                    <span class="text-[10px] uppercase font-bold px-3 py-1 rounded-full {{ $project->is_published ? 'bg-emerald-900/30 text-emerald-400' : 'bg-slate-700 text-slate-400' }}">
                        {{ $project->is_published ? 'Published' : 'Draft' }}
                    </span>
                </div>
                @empty
                    <p class="text-slate-600 text-sm italic">Belum ada proyek yang dibuat.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection