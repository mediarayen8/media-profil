@extends('layouts.admin')

@section('content')
<div class="p-8 max-w-7xl mx-auto space-y-8">
    
    <div class="flex flex-col md:flex-row justify-between items-start gap-4">
        <div>
            <h1 class="text-3xl font-extrabold text-white">Dashboard</h1>
            <p class="text-slate-400">Selamat datang di pusat kendali portofolio Anda.</p>
        </div>
        <div class="flex gap-3">
            <a href="{{ route('profile.public', ['name' => str_replace(' ', '-', auth()->user()->name)]) }}" 
   target="_blank" 
   class="px-5 py-3 bg-slate-800 hover:bg-slate-700 text-white rounded-2xl font-bold transition flex items-center gap-2">
    <i class="fas fa-external-link-alt text-sm"></i> Lihat Website
</a>
            <a href="{{ route('admin.projects.create') }}" class="px-5 py-3 bg-purple-600 hover:bg-purple-500 text-white rounded-2xl font-bold transition flex items-center gap-2">
                <i class="fas fa-plus"></i> Tambah Proyek
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        @php 
            $stats = [
                ['Proyek', $projectsCount, 'text-purple-400', 'fa-briefcase'],
                ['Keahlian', $skills->count(), 'text-blue-400', 'fa-microchip'],
                ['Pengalaman', $experiences->count(), 'text-emerald-400', 'fa-history'],
                ['Pendidikan', $educations->count(), 'text-orange-400', 'fa-user-graduate']
            ];
        @endphp
        @foreach($stats as $stat)
        <div class="bg-slate-900 p-6 rounded-3xl border border-slate-800 hover:border-slate-700 transition-all flex items-center gap-5">
            <div class="w-14 h-14 bg-slate-950 rounded-2xl flex items-center justify-center text-xl {{ $stat[2] }}">
                <i class="fas {{ $stat[3] }}"></i>
            </div>
            <div>
                <p class="text-2xl font-bold text-white">{{ $stat[1] }}</p>
                <p class="text-slate-500 text-xs uppercase tracking-wider font-semibold">{{ $stat[0] }}</p>
            </div>
        </div>
        @endforeach
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <div class="lg:col-span-2 bg-slate-900 border border-slate-800 rounded-3xl overflow-hidden">
            <div class="p-6 border-b border-slate-800 flex justify-between items-center">
                <h3 class="font-bold text-white flex items-center gap-2">
                    <i class="fas fa-list-ul text-purple-400"></i> Proyek Terbaru
                </h3>
            </div>
            <div class="divide-y divide-slate-800">
                @forelse($projects->take(5) as $project)
                <div class="p-6 flex justify-between items-center hover:bg-slate-800/30 transition">
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 bg-slate-950 rounded-lg flex items-center justify-center text-slate-500">
                            <i class="fas fa-folder-open"></i>
                        </div>
                        <div>
                            <p class="font-bold text-white">{{ $project->title }}</p>
                            <p class="text-xs text-slate-500">{{ $project->created_at->format('d M Y') }}</p>
                        </div>
                    </div>
                    <span class="px-3 py-1 text-[10px] uppercase font-bold rounded-full {{ $project->is_published ? 'bg-emerald-900/30 text-emerald-400' : 'bg-slate-700 text-slate-400' }}">
                        {{ $project->is_published ? 'Published' : 'Draft' }}
                    </span>
                </div>
                @empty
                <div class="p-8 text-center text-slate-500 italic">Belum ada proyek.</div>
                @endforelse
            </div>
        </div>

        <div class="space-y-6">
            <div class="bg-slate-900 p-6 rounded-3xl border border-slate-800">
                <h3 class="font-bold text-white mb-4 flex items-center gap-2">
                    <i class="fas fa-chart-line text-purple-400"></i> Performance Score
                </h3>
                <div class="text-3xl font-extrabold text-white mb-2">{{ number_format($avgSkill, 1) }}%</div>
                <div class="h-2 w-full bg-slate-800 rounded-full overflow-hidden">
                    <div class="h-full bg-gradient-to-r from-purple-500 to-blue-500" style="width: {{ $avgSkill }}%"></div>
                </div>
            </div>

            <div class="bg-slate-900 p-6 rounded-3xl border border-slate-800">
    <h3 class="font-bold text-white mb-4 flex items-center gap-2">
        <i class="fas fa-compass text-purple-400"></i> Quick Access
    </h3>
    <div class="grid grid-cols-2 gap-3">
        <a href="{{ route('admin.profile.edit') }}" class="flex flex-col items-center justify-center p-4 bg-slate-800 rounded-2xl hover:bg-purple-900/30 hover:border-purple-500 border border-transparent transition group">
            <i class="fas fa-user-edit text-slate-400 group-hover:text-purple-400 mb-2"></i>
            <span class="text-[11px] font-bold uppercase text-slate-300">Profil</span>
        </a>

        <a href="{{ route('admin.projects.index') }}" class="flex flex-col items-center justify-center p-4 bg-slate-800 rounded-2xl hover:bg-purple-900/30 hover:border-purple-500 border border-transparent transition group">
            <i class="fas fa-folder-open text-slate-400 group-hover:text-purple-400 mb-2"></i>
            <span class="text-[11px] font-bold uppercase text-slate-300">Proyek</span>
        </a>

        <a href="{{ route('admin.skills.index') }}" class="flex flex-col items-center justify-center p-4 bg-slate-800 rounded-2xl hover:bg-purple-900/30 hover:border-purple-500 border border-transparent transition group">
            <i class="fas fa-tools text-slate-400 group-hover:text-purple-400 mb-2"></i>
            <span class="text-[11px] font-bold uppercase text-slate-300">Skill</span>
        </a>

        <a href="{{ route('admin.experiences.index') }}" class="flex flex-col items-center justify-center p-4 bg-slate-800 rounded-2xl hover:bg-purple-900/30 hover:border-purple-500 border border-transparent transition group">
            <i class="fas fa-history text-slate-400 group-hover:text-purple-400 mb-2"></i>
            <span class="text-[11px] font-bold uppercase text-slate-300">Exp</span>
        </a>

        <a href="{{ route('admin.educations.index') }}" class="flex flex-col items-center justify-center p-4 bg-slate-800 rounded-2xl hover:bg-purple-900/30 hover:border-purple-500 border border-transparent transition group">
            <i class="fas fa-graduation-cap text-slate-400 group-hover:text-purple-400 mb-2"></i>
            <span class="text-[11px] font-bold uppercase text-slate-300">Edu</span>
        </a>

        <a href="{{ route('admin.profile.edit') }}" class="flex flex-col items-center justify-center p-4 bg-slate-800 rounded-2xl hover:bg-purple-900/30 hover:border-purple-500 border border-transparent transition group">
            <i class="fas fa-cog text-slate-400 group-hover:text-purple-400 mb-2"></i>
            <span class="text-[11px] font-bold uppercase text-slate-300">Akun</span>
        </a>
    </div>
</div>
        </div>
    </div>
</div>
@endsection