@extends('layouts.frontend')

@section('title', $title)
@section('description', $description)
@section('og_image', str_starts_with($product['image'], 'http') ? $product['image'] : asset($product['image']))

@section('content')
<section class="py-8 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <x-frontend.breadcrumbs :items="[['label' => 'Shop', 'url' => route('shop')], ['label' => $product['title']]]" />

    <div class="bg-white rounded-3xl border border-slate-200/80 p-6 lg:p-10 shadow-soft">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
            <div class="lg:col-span-6 space-y-4">
                <div class="relative rounded-2xl overflow-hidden bg-slate-100 border border-slate-200 aspect-square">
                    <img id="detail-main-image" src="{{ str_starts_with($product['image'], 'http') ? $product['image'] : asset($product['image']) }}" alt="{{ $product['title'] }}" class="w-full h-full object-cover">
                    <span class="absolute top-4 left-4 bg-brand-primary text-white font-extrabold text-xs px-3 py-1 rounded-full uppercase">{{ $product['badge'] }}</span>
                </div>
                <div class="grid grid-cols-4 gap-3" aria-label="Product images">
                    <button type="button" data-product-thumbnail="{{ str_starts_with($product['image'], 'http') ? $product['image'] : asset($product['image']) }}" aria-label="Show {{ $product['title'] }} image" class="rounded-xl border border-brand-primary cursor-pointer overflow-hidden h-16 w-full">
                        <img src="{{ str_starts_with($product['image'], 'http') ? $product['image'] : asset($product['image']) }}" alt="" class="h-full w-full object-cover">
                    </button>
                </div>
            </div>

            <div class="lg:col-span-6 space-y-6" data-product-detail="{{ $product['id'] }}">
                <div>
                    <span class="text-brand-primary font-bold text-xs uppercase tracking-wider">{{ $categoryLabel }}</span>
                    <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 mt-1">{{ $product['title'] }}</h1>
                    <div class="flex items-center gap-2 mt-2">
                        <div class="flex text-amber-400 text-sm" aria-hidden="true">@for ($star = 0; $star < 5; $star++)<i class="fa-solid fa-star"></i>@endfor</div>
                        <span class="text-xs font-semibold text-slate-600">({{ number_format($product['rating'], 1) }} / 5.0 from {{ $product['reviewsCount'] }} demo reviews)</span>
                    </div>
                </div>

                <div class="flex flex-wrap items-baseline gap-3 border-y border-slate-100 py-4">
                    <span class="text-3xl font-extrabold text-slate-900">${{ number_format($product['price'], 2) }}</span>
                    @if ($product['oldPrice'])
                        <span class="text-lg text-slate-400 line-through font-semibold">${{ number_format($product['oldPrice'], 2) }}</span>
                    @endif
                    <span class="text-xs font-bold text-slate-600 bg-slate-100 px-2.5 py-1 rounded-full">Availability details coming soon</span>
                </div>

                <p class="text-slate-600 text-sm leading-relaxed">{{ $product['description'] }}</p>

                <div class="grid grid-cols-2 gap-3 text-xs bg-slate-50 p-4 rounded-xl border border-slate-100">
                    <div><strong class="text-slate-900">Age:</strong> {{ $product['ageGroup'] }} Years</div>
                    <div><strong class="text-slate-900">SKU:</strong> {{ $product['specs']['sku'] }}</div>
                    <div><strong class="text-slate-900">Weight:</strong> {{ $product['specs']['weight'] }}</div>
                    <div><strong class="text-slate-900">Category:</strong> {{ $categoryLabel }}</div>
                </div>

                <div class="space-y-4 pt-2">
                    <div class="flex items-center gap-4">
                        <span class="text-xs font-bold text-slate-700">Quantity:</span>
                        <div class="flex items-center border border-slate-300 rounded-xl bg-white overflow-hidden">
                            <button type="button" data-quantity-change="-1" class="px-3 py-2 text-slate-600 hover:bg-slate-100" aria-label="Decrease quantity"><i class="fa-solid fa-minus text-xs" aria-hidden="true"></i></button>
                            <span data-quantity-value class="px-4 text-xs font-bold text-slate-900">1</span>
                            <button type="button" data-quantity-change="1" class="px-3 py-2 text-slate-600 hover:bg-slate-100" aria-label="Increase quantity"><i class="fa-solid fa-plus text-xs" aria-hidden="true"></i></button>
                        </div>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-3">
                        <button type="button" data-add-detail-to-cart class="flex-1 bg-brand-primary hover:bg-brand-primaryHover text-white font-bold text-sm py-3.5 px-6 rounded-2xl shadow-md transition flex items-center justify-center gap-2">
                            <i class="fa-solid fa-bag-shopping" aria-hidden="true"></i> Add to Cart
                        </button>
                        <a href="{{ route('checkout') }}" data-buy-now class="flex-1 bg-slate-900 hover:bg-slate-800 text-white font-bold text-sm py-3.5 px-6 rounded-2xl transition text-center">Buy Now</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-12 border-t border-slate-200/80 pt-8">
            <div class="flex gap-6 border-b border-slate-200 text-sm font-bold pb-2">
                <span class="text-brand-primary border-b-2 border-brand-primary pb-2">Description & Specs</span>
                <span class="text-slate-500 pb-2">USA Delivery & Returns</span>
                <span class="text-slate-500 pb-2">Demo Ratings</span>
            </div>
            <div class="py-6 text-slate-600 text-sm space-y-3">
                <p>{{ $product['description'] }}</p>
                <p>Product safety, delivery, and return details will be provided before online purchasing is enabled.</p>
            </div>
        </div>
    </div>
</section>
@endsection
