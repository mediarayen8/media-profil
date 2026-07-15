<!DOCTYPE html>
<html lang="id" class="h-full bg-slate-950">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="h-full text-slate-100 overflow-hidden">

    <div class="flex h-screen">
        <script src="https://cdn.tailwindcss.com"></script>
<script src="https://unpkg.com/@heroicons/v2/24/outline/index.js"></script>

<nav class="w-20 bg-slate-950 border-r border-slate-800 flex flex-col items-center py-6 gap-8 flex-shrink-0">
    <div class="w-10 h-10 bg-purple-600 rounded-xl flex items-center justify-center font-bold text-white shadow-lg shadow-purple-500/20">A</div>
    
    <div class="flex flex-col gap-6 w-full px-3">
    
    <a href="{{ route('admin.dashboard') }}" class="p-3 rounded-xl transition {{ request()->routeIs('admin.dashboard') ? 'bg-slate-800 text-white' : 'text-slate-500 hover:text-white' }}">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                </a>

                <a href="{{ route('admin.profile.edit') }}" 
   class="p-3 rounded-xl transition {{ request()->routeIs('admin.profile.*') ? 'bg-slate-800 text-white' : 'text-slate-500 hover:text-white' }}"
   title="Profile Settings">
    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
    </svg>
</a>

                <a href="{{ route('admin.projects.index') }}" class="p-3 rounded-xl transition {{ request()->routeIs('admin.projects.*') ? 'bg-slate-800 text-white' : 'text-slate-500 hover:text-white' }}">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                </a>

                <a href="{{ route('admin.experiences.index') }}" class="p-3 rounded-xl transition {{ request()->routeIs('admin.experiences.*') ? 'bg-slate-800 text-white' : 'text-slate-500 hover:text-white' }}">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                </a>
                <a href="{{ route('admin.educations.index') }}" 
   class="p-3 rounded-xl transition {{ request()->routeIs('admin.educations.*') ? 'bg-slate-800 text-white' : 'text-slate-500 hover:text-white' }}"
   title="Education History">
    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path>
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14v7"></path>
    </svg>
</a>
                <a href="{{ route('admin.skills.index') }}" 
       class="p-3 rounded-xl transition {{ request()->routeIs('admin.skills.*') ? 'bg-slate-800 text-white' : 'text-slate-500 hover:text-white' }}">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path></svg>
    </a>


</div>

    <form action="{{ route('logout') }}" method="POST" class="inline">
    @csrf
    <button type="submit" class="text-slate-500 hover:text-white flex items-center gap-2">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
        </svg>
    </button>
</form>
</nav>

        <main class="flex-1 overflow-y-auto bg-slate-950 p-8">
            <div class="mb-8 flex items-center text-sm text-slate-400">
                <span class="mr-2">Candidates</span>
                <span class="mr-2">/</span>
                <span class="bg-slate-800 px-3 py-1 rounded-full text-white">{{ auth()->user()->name }}</span>
            </div>

            @yield('content')
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
    </div>
</body>
</html>