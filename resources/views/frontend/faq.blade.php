@extends('layouts.frontend')

@section('title', $title)
@section('description', $description)

@section('content')
<section class="py-12 max-w-3xl mx-auto px-4">
            <div class="bg-white p-8 rounded-3xl border border-slate-200/80 shadow-soft space-y-6">
                <h1 class="text-3xl font-extrabold text-slate-900 text-center mb-6">Frequently Asked Questions</h1>
                <div class="space-y-4 text-xs sm:text-sm">
                    <div class="p-4 bg-slate-50 rounded-2xl">
                        <h3 class="font-bold text-slate-900 mb-1">How fast do you ship within the USA?</h3>
                        <p class="text-slate-600">Shipping options and delivery estimates will be published when online checkout is available.</p>
                    </div>
                    <div class="p-4 bg-slate-50 rounded-2xl">
                        <h3 class="font-bold text-slate-900 mb-1">Can I request custom gift wrapping?</h3>
                        <p class="text-slate-600">Gift-wrapping availability will be confirmed before online ordering launches.</p>
                    </div>
                </div>
            </div>
        </section>
@endsection
