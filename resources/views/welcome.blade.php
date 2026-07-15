<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $profile->full_name ?? 'Portfolio' }} | Digital CV</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-slate-950 text-slate-300 min-h-screen">

    <nav class="fixed left-0 top-0 h-full w-20 border-r border-slate-900 flex flex-col items-center py-10 justify-between z-50 bg-slate-950 hidden md:flex">
        <div class="text-purple-600 font-bold text-2xl">R</div>
        
        <div class="flex flex-col gap-8 text-slate-500">
            <a href="#about" title="About" class="hover:text-purple-500 transition"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg></a>
            <a href="#resume" title="Experience" class="hover:text-purple-500 transition"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg></a>
            <a href="#education" title="Education" class="hover:text-purple-500 transition"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/></svg></a>
            <a href="#projects" title="Projects" class="hover:text-purple-500 transition"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"></path></svg></a>
            <a href="#tech-stacks" title="Tech Stacks" class="hover:text-purple-500 transition"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg></a>
            
        </div>

        <a href="#" title="Back to Top" class="text-slate-500 hover:text-purple-500 transition">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
        </a>
    </nav>

    <main class="pl-0 md:pl-20 py-12 px-8 md:px-20 max-w-6xl mx-auto">
        <header class="mb-12">
    <div class="relative bg-gradient-to-br from-purple-900/40 via-slate-900 to-slate-950 border border-purple-500/30 p-8 rounded-3xl backdrop-blur-xl shadow-2xl overflow-hidden group">
        
        <div class="absolute -top-20 -right-20 w-80 h-80 bg-purple-600/30 rounded-full blur-[100px]"></div>
        <div class="absolute -bottom-20 -left-20 w-80 h-80 bg-purple-900/20 rounded-full blur-[100px]"></div>
        
        <div class="flex flex-col md:flex-row gap-8 items-start relative z-10">
            <div class="relative w-32 h-32 group shrink-0">
                <div class="absolute inset-0 bg-purple-600 rounded-3xl rotate-3 group-hover:rotate-6 transition-transform"></div>
                <img src="{{ asset('storage/' . $profile->photo_path) }}" class="relative w-32 h-32 rounded-3xl object-cover border-4 border-slate-900 shadow-xl" alt="Profile">
            </div>

            <div class="flex-grow flex flex-col md:flex-row justify-between items-start gap-6">
                <div>
                    <h1 class="text-3xl font-extrabold text-white tracking-tight">
                        {{ $profile->full_name }}
                    </h1>
                    <p class="text-purple-300 font-medium uppercase tracking-[0.2em] text-sm mt-2">{{ $profile->job_title }}</p>
                    
                    <div class="flex flex-wrap gap-4 mt-6">
    <a href="mailto:{{ $user->email }}" class="px-4 py-2 bg-purple-900/50 hover:bg-red-900/50 text-red-300 hover:text-white rounded-xl text-xs font-bold transition-all flex items-center gap-2 border border-purple-500/20">
        <i class="fas fa-envelope"></i>
        <span>{{ $user->email }}</span>
    </a>

    @if($profile->whatsapp)
    <a href="https://wa.me/{{ $profile->whatsapp }}" target="_blank" class="px-4 py-2 bg-purple-900/50 hover:bg-green-600 text-green-300 hover:text-white rounded-xl text-xs font-bold transition-all flex items-center gap-2 border border-purple-500/20">
        <i class="fab fa-whatsapp"></i>
        <span>{{ $profile->whatsapp }}</span>
    </a>
    @endif

    @if($profile->linkedin_url)
    <a href="{{ $profile->linkedin_url }}" target="_blank" class="px-4 py-2 bg-purple-900/50 hover:bg-blue-600 text-blue-300 hover:text-white rounded-xl text-xs font-bold transition-all flex items-center gap-2 border border-purple-500/20">
        <i class="fab fa-linkedin"></i>
        <span>LinkedIn</span>
    </a>
    @endif
    
    @if($profile->github_url)
    <a href="{{ $profile->github_url }}" target="_blank" class="px-4 py-2 bg-purple-900/50 hover:bg-gray-600 text-gray-300 hover:text-white rounded-xl text-xs font-bold transition-all flex items-center gap-2 border border-purple-500/20">
        <i class="fab fa-github"></i>
        <span>GitHub</span>
    </a>
    @endif
</div>
                </div>

                <a href="{{ route('cv.view', $user->id) }}" target="_blank" class="px-6 py-2 bg-white text-slate-900 font-bold rounded-xl hover:bg-purple-200 transition-colors shrink-0">
                    Lihat CV
                </a>
            </div>
        </div>
    </div>
