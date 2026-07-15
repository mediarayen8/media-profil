<div class="mb-2">
    <div class="w-10 h-10 bg-purple-600 rounded-xl flex items-center justify-center font-bold text-white shadow-lg shadow-purple-500/20">A</div>
</div>

<div class="flex flex-col gap-4 w-full px-3">
    @php
        $links = [
            ['route' => 'dashboard', 'icon' => '🏠'],
            ['route' => 'admin.profile.edit', 'icon' => '👤'],
            ['route' => 'admin.projects.index', 'icon' => '💼'],
            ['route' => 'admin.skills.index', 'icon' => '⚡'],

        ];
    @endphp

    @foreach($links as $link)
        <a href="{{ route($link['route']) }}" 
           class="w-12 h-12 flex items-center justify-center rounded-xl transition-all duration-200 mx-auto
           {{ request()->routeIs($link['route']) ? 'bg-purple-600 text-white shadow-lg shadow-purple-500/20' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
           <span class="text-xl">{{ $link['icon'] }}</span>
        </a>
    @endforeach
</div>

<div class="mt-auto">
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="w-12 h-12 flex items-center justify-center text-rose-400 hover:bg-rose-900/20 rounded-xl transition">
            🚪
        </button>
    </form>
</div>
