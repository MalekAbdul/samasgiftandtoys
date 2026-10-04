@extends('layouts.frontend')

@section('title', "Sign in | SAMA'S GIFTS & TOYS")
@section('description', 'Sign in to your account.')

@section('content')
<section class="py-12 max-w-md mx-auto px-4">
    <div class="bg-white p-8 rounded-3xl border border-slate-200/80 shadow-soft space-y-6">
        <h1 class="text-3xl font-extrabold text-slate-900 text-center">Sign in</h1>

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <div>
                <label for="email" class="block text-xs font-semibold text-slate-700 mb-1">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                       class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-brand-primary/40">
                @error('email')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-xs font-semibold text-slate-700 mb-1">Password</label>
                <input id="password" name="password" type="password" required autocomplete="current-password"
                       class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-brand-primary/40">
                @error('password')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <label class="flex items-center gap-2 text-xs text-slate-600">
                <input type="checkbox" name="remember" class="rounded border-slate-300"> Remember me
            </label>

            <button type="submit" class="w-full bg-brand-primary hover:bg-brand-primaryHover text-white font-bold py-3 rounded-full transition">
                Sign in
            </button>
        </form>
    </div>
</section>
@endsection
