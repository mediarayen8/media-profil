<!DOCTYPE html>
<html lang="id" class="h-full bg-slate-950">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-full text-slate-100 font-sans antialiased overflow-hidden">

    <div class="flex h-screen">
        <aside class="w-20 flex-shrink-0 bg-slate-900 border-r border-slate-800 flex flex-col items-center py-6 gap-6">
            @include('layouts.navigation')
        </aside>

        <main class="flex-1 overflow-y-auto p-8">
            <div class="max-w-7xl mx-auto">
                @yield('content')
            </div>
        </main>
    </div>

</body>
</html>