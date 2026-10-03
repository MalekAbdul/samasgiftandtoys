<header class="sticky top-0 bg-white/95 backdrop-blur-md border-b border-slate-200/80 z-40 shadow-xs">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3 sm:py-4">
        <div class="flex items-center justify-between gap-4">
            <a href="{{ route('home') }}" class="flex items-center gap-2.5 group">
                <div class="w-10 h-10 sm:w-11 sm:h-11 rounded-2xl bg-brand-primary text-white flex items-center justify-center font-bold text-xl shadow-md group-hover:scale-105 transition-transform">
                    <i class="fa-solid fa-gift text-lg" aria-hidden="true"></i>
                </div>
                <span class="font-extrabold text-lg sm:text-xl tracking-tight text-slate-900 group-hover:text-brand-primary transition-colors">
                    SAMA'S <span class="text-brand-primary font-normal text-xs sm:text-sm block sm:inline text-slate-500 font-semibold tracking-wide">GIFTS & TOYS</span>
                </span>
            </a>

            <form action="{{ route('shop') }}" method="GET" class="hidden md:flex flex-1 max-w-lg relative mx-4">
                <div class="relative w-full">
                    <input type="search" id="header-search-input" name="search" value="{{ request('search') }}" data-search-input placeholder="Search toys, plush, dolls, puzzles..." autocomplete="off" class="w-full bg-slate-100 hover:bg-slate-50 focus:bg-white text-slate-800 placeholder-slate-400 pl-11 pr-10 py-2.5 rounded-full text-sm border border-slate-200 focus:border-brand-primary focus:outline-none focus:ring-2 focus:ring-brand-primary/20 transition-all">
                    <!-- <i class="fa-solid fa-magnifying-glass absolute left-4 text-slate-400" aria-hidden="true"></i> -->
                    <button type="button" data-clear-search="header-search-input" id="header-search-clear" class="hidden absolute right-3 top-3 text-slate-400 hover:text-slate-600" aria-label="Clear search">
                        <i class="fa-solid fa-xmark" aria-hidden="true"></i>
                    </button>
                </div>
                <div id="search-results-dropdown" class="hidden absolute top-full left-0 right-0 mt-2 bg-white rounded-2xl shadow-floating border border-slate-100 overflow-hidden z-50">
                    <div id="search-results-content" class="max-h-80 overflow-y-auto divide-y divide-slate-100 p-2"></div>
                </div>
            </form>

            <div class="flex items-center gap-1.5 sm:gap-3">
                <a href="{{ route('shop', ['category' => 'wishlist']) }}" class="p-2 sm:px-3 sm:py-2 text-slate-600 hover:text-brand-primary rounded-full hover:bg-slate-100 transition relative flex items-center gap-2">
                    <i class="fa-regular fa-heart text-xl sm:text-lg" aria-hidden="true"></i>
                    <span class="hidden lg:inline text-xs font-semibold">Wishlist</span>
                    <span id="wishlist-badge" class="absolute -top-1 -right-1 bg-brand-amber text-slate-900 font-extrabold text-[10px] w-4 h-4 rounded-full flex items-center justify-center">0</span>
                </a>
                <button type="button" data-action="account" class="p-2 sm:px-3 sm:py-2 text-slate-600 hover:text-brand-primary rounded-full hover:bg-slate-100 transition flex items-center gap-2">
                    <i class="fa-regular fa-user text-xl sm:text-lg" aria-hidden="true"></i>
                    <span class="hidden lg:inline text-xs font-semibold">Account</span>
                </button>
                <button type="button" data-action="toggle-cart" aria-controls="cart-drawer" aria-expanded="false" class="relative bg-brand-primary hover:bg-brand-primaryHover text-white px-3.5 py-2 sm:px-4 sm:py-2.5 rounded-full shadow-md transition-all flex items-center gap-2.5 group">
                    <i class="fa-solid fa-bag-shopping text-base group-hover:rotate-12 transition-transform" aria-hidden="true"></i>
                    <span class="hidden sm:inline font-bold text-xs tracking-wide uppercase">Cart</span>
                    <span id="header-cart-badge" class="bg-white text-brand-primary font-extrabold text-xs px-2 py-0.5 rounded-full min-w-[20px] text-center shadow-xs">0</span>
                </button>
                <button type="button" data-action="toggle-mobile-menu" aria-controls="mobile-menu" aria-expanded="false" class="md:hidden p-2 text-slate-700 hover:text-brand-primary text-xl" aria-label="Toggle navigation menu">
                    <i class="fa-solid fa-bars" aria-hidden="true"></i>
                </button>
            </div>
        </div>

        <form action="{{ route('shop') }}" method="GET" class="mt-3 md:hidden relative">
            <input type="search" id="mobile-search-input" name="search" value="{{ request('search') }}" data-search-input placeholder="Search gifts & toys..." autocomplete="off" class="w-full bg-slate-100 text-slate-800 placeholder-slate-400 pl-10 pr-10 py-2 rounded-full text-sm border border-slate-200">
            <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-2.5 text-slate-400" aria-hidden="true"></i>
            <button type="button" data-clear-search="mobile-search-input" id="mobile-search-clear" class="hidden absolute right-3 top-2.5 text-slate-400 hover:text-slate-600" aria-label="Clear search">
                <i class="fa-solid fa-xmark" aria-hidden="true"></i>
            </button>
            <div id="mobile-search-results-dropdown" class="hidden absolute top-full left-0 right-0 mt-2 bg-white rounded-2xl shadow-floating border border-slate-100 overflow-hidden z-50">
                <div id="mobile-search-results-content" class="max-h-80 overflow-y-auto divide-y divide-slate-100 p-2"></div>
            </div>
        </form>
    </div>

    @include('components.frontend.navbar')
</header>
