<section class="py-14 sm:py-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center max-w-2xl mx-auto mb-8 sm:mb-10">
        <span class="text-brand-primary font-bold text-xs uppercase tracking-widest">Thoughtful Gifting</span>
        <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 mt-1">Shop by Occasion</h2>
        <p class="text-slate-600 text-sm mt-2">Find carefully curated gifts tailored for life's happiest celebrations.</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 sm:gap-6">
        <a href="{{ route('shop', ['category' => 'gifts']) }}" class="group flex h-full flex-col overflow-hidden rounded-3xl border border-slate-200/80 bg-white shadow-soft transition-shadow hover:shadow-hover">
            <div class="aspect-[4/3] overflow-hidden bg-amber-50">
                <img src="https://images.unsplash.com/photo-1530103862676-de8c9debad1d?auto=format&fit=crop&w=600&q=80" alt="Birthday Gifts" loading="lazy" class="block h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
            </div>
            <div class="flex flex-1 flex-col p-5">
                <span class="text-amber-600 font-bold text-xs uppercase">Most Popular</span>
                <h3 class="mt-1 text-slate-900 text-xl font-bold">Birthdays</h3>
                <p class="text-slate-600 text-xs mt-1">Fun toys & memorable gift boxes</p>
            </div>
        </a>

        <a href="{{ route('shop', ['category' => 'baby']) }}" class="group flex h-full flex-col overflow-hidden rounded-3xl border border-slate-200/80 bg-white shadow-soft transition-shadow hover:shadow-hover">
            <div class="aspect-[4/3] overflow-hidden bg-sky-50">
                <img src="https://images.unsplash.com/photo-1515488042361-ee00e0ddd4e4?auto=format&fit=crop&w=600&q=80" alt="Baby Showers" loading="lazy" class="block h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
            </div>
            <div class="flex flex-1 flex-col p-5">
                <span class="text-rose-600 font-bold text-xs uppercase">Soft & Gentle</span>
                <h3 class="mt-1 text-slate-900 text-xl font-bold">Baby Showers</h3>
                <p class="text-slate-600 text-xs mt-1">Rattles, plushies & newborn sets</p>
            </div>
        </a>

        <a href="{{ route('shop', ['category' => 'gifts']) }}" class="group flex h-full flex-col overflow-hidden rounded-3xl border border-slate-200/80 bg-white shadow-soft transition-shadow hover:shadow-hover">
            <div class="aspect-[4/3] overflow-hidden bg-emerald-50">
                <img src="https://images.unsplash.com/photo-1512909006721-3d6018887383?auto=format&fit=crop&w=600&q=80" alt="Holidays & Christmas" loading="lazy" class="block h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
            </div>
            <div class="flex flex-1 flex-col p-5">
                <span class="text-emerald-700 font-bold text-xs uppercase">Festive Joy</span>
                <h3 class="mt-1 text-slate-900 text-xl font-bold">Holidays</h3>
                <p class="text-slate-600 text-xs mt-1">Stocking stuffers & seasonal gifts</p>
            </div>
        </a>

        <a href="{{ route('shop', ['category' => 'gifts']) }}" class="group flex h-full flex-col overflow-hidden rounded-3xl border border-slate-200/80 bg-white shadow-soft transition-shadow hover:shadow-hover">
            <div class="aspect-[4/3] overflow-hidden bg-sky-50">
                <img src="https://images.unsplash.com/photo-1549465220-1a8b9238cd48?auto=format&fit=crop&w=600&q=80" alt="Just Because Gifts" loading="lazy" class="block h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
            </div>
            <div class="flex flex-1 flex-col p-5">
                <span class="text-sky-700 font-bold text-xs uppercase">Little Surprises</span>
                <h3 class="mt-1 text-slate-900 text-xl font-bold">Just Because</h3>
                <p class="text-slate-600 text-xs mt-1">Small tokens to brighten their day</p>
            </div>
        </a>
    </div>
</section>
