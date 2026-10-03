@extends('layouts.frontend')

@section('title', $title)
@section('description', $description)

@section('content')
<section class="py-12 max-w-3xl mx-auto px-4 text-center">
    <div class="bg-white p-8 sm:p-12 rounded-3xl border border-slate-200/80 shadow-soft space-y-6">
        <div class="w-20 h-20 rounded-full bg-amber-100 text-amber-600 flex items-center justify-center text-4xl mx-auto">
            <i class="fa-solid fa-circle-info" aria-hidden="true"></i>
        </div>
        <div>
            <span class="text-amber-600 font-bold text-xs uppercase tracking-widest">Preview Only</span>
            <h1 class="text-3xl font-extrabold text-slate-900 mt-1">Checkout is not enabled yet</h1>
            <p class="text-slate-600 text-sm mt-2">{{ session('status', 'No order or payment has been submitted.') }}</p>
        </div>
        <div class="bg-slate-50 p-6 rounded-2xl border border-slate-100 text-left text-xs sm:text-sm text-slate-600">
            The cart and checkout are frontend demonstrations. No order record, payment, or inventory change has been made.
        </div>
        <div class="flex flex-col sm:flex-row justify-center gap-3 pt-4">
            <a href="{{ route('home') }}" class="bg-brand-primary hover:bg-brand-primaryHover text-white font-bold text-sm px-6 py-3.5 rounded-2xl transition">Back to Home</a>
            <a href="{{ route('shop') }}" class="bg-slate-100 hover:bg-slate-200 text-slate-800 font-bold text-sm px-6 py-3.5 rounded-2xl transition">Continue Shopping</a>
        </div>
    </div>
</section>
@endsection
