@props(['product'])

<article
    class="product-card group bg-white rounded-2xl border border-slate-200/80 hover:border-brand-primary/40 p-4 shadow-soft hover:shadow-hover transition-all flex flex-col justify-between relative"
    data-product-id="{{ $product['id'] }}"
    data-category="{{ $product['category'] }}"
    data-age-group="{{ $product['ageGroup'] }}"
    data-price="{{ $product['price'] }}"
    data-rating="{{ $product['rating'] }}"
    data-sale="{{ $product['oldPrice'] !== null ? 'true' : 'false' }}"
    data-title="{{ $product['title'] }}"
>
    @if ($product['badge'])
        <span class="absolute top-6 left-6 z-10 bg-brand-primary text-white font-extrabold text-[10px] px-2.5 py-0.5 rounded-full uppercase shadow-xs">{{ $product['badge'] }}</span>
    @endif

    <button type="button" data-wishlist-toggle="{{ $product['id'] }}" aria-label="Add {{ $product['title'] }} to wishlist" aria-pressed="false" class="absolute top-6 right-6 z-10 w-8 h-8 rounded-full bg-white/80 backdrop-blur-xs text-slate-400 hover:text-rose-500 flex items-center justify-center shadow-xs transition">
        <i class="fa-regular fa-heart text-xs" aria-hidden="true"></i>
    </button>

    <a href="{{ route('product.show', ['slug' => $product['slug']]) }}" class="cursor-pointer">
        <div class="rounded-xl overflow-hidden bg-slate-50 mb-3 aspect-square relative">
            <img src="{{ str_starts_with($product['image'], 'http') ? $product['image'] : asset($product['image']) }}" alt="{{ $product['title'] }}" loading="lazy" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
        </div>
        <div class="flex items-center gap-1 text-amber-400 text-xs mb-1" aria-label="Rated {{ $product['rating'] }} out of 5">
            <i class="fa-solid fa-star" aria-hidden="true"></i>
            <span class="font-bold text-slate-800 text-[11px]">{{ number_format($product['rating'], 1) }}</span>
            <span class="text-slate-400 text-[10px]">({{ $product['reviewsCount'] }})</span>
        </div>
        <h3 class="font-bold text-slate-900 text-sm group-hover:text-brand-primary transition line-clamp-1">{{ $product['title'] }}</h3>
    </a>

    <div class="flex items-center justify-between mt-4 pt-3 border-t border-slate-100">
        <div>
            <span class="font-extrabold text-slate-900 text-base">${{ number_format($product['price'], 2) }}</span>
            @if ($product['oldPrice'])
                <span class="text-xs text-slate-400 line-through ml-1.5 font-semibold">${{ number_format($product['oldPrice'], 2) }}</span>
            @endif
        </div>
        <button type="button" data-add-to-cart="{{ $product['id'] }}" class="bg-brand-primary hover:bg-brand-primaryHover text-white text-xs font-bold px-3.5 py-2 rounded-xl shadow-xs transition flex items-center gap-1.5">
            <i class="fa-solid fa-cart-plus" aria-hidden="true"></i> Add
        </button>
    </div>
</article>
