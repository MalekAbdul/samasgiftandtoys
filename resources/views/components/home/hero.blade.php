<section class="border-b border-slate-200/60 bg-[#fffaf5]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-14 lg:py-16">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-brand-primary/10 text-brand-primary font-bold text-xs sm:text-sm tracking-wide uppercase">
                    <i class="fa-solid fa-sparkles" aria-hidden="true"></i> USA Local Retailer & Online Store
                </div>
                <h1 class="text-3xl sm:text-5xl lg:text-6xl font-extrabold text-slate-900 tracking-tight leading-tight">
                    Find Something <span class="text-brand-primary">Special</span> for Everyone
                </h1>
                <p class="text-base sm:text-lg text-slate-600 max-w-2xl mx-auto lg:mx-0 font-normal leading-relaxed">
                    Discover fun toys, thoughtful gifts, and joyful surprises made for every birthday, baby shower, holiday, and special moment.
                </p>

                <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-3 sm:gap-4 pt-1">
                    <a href="{{ route('shop', ['category' => 'toys']) }}" class="w-full sm:w-auto bg-brand-primary hover:bg-brand-primaryHover text-white font-bold text-base px-8 py-3.5 rounded-2xl shadow-soft hover:shadow-hover transition-all flex items-center justify-center gap-2">
                        <i class="fa-solid fa-cubes" aria-hidden="true"></i> Shop Toys
                    </a>
                    <a href="{{ route('shop', ['category' => 'gifts']) }}" class="w-full sm:w-auto bg-white hover:bg-brand-secondary text-slate-800 font-bold text-base px-8 py-3.5 rounded-2xl border border-slate-200 shadow-soft hover:border-brand-primary/40 transition-all flex items-center justify-center gap-2">
                        <i class="fa-solid fa-gift text-brand-primary" aria-hidden="true"></i> Explore Gifts
                    </a>
                </div>

                <div class="pt-5 border-t border-slate-200/70 grid grid-cols-1 sm:grid-cols-3 gap-3 text-left">
                    <div class="flex items-center justify-center lg:justify-start gap-2 text-xs font-semibold text-slate-600">
                        <i class="fa-solid fa-truck-fast text-brand-sage text-base shrink-0" aria-hidden="true"></i>
                        <span>Shipping details coming soon</span>
                    </div>
                    <div class="flex items-center justify-center lg:justify-start gap-2 text-xs font-semibold text-slate-600">
                        <i class="fa-solid fa-shield-heart text-brand-primary text-base shrink-0" aria-hidden="true"></i>
                        <span>Thoughtfully selected toys</span>
                    </div>
                    <div class="flex items-center justify-center lg:justify-start gap-2 text-xs font-semibold text-slate-600">
                        <i class="fa-solid fa-face-smile text-brand-amber text-base shrink-0" aria-hidden="true"></i>
                        <span>Local family-focused store</span>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-5 w-full max-w-xl mx-auto lg:max-w-none">

            <div class="overflow-hidden rounded-3xl border-4 border-white bg-amber-50 shadow-soft">

                <div id="banner-slider" data-banner-slider class="relative w-full aspect-[4/3]">

                    @php
                        $banners = [
                           
                            asset('images/banner/banner2.jpg'),
                            asset('images/banner/banner3.jpg'),
                            asset('images/banner/banner4.jpg'),
                            asset('images/banner/banner5.jpg'),
                        ];
                    @endphp

                    @foreach($banners as $index => $banner)
                        <img
                            src="{{ $banner }}"
                            alt="SAMA's Gifts & Toys Store"
                            class="banner-slide absolute inset-0 block w-full h-full object-cover transition-opacity duration-1000 ease-in-out
                            {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}"
                            loading="{{ $index === 0 ? 'eager' : 'lazy' }}"
                            aria-hidden="{{ $index === 0 ? 'false' : 'true' }}"
                        >
                    @endforeach

                </div>

            </div>

            <div class="mt-4 flex items-center justify-center lg:justify-start gap-3 rounded-2xl border border-amber-100 bg-white/90 px-4 py-3 shadow-soft">
                <span
                    class="w-11 h-11 rounded-full bg-amber-100 text-amber-600 flex items-center justify-center text-xl shrink-0"
                    aria-hidden="true"
                >
                    ⭐
                </span>

                <span class="text-sm font-bold text-slate-800">
                    Thoughtful gifts for joyful moments
                </span>
            </div>

        </div>
        </div>
    </div>
</section>
