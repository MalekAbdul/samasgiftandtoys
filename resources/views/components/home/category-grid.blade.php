<section class="py-14 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-8">
        <div>
            <span class="text-brand-primary font-bold text-xs uppercase tracking-widest">Browse Collection</span>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 mt-1">Shop by Category</h2>
        </div>
        <a href="{{ route('shop') }}" class="text-brand-primary hover:text-brand-primaryHover font-bold text-sm inline-flex items-center gap-1 mt-2 md:mt-0">
            View All Categories <i class="fa-solid fa-arrow-right text-xs"></i>
        </a>
    </div>

    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4">
        <x-frontend.category-card category="toys" icon="🧸" tone="bg-orange-100 text-orange-600" :count="$categoryCounts['toys'] ?? 0" />
        <x-frontend.category-card category="plush" icon="🦄" tone="bg-rose-100 text-rose-600" :count="$categoryCounts['plush'] ?? 0" />
        <x-frontend.category-card category="stem" icon="🧩" tone="bg-emerald-100 text-emerald-600" :count="$categoryCounts['stem'] ?? 0" />
        <x-frontend.category-card category="games" icon="🎲" tone="bg-purple-100 text-purple-600" :count="$categoryCounts['games'] ?? 0" />
        <x-frontend.category-card category="gifts" icon="🎁" tone="bg-amber-100 text-amber-600" :count="$categoryCounts['gifts'] ?? 0" />
        <a href="{{ route('shop', ['category' => 'baby']) }}" class="group bg-white p-4 rounded-2xl border border-slate-200/80 hover:border-brand-primary/50 shadow-soft hover:shadow-hover transition-all text-center block">
            <div class="w-16 h-16 mx-auto mb-3 rounded-full bg-sky-100 text-sky-600 flex items-center justify-center text-2xl group-hover:scale-110 transition-transform" aria-hidden="true">👶</div>
            <h3 class="font-bold text-slate-800 text-sm group-hover:text-brand-primary transition">Baby & Toddler</h3>
            <span class="text-[11px] text-slate-500 font-medium">Age 0 - 2 years</span>
        </a>
    </div>
</section>
