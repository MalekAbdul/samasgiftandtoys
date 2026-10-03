@extends('layouts.frontend')

@section('title', $title)
@section('description', $description)

@section('content')
<section class="py-12 max-w-4xl mx-auto px-4">
            <div class="bg-white p-8 rounded-3xl border border-slate-200/80 shadow-soft space-y-6">
                <h1 class="text-3xl font-extrabold text-slate-900">About SAMA'S GIFTS & TOYS</h1>
                <p class="text-slate-600 text-sm leading-relaxed">SAMA'S GIFTS & TOYS began as a beloved brick-and-mortar physical retail shop serving families in our local community. Built on a love for childhood wonder and thoughtful gift-giving, we carefully select safe, high-quality, and creative toys that spark joy and imagination.</p>
                <div class="grid grid-cols-2 gap-4 pt-4">
                    <img src="https://images.unsplash.com/photo-1560506840-ec148e82a604?auto=format&fit=crop&w=600&q=80" class="rounded-2xl h-48 object-cover w-full">
                    <img src="https://images.unsplash.com/photo-1513151233558-d860c5398176?auto=format&fit=crop&w=600&q=80" class="rounded-2xl h-48 object-cover w-full">
                </div>
            </div>
        </section>
@endsection
