@extends('layouts.frontend')

@section('title', $title)
@section('description', $description)

@section('content')
<section id="view-shop" class="py-8 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" data-selected-category="{{ $selectedCategory }}" data-search-query="{{ $search }}">
    <x-frontend.breadcrumbs :items="[['label' => $categoryLabel, 'id' => 'shop-breadcrumb-category']]" />

    <div class="flex flex-col lg:flex-row gap-8">
        <aside class="w-full lg:w-64 shrink-0 space-y-6 bg-white p-6 rounded-2xl border border-slate-200/80 shadow-soft h-fit">
            <div class="flex justify-between items-center border-b border-slate-100 pb-4">
                <h2 class="font-extrabold text-slate-900 text-base"><i class="fa-solid fa-sliders text-brand-primary mr-2" aria-hidden="true"></i>Filters</h2>
                <button type="button" data-reset-filters class="text-xs text-brand-primary hover:underline font-semibold">Reset All</button>
            </div>

            <fieldset>
                <legend class="font-bold text-xs uppercase text-slate-500 tracking-wider mb-3">Categories</legend>
                <div class="space-y-2 text-xs font-medium text-slate-700">
                    @foreach (['all' => 'All Products'] + $categories + ['baby' => 'Baby & Toddler', 'sale' => 'Sale & Clearance', 'wishlist' => 'Wishlist'] as $category => $label)
                        <label class="flex items-center gap-2.5 cursor-pointer">
                            <input type="radio" name="shop-category" value="{{ $category }}" data-category-filter @checked($selectedCategory === $category) class="text-brand-primary focus:ring-brand-primary">
                            <span>{{ $label }}</span>
                        </label>
                    @endforeach
                </div>
            </fieldset>

            <div class="border-t border-slate-100 pt-4">
                <div class="flex justify-between items-center mb-2">
                    <label for="price-range-input" class="font-bold text-xs uppercase text-slate-500 tracking-wider">Max Price</label>
                    <span id="price-range-value" class="font-bold text-xs text-brand-primary">$100</span>
                </div>
                <input type="range" id="price-range-input" min="10" max="100" value="100" step="5" data-price-filter class="w-full accent-brand-primary cursor-pointer">
            </div>

            <fieldset class="border-t border-slate-100 pt-4">
                <legend class="font-bold text-xs uppercase text-slate-500 tracking-wider mb-3">Age Group</legend>
                <div class="space-y-2 text-xs font-medium text-slate-700">
                    <label class="flex items-center gap-2 cursor-pointer"><input type="checkbox" value="0-2" data-age-filter class="rounded text-brand-primary"> 0 - 2 Years (Toddler)</label>
                    <label class="flex items-center gap-2 cursor-pointer"><input type="checkbox" value="3-5" data-age-filter class="rounded text-brand-primary"> 3 - 5 Years (Preschool)</label>
                    <label class="flex items-center gap-2 cursor-pointer"><input type="checkbox" value="6-8" data-age-filter class="rounded text-brand-primary"> 6 - 8 Years</label>
                    <label class="flex items-center gap-2 cursor-pointer"><input type="checkbox" value="9+" data-age-filter class="rounded text-brand-primary"> 9+ Years</label>
                </div>
            </fieldset>
        </aside>

        <div class="flex-1 space-y-6">
            <div class="bg-white p-4 rounded-2xl border border-slate-200/80 shadow-soft flex flex-col sm:flex-row justify-between items-center gap-4">
                <p class="text-xs text-slate-600 font-medium">Showing <span id="shop-product-count" class="font-bold text-slate-900">0</span> Products</p>
                <select id="shop-sort-select" data-sort-products aria-label="Sort products" class="bg-slate-100 text-xs font-semibold text-slate-800 px-3 py-2 rounded-xl border border-slate-200 focus:outline-none">
                    <option value="featured">Featured First</option>
                    <option value="price-low">Price: Low to High</option>
                    <option value="price-high">Price: High to Low</option>
                    <option value="rating">Highest Rated</option>
                </select>
            </div>

            <div id="shop-products-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($products as $product)
                    <x-frontend.product-card :product="$product" />
                @endforeach
            </div>
            <p id="shop-empty-state" class="hidden col-span-full py-12 text-center text-slate-500">
                <i class="fa-solid fa-gift text-4xl mb-3 text-slate-300" aria-hidden="true"></i>
                <span class="block font-bold">No products found matching your filters.</span>
                <button type="button" data-reset-filters class="mt-3 text-xs text-brand-primary underline font-bold">Reset Filters</button>
            </p>
        </div>
    </div>
</section>
@endsection
