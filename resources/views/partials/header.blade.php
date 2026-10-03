<header class="sticky top-0 bg-white/95 backdrop-blur-md border-b border-slate-200/80 z-40 shadow-xs">
        <!-- Main Top Bar -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3 sm:py-4">
            <div class="flex items-center justify-between gap-4">
                
                <!-- Logo -->
                <a href="/" onclick="navigateTo('home'); return false;" class="flex items-center gap-2.5 group">
                    <div class="w-10 h-10 sm:w-11 sm:h-11 rounded-2xl bg-brand-primary text-white flex items-center justify-center font-bold text-xl shadow-md group-hover:scale-105 transition-transform">
                        <i class="fa-solid fa-gift text-lg"></i>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-extrabold text-lg sm:text-xl tracking-tight text-slate-900 group-hover:text-brand-primary transition-colors">
                            SAMA'S <span class="text-brand-primary font-normal text-xs sm:text-sm block sm:inline text-slate-500 font-semibold tracking-wide">GIFTS & TOYS</span>
                        </span>
                    </div>
                </a>

                <!-- Search Bar with Live Suggestions Dropdown -->
                <div class="hidden md:flex flex-1 max-w-lg relative mx-4">
                    <div class="relative w-full">
                        <input type="text" id="header-search-input" oninput="handleLiveSearch(this.value, this.id)" onkeydown="handleSearchSubmit(event, this.id)" placeholder="Search toys, plush, dolls, puzzles..." class="w-full bg-slate-100 hover:bg-slate-50 focus:bg-white text-slate-800 placeholder-slate-400 pl-11 pr-10 py-2.5 rounded-full text-sm border border-slate-200 focus:border-brand-primary focus:outline-none focus:ring-2 focus:ring-brand-primary/20 transition-all">
                        <i class="fa-solid fa-magnifying-glass absolute left-4 top-3.2 text-slate-400"></i>
                        <button onclick="clearHeaderSearch()" id="header-search-clear" class="hidden absolute right-3 top-3 text-slate-400 hover:text-slate-600">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>

                    <!-- Live Search Results Dropdown -->
                    <div id="search-results-dropdown" class="hidden absolute top-full left-0 right-0 mt-2 bg-white rounded-2xl shadow-floating border border-slate-100 overflow-hidden z-50">
                        <div id="search-results-content" class="max-h-80 overflow-y-auto divide-y divide-slate-100 p-2"></div>
                    </div>
                </div>

                <!-- Header Actions -->
                <div class="flex items-center gap-1.5 sm:gap-3">
                    <!-- Wishlist Button -->
                    <button onclick="filterShopCategory('wishlist')" class="p-2 sm:px-3 sm:py-2 text-slate-600 hover:text-brand-primary rounded-full hover:bg-slate-100 transition relative flex items-center gap-2">
                        <i class="fa-regular fa-heart text-xl sm:text-lg"></i>
                        <span class="hidden lg:inline text-xs font-semibold">Wishlist</span>
                        <span id="wishlist-badge" class="absolute -top-1 -right-1 bg-brand-amber text-slate-900 font-extrabold text-[10px] w-4 h-4 rounded-full flex items-center justify-center">0</span>
                    </button>

                    <!-- Account Button -->
                    <button onclick="showAccountModal()" class="p-2 sm:px-3 sm:py-2 text-slate-600 hover:text-brand-primary rounded-full hover:bg-slate-100 transition flex items-center gap-2">
                        <i class="fa-regular fa-user text-xl sm:text-lg"></i>
                        <span class="hidden lg:inline text-xs font-semibold">Account</span>
                    </button>

                    <!-- Cart Icon & Drawer Trigger -->
                    <button onclick="toggleCartDrawer()" class="relative bg-brand-primary hover:bg-brand-primaryHover text-white px-3.5 py-2 sm:px-4 sm:py-2.5 rounded-full shadow-md transition-all flex items-center gap-2.5 group">
                        <i class="fa-solid fa-bag-shopping text-base group-hover:rotate-12 transition-transform"></i>
                        <span class="hidden sm:inline font-bold text-xs tracking-wide uppercase">Cart</span>
                        <span id="header-cart-badge" class="bg-white text-brand-primary font-extrabold text-xs px-2 py-0.5 rounded-full min-w-[20px] text-center shadow-xs">0</span>
                    </button>

                    <!-- Mobile Menu Hamburger Button -->
                    <button onclick="toggleMobileMenu()" class="md:hidden p-2 text-slate-700 hover:text-brand-primary text-xl">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                </div>
            </div>

            <!-- Mobile Search Bar -->
            <div class="mt-3 md:hidden">
                <div class="relative w-full">
                    <input type="text" id="mobile-search-input" oninput="handleLiveSearch(this.value, this.id)" onkeydown="handleSearchSubmit(event, this.id)" placeholder="Search gifts & toys..." class="w-full bg-slate-100 text-slate-800 placeholder-slate-400 pl-10 pr-10 py-2 rounded-full text-sm border border-slate-200">
                    <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-2.5 text-slate-400"></i>
                    <button onclick="clearHeaderSearch('mobile-search-input')" id="mobile-search-clear" class="hidden absolute right-3 top-2.5 text-slate-400 hover:text-slate-600">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                    <div id="mobile-search-results-dropdown" class="hidden absolute top-full left-0 right-0 mt-2 bg-white rounded-2xl shadow-floating border border-slate-100 overflow-hidden z-50">
                        <div id="mobile-search-results-content" class="max-h-80 overflow-y-auto divide-y divide-slate-100 p-2"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Blade Partial: resources/views/components/navbar.blade.php -->
        <nav class="hidden md:block bg-slate-50 border-t border-slate-200/60 text-xs font-semibold">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between">
                <ul class="flex items-center gap-1 py-1">
                    <li><button type="button" onclick="navigateTo('home')" class="px-3 py-2 rounded-lg text-slate-700 hover:text-brand-primary hover:bg-white transition inline-block">Home</button></li>
                    <li><button type="button" onclick="filterShopCategory('all')" class="px-3 py-2 rounded-lg text-slate-700 hover:text-brand-primary hover:bg-white transition inline-block">Shop All</button></li>
                    <li><button type="button" onclick="filterShopCategory('toys')" class="px-3 py-2 rounded-lg text-slate-700 hover:text-brand-primary hover:bg-white transition inline-block">Toys</button></li>
                    <li><button type="button" onclick="filterShopCategory('gifts')" class="px-3 py-2 rounded-lg text-slate-700 hover:text-brand-primary hover:bg-white transition inline-block">Gifts</button></li>
                    <li><button type="button" onclick="filterShopCategory('plush')" class="px-3 py-2 rounded-lg text-slate-700 hover:text-brand-primary hover:bg-white transition inline-block">Plush & Dolls</button></li>
                    <li><button type="button" onclick="filterShopCategory('stem')" class="px-3 py-2 rounded-lg text-slate-700 hover:text-brand-primary hover:bg-white transition inline-block">STEM & Games</button></li>
                    <li><button type="button" onclick="filterShopCategory('sale')" class="px-3 py-2 rounded-lg text-rose-600 font-bold hover:bg-rose-50 transition inline-block"><i class="fa-solid fa-fire mr-1"></i>Sale</button></li>
                </ul>
                <div class="flex items-center gap-4 text-slate-500 font-medium">
                    <button type="button" onclick="navigateTo('about')" class="hover:text-brand-primary transition">About Us</button>
                    <span>•</span>
                    <button type="button" onclick="navigateTo('faq')" class="hover:text-brand-primary transition">FAQ</button>
                    <span>•</span>
                    <button type="button" onclick="navigateTo('contact')" class="hover:text-brand-primary transition">Contact</button>
                </div>
            </div>
        </nav>

        <!-- Mobile Nav Drawer -->
        <div id="mobile-menu" class="hidden md:hidden bg-white border-b border-slate-200 px-4 py-3 space-y-2 text-sm font-medium">
            <button type="button" onclick="navigateTo('home'); toggleMobileMenu()" class="block w-full text-left py-2 text-slate-800 hover:text-brand-primary border-b border-slate-100">Home</button>
            <button type="button" onclick="filterShopCategory('all'); toggleMobileMenu()" class="block w-full text-left py-2 text-slate-800 hover:text-brand-primary border-b border-slate-100">Shop All Products</button>
            <button type="button" onclick="filterShopCategory('toys'); toggleMobileMenu()" class="block w-full text-left py-2 text-slate-800 hover:text-brand-primary border-b border-slate-100">Toys</button>
            <button type="button" onclick="filterShopCategory('gifts'); toggleMobileMenu()" class="block w-full text-left py-2 text-slate-800 hover:text-brand-primary border-b border-slate-100">Gifts</button>
            <button type="button" onclick="filterShopCategory('plush'); toggleMobileMenu()" class="block w-full text-left py-2 text-slate-800 hover:text-brand-primary border-b border-slate-100">Plush & Dolls</button>
            <button type="button" onclick="filterShopCategory('sale'); toggleMobileMenu()" class="block w-full text-left py-2 text-rose-600 font-bold border-b border-slate-100">Sale & Clearance</button>
            <div class="pt-2 flex justify-between text-xs text-slate-500">
                <button type="button" onclick="navigateTo('about'); toggleMobileMenu()">About Us</button>
                <button type="button" onclick="navigateTo('faq'); toggleMobileMenu()">FAQ</button>
                <button type="button" onclick="navigateTo('contact'); toggleMobileMenu()">Contact Store</button>
            </div>
        </div>
    </header>
