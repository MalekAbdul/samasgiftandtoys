@props(['category', 'icon', 'tone', 'count'])

<a href="{{ route('shop', ['category' => $category]) }}" class="group bg-white p-4 rounded-2xl border border-slate-200/80 hover:border-brand-primary/50 shadow-soft hover:shadow-hover transition-all text-center block">
    <div class="w-16 h-16 mx-auto mb-3 rounded-full {{ $tone }} flex items-center justify-center text-2xl group-hover:scale-110 transition-transform" aria-hidden="true">
        {{ $icon }}
    </div>
    <h3 class="font-bold text-slate-800 text-sm group-hover:text-brand-primary transition">{{ config('demo-catalog.categories.'.$category) }}</h3>
    <span class="text-[11px] text-slate-500 font-medium">{{ $count }} demo items</span>
</a>
