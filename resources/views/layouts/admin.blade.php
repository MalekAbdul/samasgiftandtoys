<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') | SAMA'S GIFTS & TOYS</title>
    @vite('resources/css/app.css')
</head>
<body class="min-h-screen bg-slate-50 text-slate-800 antialiased">
    <header class="bg-white border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 h-14 flex items-center justify-between gap-4">
            <div class="flex items-center gap-6">
                <a href="{{ route('admin.dashboard') }}" class="font-extrabold text-brand-primary">SAMA'S Admin</a>
                <nav class="flex items-center gap-4 text-sm font-semibold text-slate-600">
                    <a href="{{ route('admin.dashboard') }}" class="hover:text-brand-primary">Dashboard</a>
                    @if (auth()->user()->isAdmin())
                        <a href="{{ route('admin.users') }}" class="hover:text-brand-primary">Users</a>
                    @endif
                    <a href="{{ route('home') }}" target="_blank" class="hover:text-brand-primary">View store</a>
                </nav>
            </div>
            <div class="flex items-center gap-3 text-sm">
                <span class="hidden sm:inline font-semibold">{{ auth()->user()->name }}</span>
                <span class="px-2 py-0.5 rounded-full text-[11px] font-bold uppercase bg-brand-secondary text-brand-primary">{{ auth()->user()->role }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="px-3 py-1.5 rounded-full border border-slate-200 text-xs font-semibold hover:bg-slate-100">Logout</button>
                </form>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 py-8">
        @yield('content')
    </main>
</body>
</html>
