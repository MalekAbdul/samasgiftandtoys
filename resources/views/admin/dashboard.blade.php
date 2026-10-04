@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-8">
    <div>
        <h1 class="text-2xl font-extrabold text-slate-900">
            {{ $isAdmin ? 'Admin dashboard' : 'Salesman dashboard' }}
        </h1>
        <p class="text-sm text-slate-500">Welcome back, {{ auth()->user()->name }}.</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        @foreach ($stats as $stat)
            <div class="bg-white rounded-2xl border border-slate-200 p-5">
                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wide">{{ $stat['label'] }}</p>
                <p class="mt-2 text-3xl font-extrabold text-slate-900">{{ $stat['value'] }}</p>
                <p class="mt-1 text-xs text-slate-400">{{ $stat['hint'] }}</p>
            </div>
        @endforeach
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <section class="bg-white rounded-2xl border border-slate-200 p-5">
            <h2 class="font-bold text-slate-900 mb-3">Low stock</h2>
            @if ($lowStockItems->isEmpty())
                <p class="text-sm text-slate-500">Nothing is running low.</p>
            @else
                <table class="w-full text-sm">
                    <thead class="text-left text-xs text-slate-500">
                        <tr><th class="py-1">Product</th><th>SKU</th><th class="text-right">On hand</th></tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach ($lowStockItems as $item)
                            <tr>
                                <td class="py-2">{{ $item->title }}</td>
                                <td class="text-slate-500">{{ $item->sku }}</td>
                                <td class="text-right font-semibold {{ $item->quantity_on_hand <= 0 ? 'text-red-600' : 'text-amber-600' }}">{{ $item->quantity_on_hand }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </section>

        <section class="bg-white rounded-2xl border border-slate-200 p-5">
            <h2 class="font-bold text-slate-900 mb-3">{{ $isAdmin ? 'Recent sales' : 'My recent sales' }}</h2>
            @if ($recentSales->isEmpty())
                <p class="text-sm text-slate-500">No sales recorded yet.</p>
            @else
                <table class="w-full text-sm">
                    <thead class="text-left text-xs text-slate-500">
                        <tr><th class="py-1">Sale</th><th>Channel</th><th>When</th><th class="text-right">Total</th></tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach ($recentSales as $sale)
                            <tr>
                                <td class="py-2 font-semibold">{{ $sale->sale_number }}</td>
                                <td class="uppercase text-xs text-slate-500">{{ $sale->channel }}</td>
                                <td class="text-slate-500">{{ \Illuminate\Support\Carbon::parse($sale->sold_at)->format('d M, h:i A') }}</td>
                                <td class="text-right font-semibold">${{ number_format((float) $sale->grand_total, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </section>
    </div>
</div>
@endsection