</header>

        <div class="grid grid-cols-12 gap-8">
            <div class="col-span-12 lg:col-span-8 space-y-8">
                <section id="about" class="bg-slate-900/40 border border-slate-700/50 p-8 rounded-3xl backdrop-blur-sm">
                    <h2 class="text-sm font-bold text-white mb-4 tracking-widest uppercase text-purple-400 flex items-center gap-2">About Me</h2>
                    <p class="leading-relaxed text-slate-400">{{ $profile->bio }}</p>
                </section>

                <section id="projects">
                    <h2 class="text-sm font-bold text-white mb-6 tracking-widest uppercase text-purple-400 flex items-center gap-2 px-2">Featured Projects</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach($projects as $project)
                        <a href="{{ $project->project_url }}" target="_blank" class="block group">
                            <div class="bg-slate-900/40 rounded-3xl border border-slate-700/50 p-2 hover:border-purple-500/50 transition-all backdrop-blur-sm h-full">
                                @if($project->image_path)
                                <div class="h-40 overflow-hidden rounded-2xl mb-4"><img src="{{ asset('storage/' . $project->image_path) }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"></div>
                                @endif
                                <div class="p-4">
                                    <h4 class="font-bold text-white group-hover:text-purple-400">{{ $project->title }}</h4>
                                    <p class="text-sm text-slate-400 mt-2">{{ $project->description }}</p>
                                    @php $techs = is_string($project->tech_stack) ? json_decode($project->tech_stack, true) : $project->tech_stack; @endphp
                                    @if(!empty($techs))
                                    <div class="flex flex-wrap gap-2 mt-4">
                                        @foreach($techs as $tech)<span class="text-[10px] uppercase font-bold text-purple-400 bg-purple-900/30 px-2 py-1 rounded-lg border border-purple-500/20">{{ $tech }}</span>@endforeach
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </section>
            </div>

            <div class="col-span-12 lg:col-span-4 space-y-8">
                <div class="lg:sticky lg:top-8 space-y-8">
                    <section id="skills" class="bg-slate-900/40 border border-slate-700/50 p-8 rounded-3xl backdrop-blur-sm">
    <h2 class="text-sm font-bold text-white mb-8 tracking-widest uppercase text-purple-400 flex items-center gap-2">Skills & Expertise</h2>
    
    <div class="mb-8">
        <h3 class="text-xs font-bold text-slate-500 uppercase tracking-widest mb-4">Tech Stacks</h3>
        <div class="space-y-6">
            @foreach($skills->where('category', 'tech') as $skill)
            <div>
                <div class="flex justify-between text-sm mb-2">
                    <span class="text-slate-300">{{ $skill->name }}</span>
                    <span class="text-purple-400">{{ $skill->proficiency }}%</span>
                </div>
                <div class="h-1.5 w-full bg-slate-800 rounded-full">
                    <div class="h-1.5 bg-purple-600 rounded-full" style="width: {{ $skill->proficiency }}%"></div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div>
        <h3 class="text-xs font-bold text-slate-500 uppercase tracking-widest mb-4">Basic Skills</h3>
        <div class="space-y-6">
            @foreach($skills->where('category', 'basic') as $skill)
            <div>
                <div class="flex justify-between text-sm mb-2">
                    <span class="text-slate-300">{{ $skill->name }}</span>
                    <span class="text-purple-400">{{ $skill->proficiency }}%</span>
                </div>
                <div class="h-1.5 w-full bg-slate-800 rounded-full">
                    <div class="h-1.5 bg-purple-600 rounded-full" style="width: {{ $skill->proficiency }}%"></div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
                    <section id="resume" class="bg-slate-900/40 border border-slate-700/50 p-8 rounded-3xl backdrop-blur-sm">
                    <h2 class="text-sm font-bold text-white mb-8 tracking-widest uppercase text-purple-400 flex items-center gap-2">Experience</h2>
                    <div class="space-y-8">
                        @foreach($experiences as $exp)
                        <div class="pl-4 border-l-2 border-slate-700 hover:border-purple-500 transition-colors">
                            <h3 class="font-bold text-white">{{ $exp->position }}</h3>
                            <p class="text-purple-400 text-xs font-semibold uppercase tracking-widest mt-1">{{ $exp->company }} | {{ \Carbon\Carbon::parse($exp->start_date)->format('M Y') }} - {{ $exp->end_date ? \Carbon\Carbon::parse($exp->end_date)->format('M Y') : 'Present' }}</p>
                            <p class="text-sm text-slate-400 mt-3">{{ $exp->description }}</p>
                        </div>
                        @endforeach
                    </div>
                </section>
                <section id="education" class="bg-slate-900/40 border border-slate-700/50 p-8 rounded-3xl backdrop-blur-sm">
                    <h2 class="text-sm font-bold text-white mb-8 tracking-widest uppercase text-purple-400 flex items-center gap-2">Education</h2>
                    <div class="space-y-8">
                        @foreach($educations as $edu)
                        <div class="pl-4 border-l-2 border-slate-700 hover:border-purple-500 transition-colors">
                            <h3 class="font-bold text-white">{{ $edu->institution }}</h3>
                            <p class="text-purple-400 text-xs font-semibold uppercase tracking-widest mt-1">{{ $edu->degree ?? 'General Education' }}</p>
                            <p class="text-slate-500 text-xs font-medium mt-1">{{ $edu->start_year }} - {{ $edu->end_year }}</p>
                        </div>
                        @endforeach
                    </div>
                </section>
                </div>
            </div>
        </div>
        <footer class="mt-16 py-8 border-t border-purple-500/20 text-center">
    <div class="flex flex-col items-center gap-2">
        <p class="text-slate-400 text-sm">
            &copy; {{ date('Y') }} {{ $profile->full_name }}. Semua hak dilindungi.
        </p>
        <p class="text-purple-500/60 text-xs font-medium uppercase tracking-widest">
            Portfolio Media Profil
        </p>
    </div>
</footer>
    </main>
</body>
</html>