<nav class="hidden md:block bg-slate-50 border-t border-slate-200/60 text-xl font-semibold" aria-label="Main navigation">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between">
        <ul class="flex items-center gap-1 py-1">
            <li><a href="{{ route('home') }}" class="px-3 py-2 rounded-lg text-slate-700 hover:text-brand-primary hover:bg-white transition inline-block">Home</a></li>
            <li><a href="{{ route('shop') }}" class="px-3 py-2 rounded-lg text-slate-700 hover:text-brand-primary hover:bg-white transition inline-block">Shop All</a></li>
            <li><a href="{{ route('shop', ['category' => 'toys']) }}" class="px-3 py-2 rounded-lg text-slate-700 hover:text-brand-primary hover:bg-white transition inline-block">Toys</a></li>
            <li><a href="{{ route('shop', ['category' => 'gifts']) }}" class="px-3 py-2 rounded-lg text-slate-700 hover:text-brand-primary hover:bg-white transition inline-block">Gifts</a></li>
            <li><a href="{{ route('shop', ['category' => 'plush']) }}" class="px-3 py-2 rounded-lg text-slate-700 hover:text-brand-primary hover:bg-white transition inline-block">Plush & Dolls</a></li>
            <li><a href="{{ route('shop', ['category' => 'stem']) }}" class="px-3 py-2 rounded-lg text-slate-700 hover:text-brand-primary hover:bg-white transition inline-block">STEM & Games</a></li>
            <li><a href="{{ route('shop', ['category' => 'sale']) }}" class="px-3 py-2 rounded-lg text-rose-600 font-bold hover:bg-rose-50 transition inline-block"><i class="fa-solid fa-fire mr-1" aria-hidden="true"></i>Sale</a></li>
        </ul>
        <div class="flex items-center gap-4 text-slate-500 font-medium">
            <a href="{{ route('about') }}" class="hover:text-brand-primary transition">About Us</a>
            <span aria-hidden="true">•</span>
            <a href="{{ route('faq') }}" class="hover:text-brand-primary transition">FAQ</a>
            <span aria-hidden="true">•</span>
            <a href="{{ route('contact') }}" class="hover:text-brand-primary transition">Contact</a>
        </div>
    </div>
</nav>

<div id="mobile-menu" class="hidden md:hidden bg-white border-b border-slate-200 px-4 py-3 space-y-2 text-lg font-semibold text-slate-800">
    <a href="{{ route('home') }}" class="block w-full text-left py-2 text-slate-800 hover:text-brand-primary border-b border-slate-100">Home</a>
    <a href="{{ route('shop') }}" class="block w-full text-left py-2 text-slate-800 hover:text-brand-primary border-b border-slate-100">Shop All Products</a>
    <a href="{{ route('shop', ['category' => 'toys']) }}" class="block w-full text-left py-2 text-slate-800 hover:text-brand-primary border-b border-slate-100">Toys</a>
    <a href="{{ route('shop', ['category' => 'gifts']) }}" class="block w-full text-left py-2 text-slate-800 hover:text-brand-primary border-b border-slate-100">Gifts</a>
    <a href="{{ route('shop', ['category' => 'plush']) }}" class="block w-full text-left py-2 text-slate-800 hover:text-brand-primary border-b border-slate-100">Plush & Dolls</a>
    <a href="{{ route('shop', ['category' => 'sale']) }}" class="block w-full text-left py-2 text-rose-600 font-bold border-b border-slate-100">Sale & Clearance</a>
    <div class="pt-2 flex justify-between text-xs text-slate-500">
        <a href="{{ route('about') }}">About Us</a>
        <a href="{{ route('faq') }}">FAQ</a>
        <a href="{{ route('contact') }}">Contact Store</a>
    </div>
</div>
