@extends('layouts.frontend')

@section('title', 'Page Not Found | SAMA\'S GIFTS & TOYS')
@section('description', 'The requested page could not be found.')

@section('content')
<section class="py-16 max-w-3xl mx-auto px-4 text-center">
    <div class="bg-white p-8 sm:p-12 rounded-3xl border border-slate-200/80 shadow-soft">
        <p class="text-brand-primary font-extrabold text-sm uppercase tracking-widest">404</p>
        <h1 class="text-3xl font-extrabold text-slate-900 mt-2">We couldn't find that page</h1>
        <p class="text-slate-600 text-sm mt-3">The link may be incorrect, or the page may have moved.</p>
        <div class="flex justify-center gap-3 mt-6">
            <a href="{{ route('home') }}" class="bg-brand-primary hover:bg-brand-primaryHover text-white font-bold text-sm px-6 py-3 rounded-xl">Go Home</a>
            <a href="{{ route('shop') }}" class="bg-slate-100 hover:bg-slate-200 text-slate-800 font-bold text-sm px-6 py-3 rounded-xl">Browse Shop</a>
        </div>
    </div>
</section>
@endsection
