<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>CV | {{ $profile->full_name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* CSS ini memaksa PDF/Print agar tampilan tidak berubah */
        @media print {
            body { 
                -webkit-print-color-adjust: exact !important; 
                print-color-adjust: exact !important; 
            }
            .no-print { display: none !important; }
            /* Memastikan flexbox tetap bekerja di PDF */
            .flex-row { display: flex !important; flex-direction: row !important; }
            section { page-break-inside: avoid; }
            @page { margin: 0; }
        }
    </style>
</head>
<body class="bg-gray-100 p-5 md:p-10">

    <div class="max-w-4xl mx-auto bg-white shadow-2xl flex flex-row min-h-[1000px] overflow-hidden">
        
        <div class="w-1/3 bg-slate-900 text-slate-300 p-8 flex-shrink-0">
            <div class="text-center mb-10">
                <img src="{{ $profile->photo_path ? asset('storage/' . $profile->photo_path) : asset('images/default-avatar.png') }}" 
                     class="w-32 h-32 rounded-full mx-auto border-4 border-slate-700 object-cover mb-4 shadow-lg">
                <h1 class="text-white text-lg font-bold uppercase tracking-wide leading-tight">
    {{ $profile->full_name }}
</h1>
                <p class="text-purple-400 text-sm font-medium">{{ $profile->job_title }}</p>
            </div>

            <div class="space-y-8">
                <div>
                    <h2 class="text-white font-bold uppercase border-b border-slate-700 pb-2 mb-4 text-sm tracking-widest">Contact</h2>
                    <div class="space-y-3 text-xs">
                        <p class="flex items-center break-all"><i class="fas fa-envelope mr-3 text-purple-500"></i>{{ $user->email }}</p>
                        @if($profile->whatsapp)
                            <p class="flex items-center"><i class="fab fa-whatsapp mr-3 text-purple-500"></i>{{ $profile->whatsapp }}</p>
                        @endif
                        @if($profile->linkedin_url)
                            <p class="flex items-center truncate"><i class="fab fa-linkedin mr-3 text-purple-500"></i>LinkedIn</p>
                        @endif
                    </div>
                </div>

                @foreach(['Tech Stacks' => $skills->where('category', 'tech'), 'Basic Skills' => $skills->where('category', 'basic')] as $title => $skillList)
                <div>
                    <h2 class="text-white font-bold uppercase border-b border-slate-700 pb-2 mb-4 text-sm tracking-widest">{{ $title }}</h2>
                    <div class="space-y-4">
                        @foreach($skillList as $skill)
                        <div>
                            <div class="flex justify-between text-[10px] mb-1.5 text-slate-300">
                                <span>{{ $skill->name }}</span>
                                <span>{{ $skill->proficiency }}%</span>
                            </div>
                            <div class="w-full bg-slate-700 h-1.5 rounded-full overflow-hidden">
                                <div class="bg-purple-600 h-1.5 rounded-full" style="width: {{ $skill->proficiency }}%"></div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="w-2/3 p-10 text-slate-800 bg-white">
            @php
                $sections = [
                    ['title' => 'Objective', 'data' => $profile->bio, 'is_text' => true],
                    ['title' => 'Education', 'data' => $educations, 'is_text' => false],
                    ['title' => 'Work Experience', 'data' => $experiences, 'is_text' => false],
                    ['title' => 'Projects', 'data' => $projects, 'is_text' => false],
                ];
            @endphp

            @foreach($sections as $section)
            <section class="mb-8">
                <h2 class="text-sm font-bold uppercase text-slate-900 mb-5 flex items-center justify-center tracking-[0.2em]">
                    <span class="flex-grow h-[1px] bg-slate-300 mr-4"></span>
                    {{ $section['title'] }}
                    <span class="flex-grow h-[1px] bg-slate-300 ml-4"></span>
                </h2>

                @if($section['is_text'])
                    <p class="text-sm text-slate-600 leading-relaxed text-center font-medium">{{ $section['data'] }}</p>
                @else
                    <div class="space-y-6">
                        @if($section['title'] == 'Education')
                            @foreach($educations as $edu)
                            <div class="flex justify-between items-start">
                                <div><h3 class="font-bold text-sm">{{ $edu->institution }}</h3><p class="text-xs text-slate-500">{{ $edu->degree }}</p></div>
                                <span class="text-xs text-slate-400 font-mono">{{ $edu->start_year }} - {{ $edu->end_year }}</span>
                            </div>
                            @endforeach
                        @elseif($section['title'] == 'Work Experience')
                            @foreach($experiences as $exp)
                            <div class="space-y-1">
                                <div class="flex justify-between items-baseline">
                                    <h3 class="font-bold text-sm">{{ $exp->position }}</h3>
                                    <span class="text-xs text-slate-400 font-mono">{{ \Carbon\Carbon::parse($exp->start_date)->format('M Y') }} - {{ $exp->end_date ? \Carbon\Carbon::parse($exp->end_date)->format('M Y') : 'Present' }}</span>
                                </div>
                                <p class="text-xs text-slate-500 italic">{{ $exp->company }}</p>
                                <p class="text-xs text-slate-600 leading-relaxed">{{ $exp->description }}</p>
                            </div>
                            @endforeach
                       @elseif($section['title'] == 'Projects')
    <div class="space-y-6">
        @foreach($projects as $project)
        <div class="relative pl-4 border-l-2 border-purple-200">
            <div class="flex items-center justify-between mb-1.5">
                <h3 class="font-bold text-sm text-slate-800 tracking-wide">
                    {{ $project->title }}
                </h3>
                @if($project->project_url)
                    <a href="{{ $project->project_url }}" target="_blank" 
                       class="text-purple-600 hover:text-purple-800 transition-colors">
                        <i class="fas fa-external-link-alt text-[10px]"></i>
                    </a>
                @endif
            </div>

            <p class="text-xs text-slate-600 leading-relaxed mb-3">
                {{ $project->description }}
            </p>

            @if(!empty($project->tech_stack))
            <div class="flex flex-wrap gap-2">
                @foreach(is_array($project->tech_stack) ? $project->tech_stack : json_decode($project->tech_stack, true) ?? [] as $tech)
                    <span class="inline-block text-[9px] font-medium text-slate-500 bg-slate-100 px-2 py-0.5 rounded border border-slate-200">
                        {{ $tech }}
                    </span>
                @endforeach
            </div>
            @endif
        </div>
        @endforeach
    </div>
@endif
                    </div>
                @endif
            </section>
            @endforeach
        </div>
    </div>

    <div class="text-center mt-6 no-print">
        <button onclick="window.print()" class="bg-purple-600 text-white px-8 py-3 rounded-lg hover:bg-purple-700 transition font-bold shadow-lg">
            <i class="fas fa-download mr-2"></i> Download as PDF
        </button>
    </div>
</body>
</html>