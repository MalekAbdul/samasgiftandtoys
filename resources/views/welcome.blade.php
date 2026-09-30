<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAMA's GIFTS & TOYS | Thoughtful Gifts & Joyful Toys</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            primary: '#FF6B57', // Warm Coral
                            primaryHover: '#E85542',
                            secondary: '#FFF3EE',
                            amber: '#FFB800',
                            sage: '#4E9F8E',
                            sageLight: '#EBF5F3',
                            dark: '#1E293B',
                            muted: '#64748B',
                            bg: '#FAF8F5',
                            card: '#FFFFFF',
                            border: '#E2E8F0'
                        }
                    },
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'Inter', 'sans-serif'],
                        body: ['Inter', 'sans-serif'],
                    },
                    boxShadow: {
                        'soft': '0 4px 20px -2px rgba(30, 41, 59, 0.05)',
                        'hover': '0 12px 30px -4px rgba(255, 107, 87, 0.15)',
                        'floating': '0 20px 40px -10px rgba(0,0,0,0.12)'
                    }
                }
            }
        }
    </script>
    <style>
        body {
            background-color: #FAF8F5;
            color: #1E293B;
            font-family: 'Plus Jakarta Sans', sans-serif;
            -webkit-tap-highlight-color: transparent;
        }
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        .view-section {
            display: none;
            opacity: 0;
            transition: opacity 0.25s ease-in-out;
        }
        .view-section.active {
            display: block;
            opacity: 1;
        }
        .badge-pulse {
            animation: pulse-ring 2s infinite;
        }
        @keyframes pulse-ring {
            0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(255, 107, 87, 0.4); }
            70% { transform: scale(1); box-shadow: 0 0 0 8px rgba(255, 107, 87, 0); }
            100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(255, 107, 87, 0); }
        }
    </style>
</head>
<body class="min-h-screen flex flex-col justify-between antialiased selection:bg-brand-primary selection:text-white">

    <!-- Blade Partial: resources/views/components/announcement-bar.blade.php -->
    <div id="announcement-bar" class="bg-gradient-to-r from-brand-primary via-orange-500 to-amber-500 text-white text-xs sm:text-sm font-medium py-2 px-4 text-center flex justify-between items-center z-50 relative">
        <div class="container mx-auto flex justify-center items-center gap-2">
            <span>✨ Free Shipping on USA Orders Over $50 | Use Code: <strong class="underline decoration-wavy underline-offset-2">SAMAGIFT</strong> for 10% Off!</span>
            <button onclick="copyPromoCode('SAMAGIFT')" class="hidden sm:inline-block bg-white/20 hover:bg-white/30 text-white text-xs px-2 py-0.5 rounded transition">
                <i class="fa-regular font-mono fa-copy mr-1"></i>Copy
            </button>
        </div>
    </div>

    <!-- Toast Notification Container -->
    <div id="toast-container" class="fixed bottom-5 right-5 z-50 flex flex-col gap-2 pointer-events-none"></div>

    <!-- Blade Partial: resources/views/components/header.blade.php -->
    <header class="sticky top-0 bg-white/95 backdrop-blur-md border-b border-slate-200/80 z-40 shadow-xs">
        <!-- Main Top Bar -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3 sm:py-4">
            <div class="flex items-center justify-between gap-4">
                
                <!-- Logo -->
                <a href="#" onclick="navigateTo('home'); return false;" class="flex items-center gap-2.5 group">
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
                        <input type="text" id="header-search-input" onkeyup="handleLiveSearch(this.value)" placeholder="Search toys, plush, dolls, puzzles..." class="w-full bg-slate-100 hover:bg-slate-50 focus:bg-white text-slate-800 placeholder-slate-400 pl-11 pr-10 py-2.5 rounded-full text-sm border border-slate-200 focus:border-brand-primary focus:outline-none focus:ring-2 focus:ring-brand-primary/20 transition-all">
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
                    <button onclick="navigateTo('shop')" class="p-2 sm:px-3 sm:py-2 text-slate-600 hover:text-brand-primary rounded-full hover:bg-slate-100 transition relative flex items-center gap-2">
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
                    <input type="text" onkeyup="handleLiveSearch(this.value)" placeholder="Search gifts & toys..." class="w-full bg-slate-100 text-slate-800 placeholder-slate-400 pl-10 pr-4 py-2 rounded-full text-sm border border-slate-200">
                    <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-2.5 text-slate-400"></i>
                </div>
            </div>
        </div>

        <!-- Blade Partial: resources/views/components/navbar.blade.php -->
        <nav class="hidden md:block bg-slate-50 border-t border-slate-200/60 text-xs font-semibold">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between">
                <ul class="flex items-center gap-1 py-1">
                    <li><a href="#" onclick="navigateTo('home'); return false;" class="px-3 py-2 rounded-lg text-slate-700 hover:text-brand-primary hover:bg-white transition inline-block">Home</a></li>
                    <li><a href="#" onclick="filterShopCategory('all'); return false;" class="px-3 py-2 rounded-lg text-slate-700 hover:text-brand-primary hover:bg-white transition inline-block">Shop All</a></li>
                    <li><a href="#" onclick="filterShopCategory('toys'); return false;" class="px-3 py-2 rounded-lg text-slate-700 hover:text-brand-primary hover:bg-white transition inline-block">Toys</a></li>
                    <li><a href="#" onclick="filterShopCategory('gifts'); return false;" class="px-3 py-2 rounded-lg text-slate-700 hover:text-brand-primary hover:bg-white transition inline-block">Gifts</a></li>
                    <li><a href="#" onclick="filterShopCategory('plush'); return false;" class="px-3 py-2 rounded-lg text-slate-700 hover:text-brand-primary hover:bg-white transition inline-block">Plush & Dolls</a></li>
                    <li><a href="#" onclick="filterShopCategory('stem'); return false;" class="px-3 py-2 rounded-lg text-slate-700 hover:text-brand-primary hover:bg-white transition inline-block">STEM & Games</a></li>
                    <li><a href="#" onclick="filterShopCategory('sale'); return false;" class="px-3 py-2 rounded-lg text-rose-600 font-bold hover:bg-rose-50 transition inline-block"><i class="fa-solid fa-fire mr-1"></i>Sale</a></li>
                </ul>
                <div class="flex items-center gap-4 text-slate-500 font-medium">
                    <a href="#" onclick="navigateTo('about'); return false;" class="hover:text-brand-primary transition">About Us</a>
                    <span>•</span>
                    <a href="#" onclick="navigateTo('faq'); return false;" class="hover:text-brand-primary transition">FAQ</a>
                    <span>•</span>
                    <a href="#" onclick="navigateTo('contact'); return false;" class="hover:text-brand-primary transition">Contact</a>
                </div>
            </div>
        </nav>

        <!-- Mobile Nav Drawer -->
        <div id="mobile-menu" class="hidden md:hidden bg-white border-b border-slate-200 px-4 py-3 space-y-2 text-sm font-medium">
            <a href="#" onclick="navigateTo('home'); toggleMobileMenu(); return false;" class="block py-2 text-slate-800 hover:text-brand-primary border-b border-slate-100">Home</a>
            <a href="#" onclick="filterShopCategory('all'); toggleMobileMenu(); return false;" class="block py-2 text-slate-800 hover:text-brand-primary border-b border-slate-100">Shop All Products</a>
            <a href="#" onclick="filterShopCategory('toys'); toggleMobileMenu(); return false;" class="block py-2 text-slate-800 hover:text-brand-primary border-b border-slate-100">Toys</a>
            <a href="#" onclick="filterShopCategory('gifts'); toggleMobileMenu(); return false;" class="block py-2 text-slate-800 hover:text-brand-primary border-b border-slate-100">Gifts</a>
            <a href="#" onclick="filterShopCategory('plush'); toggleMobileMenu(); return false;" class="block py-2 text-slate-800 hover:text-brand-primary border-b border-slate-100">Plush & Dolls</a>
            <a href="#" onclick="filterShopCategory('sale'); toggleMobileMenu(); return false;" class="block py-2 text-rose-600 font-bold border-b border-slate-100">Sale & Clearance</a>
            <div class="pt-2 flex justify-between text-xs text-slate-500">
                <a href="#" onclick="navigateTo('about'); toggleMobileMenu(); return false;">About Us</a>
                <a href="#" onclick="navigateTo('faq'); toggleMobileMenu(); return false;">FAQ</a>
                <a href="#" onclick="navigateTo('contact'); toggleMobileMenu(); return false;">Contact Store</a>
            </div>
        </div>
    </header>


    <!-- ================================================================= -->
    <!-- MAIN CONTENT VIEW CONTAINERS (SPA NAVIGATION SWITCHER) -->
    <!-- ================================================================= -->
    <main class="flex-grow">

        <!-- 1. HOME PAGE VIEW -->
        <!-- Blade Partial: resources/views/frontend/home.blade.php -->
        <section id="view-home" class="view-section active">
            
            <!-- Hero Banner -->
            <div class="relative overflow-hidden bg-gradient-to-br from-orange-50 via-amber-50 to-emerald-50 py-12 lg:py-20 border-b border-slate-200/60">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                        <!-- Hero Content Left -->
                        <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-brand-primary/10 text-brand-primary font-bold text-xs sm:text-sm tracking-wide uppercase">
                                <i class="fa-solid fa-sparkles"></i> USA Local Retailer & Online Store
                            </div>
                            <h1 class="text-3xl sm:text-5xl lg:text-6xl font-extrabold text-slate-900 tracking-tight leading-tight">
                                Find Something <span class="text-brand-primary">Special</span> for Everyone
                            </h1>
                            <p class="text-base sm:text-lg text-slate-600 max-w-2xl mx-auto lg:mx-0 font-normal leading-relaxed">
                                Discover fun toys, thoughtful gifts, and joyful surprises made for every birthday, baby shower, holiday, and special moment.
                            </p>
                            
                            <!-- Hero CTA Buttons -->
                            <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-3 sm:gap-4 pt-2">
                                <button onclick="filterShopCategory('toys')" class="w-full sm:w-auto bg-brand-primary hover:bg-brand-primaryHover text-white font-bold text-base px-8 py-3.5 rounded-2xl shadow-lg hover:shadow-hover transition-all flex items-center justify-center gap-2">
                                    <i class="fa-solid fa-cubes"></i> Shop Toys
                                </button>
                                <button onclick="filterShopCategory('gifts')" class="w-full sm:w-auto bg-white hover:bg-slate-50 text-slate-800 font-bold text-base px-8 py-3.5 rounded-2xl border-2 border-slate-200 shadow-sm hover:border-brand-primary/40 transition-all flex items-center justify-center gap-2">
                                    <i class="fa-solid fa-gift text-brand-primary"></i> Explore Gifts
                                </button>
                            </div>

                            <!-- Trust Micro Indicators -->
                            <div class="pt-6 border-t border-slate-200/60 grid grid-cols-3 gap-2 text-center lg:text-left">
                                <div class="flex items-center justify-center lg:justify-start gap-2 text-xs font-semibold text-slate-600">
                                    <i class="fa-solid fa-truck-fast text-brand-sage text-base"></i> Fast 2-Day USA Delivery
                                </div>
                                <div class="flex items-center justify-center lg:justify-start gap-2 text-xs font-semibold text-slate-600">
                                    <i class="fa-solid fa-shield-heart text-brand-primary text-base"></i> 100% Kid Safe Quality
                                </div>
                                <div class="flex items-center justify-center lg:justify-start gap-2 text-xs font-semibold text-slate-600">
                                    <i class="fa-solid fa-face-smile text-brand-amber text-base"></i> 15,000+ Happy Families
                                </div>
                            </div>
                        </div>

                        <!-- Hero Right Image Showcase -->
                        <div class="lg:col-span-5 relative">
                            <div class="relative mx-auto max-w-md lg:max-w-none">
                                <div class="absolute -top-4 -left-4 w-72 h-72 bg-brand-amber/20 rounded-full blur-3xl"></div>
                                <div class="absolute -bottom-4 -right-4 w-72 h-72 bg-brand-primary/20 rounded-full blur-3xl"></div>
                                <img src="https://images.unsplash.com/photo-1560506840-ec148e82a604?auto=format&fit=crop&w=1000&q=80" alt="SAMA's Gifts & Toys Store Display" class="relative rounded-3xl shadow-2xl object-cover w-full h-[380px] sm:h-[450px] border-4 border-white">
                                
                                <!-- Floating Review Badge -->
                                <div class="absolute -bottom-6 -left-4 sm:left-6 bg-white p-4 rounded-2xl shadow-xl border border-slate-100 flex items-center gap-3">
                                    <div class="w-12 h-12 rounded-full bg-amber-100 text-amber-600 flex items-center justify-center font-bold text-xl">⭐</div>
                                    <div>
                                        <div class="flex text-amber-400 text-xs">
                                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                                        </div>
                                        <p class="text-xs font-bold text-slate-800">4.9/5 Rating from 2,400+ Parents</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CATEGORY SECTION -->
            <!-- Blade Partial: resources/views/components/category-grid.blade.php -->
            <section class="py-14 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row md:items-end justify-between mb-8">
                    <div>
                        <span class="text-brand-primary font-bold text-xs uppercase tracking-widest">Browse Collection</span>
                        <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 mt-1">Shop by Category</h2>
                    </div>
                    <a href="#" onclick="filterShopCategory('all'); return false;" class="text-brand-primary hover:text-brand-primaryHover font-bold text-sm inline-flex items-center gap-1 mt-2 md:mt-0">
                        View All Categories <i class="fa-solid fa-arrow-right text-xs"></i>
                    </a>
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4">
                    <!-- Category 1 -->
                    <div onclick="filterShopCategory('toys')" class="group cursor-pointer bg-white p-4 rounded-2xl border border-slate-200/80 hover:border-brand-primary/50 shadow-soft hover:shadow-hover transition-all text-center">
                        <div class="w-16 h-16 mx-auto mb-3 rounded-full bg-orange-100 text-orange-600 flex items-center justify-center text-2xl group-hover:scale-110 transition-transform">
                            🧸
                        </div>
                        <h3 class="font-bold text-slate-800 text-sm group-hover:text-brand-primary transition">Toys & Playsets</h3>
                        <span class="text-[11px] text-slate-500 font-medium">120+ Items</span>
                    </div>

                    <!-- Category 2 -->
                    <div onclick="filterShopCategory('plush')" class="group cursor-pointer bg-white p-4 rounded-2xl border border-slate-200/80 hover:border-brand-primary/50 shadow-soft hover:shadow-hover transition-all text-center">
                        <div class="w-16 h-16 mx-auto mb-3 rounded-full bg-rose-100 text-rose-600 flex items-center justify-center text-2xl group-hover:scale-110 transition-transform">
                            🦄
                        </div>
                        <h3 class="font-bold text-slate-800 text-sm group-hover:text-brand-primary transition">Plush & Dolls</h3>
                        <span class="text-[11px] text-slate-500 font-medium">85+ Items</span>
                    </div>

                    <!-- Category 3 -->
                    <div onclick="filterShopCategory('stem')" class="group cursor-pointer bg-white p-4 rounded-2xl border border-slate-200/80 hover:border-brand-primary/50 shadow-soft hover:shadow-hover transition-all text-center">
                        <div class="w-16 h-16 mx-auto mb-3 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center text-2xl group-hover:scale-110 transition-transform">
                            🧩
                        </div>
                        <h3 class="font-bold text-slate-800 text-sm group-hover:text-brand-primary transition">Educational & STEM</h3>
                        <span class="text-[11px] text-slate-500 font-medium">60+ Items</span>
                    </div>

                    <!-- Category 4 -->
                    <div onclick="filterShopCategory('games')" class="group cursor-pointer bg-white p-4 rounded-2xl border border-slate-200/80 hover:border-brand-primary/50 shadow-soft hover:shadow-hover transition-all text-center">
                        <div class="w-16 h-16 mx-auto mb-3 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center text-2xl group-hover:scale-110 transition-transform">
                            🎲
                        </div>
                        <h3 class="font-bold text-slate-800 text-sm group-hover:text-brand-primary transition">Games & Puzzles</h3>
                        <span class="text-[11px] text-slate-500 font-medium">45+ Items</span>
                    </div>

                    <!-- Category 5 -->
                    <div onclick="filterShopCategory('gifts')" class="group cursor-pointer bg-white p-4 rounded-2xl border border-slate-200/80 hover:border-brand-primary/50 shadow-soft hover:shadow-hover transition-all text-center">
                        <div class="w-16 h-16 mx-auto mb-3 rounded-full bg-amber-100 text-amber-600 flex items-center justify-center text-2xl group-hover:scale-110 transition-transform">
                            🎁
                        </div>
                        <h3 class="font-bold text-slate-800 text-sm group-hover:text-brand-primary transition">Birthday Gifts</h3>
                        <span class="text-[11px] text-slate-500 font-medium">90+ Items</span>
                    </div>

                    <!-- Category 6 -->
                    <div onclick="filterShopCategory('baby')" class="group cursor-pointer bg-white p-4 rounded-2xl border border-slate-200/80 hover:border-brand-primary/50 shadow-soft hover:shadow-hover transition-all text-center">
                        <div class="w-16 h-16 mx-auto mb-3 rounded-full bg-sky-100 text-sky-600 flex items-center justify-center text-2xl group-hover:scale-110 transition-transform">
                            👶
                        </div>
                        <h3 class="font-bold text-slate-800 text-sm group-hover:text-brand-primary transition">Baby & Toddler</h3>
                        <span class="text-[11px] text-slate-500 font-medium">50+ Items</span>
                    </div>
                </div>
            </section>

            <!-- FEATURED PRODUCTS GRID -->
            <!-- Blade Partial: resources/views/components/featured-products.blade.php -->
            <section class="py-12 bg-white border-y border-slate-200/60">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex items-center justify-between mb-8">
                        <div>
                            <span class="text-brand-primary font-bold text-xs uppercase tracking-widest">Handpicked Favorites</span>
                            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900">Featured Products</h2>
                        </div>
                        <button onclick="navigateTo('shop')" class="btn-secondary text-xs sm:text-sm font-bold text-slate-700 hover:text-brand-primary bg-slate-100 hover:bg-slate-200 px-4 py-2 rounded-xl transition">
                            Explore Shop <i class="fa-solid fa-arrow-right ml-1"></i>
                        </button>
                    </div>

                    <!-- Featured Products Grid Dynamic Container -->
                    <div id="home-featured-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                        <!-- Populated dynamically via JS renderProducts() -->
                    </div>
                </div>
            </section>

            <!-- SHOP BY OCCASION SECTION -->
            <section class="py-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-2xl mx-auto mb-10">
                    <span class="text-brand-primary font-bold text-xs uppercase tracking-widest">Thoughtful Gifting</span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 mt-1">Shop by Occasion</h2>
                    <p class="text-slate-600 text-sm mt-2">Find carefully curated gifts tailored for life's happiest celebrations.</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Occasion Card 1 -->
                    <div onclick="filterShopCategory('gifts')" class="group cursor-pointer relative rounded-3xl overflow-hidden shadow-soft h-72">
                        <img src="https://images.unsplash.com/photo-1530103862676-de8c9debad1d?auto=format&fit=crop&w=600&q=80" alt="Birthday Gifts" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-slate-900/30 to-transparent p-6 flex flex-col justify-end">
                            <span class="text-amber-300 font-bold text-xs uppercase">Most Popular</span>
                            <h3 class="text-white text-xl font-bold">Birthdays</h3>
                            <p class="text-slate-200 text-xs mt-1">Fun toys & memorable gift boxes</p>
                        </div>
                    </div>

                    <!-- Occasion Card 2 -->
                    <div onclick="filterShopCategory('baby')" class="group cursor-pointer relative rounded-3xl overflow-hidden shadow-soft h-72">
                        <img src="https://images.unsplash.com/photo-1515488042361-ee00e0ddd4e4?auto=format&fit=crop&w=600&q=80" alt="Baby Showers" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-slate-900/30 to-transparent p-6 flex flex-col justify-end">
                            <span class="text-rose-300 font-bold text-xs uppercase">Soft & Gentle</span>
                            <h3 class="text-white text-xl font-bold">Baby Showers</h3>
                            <p class="text-slate-200 text-xs mt-1">Rattles, plushies & newborn sets</p>
                        </div>
                    </div>

                    <!-- Occasion Card 3 -->
                    <div onclick="filterShopCategory('gifts')" class="group cursor-pointer relative rounded-3xl overflow-hidden shadow-soft h-72">
                        <img src="https://images.unsplash.com/photo-1512909006721-3d6018887383?auto=format&fit=crop&w=600&q=80" alt="Holidays & Christmas" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-slate-900/30 to-transparent p-6 flex flex-col justify-end">
                            <span class="text-emerald-300 font-bold text-xs uppercase">Festive Joy</span>
                            <h3 class="text-white text-xl font-bold">Holidays</h3>
                            <p class="text-slate-200 text-xs mt-1">Stocking stuffers & seasonal gifts</p>
                        </div>
                    </div>

                    <!-- Occasion Card 4 -->
                    <div onclick="filterShopCategory('gifts')" class="group cursor-pointer relative rounded-3xl overflow-hidden shadow-soft h-72">
                        <img src="https://images.unsplash.com/photo-1549465220-1a8b9238cd48?auto=format&fit=crop&w=600&q=80" alt="Just Because Gifts" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-slate-900/30 to-transparent p-6 flex flex-col justify-end">
                            <span class="text-sky-300 font-bold text-xs uppercase">Little Surprises</span>
                            <h3 class="text-white text-xl font-bold">Just Because</h3>
                            <p class="text-slate-200 text-xs mt-1">Small tokens to brighten their day</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- PROMOTIONAL BANNER SECTION -->
            <section class="py-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="relative bg-gradient-to-r from-brand-primary via-orange-500 to-amber-500 rounded-3xl p-8 sm:p-12 text-white overflow-hidden shadow-xl">
                    <div class="relative z-10 max-w-xl">
                        <span class="bg-white/20 text-white font-bold text-xs px-3 py-1 rounded-full uppercase tracking-wider">Custom Gift Wraps</span>
                        <h2 class="text-3xl sm:text-4xl font-extrabold mt-3 leading-tight">Make Their Day Extra Special</h2>
                        <p class="text-white/90 text-sm sm:text-base mt-2 mb-6">Every online order comes with optional premium gift wrapping and personalized handwritten message cards at checkout!</p>
                        <button onclick="navigateTo('shop')" class="bg-slate-900 hover:bg-slate-800 text-white font-bold text-sm px-6 py-3 rounded-xl shadow-md transition">
                            Create Your Gift Box <i class="fa-solid fa-gift ml-2"></i>
                        </button>
                    </div>
                    <div class="hidden lg:block absolute right-12 top-1/2 -translate-y-1/2 text-9xl opacity-20 pointer-events-none">
                        🎁
                    </div>
                </div>
            </section>

            <!-- WHY SHOP WITH US (4 TRUST PILLARS) -->
            <!-- Blade Partial: resources/views/components/trust-pillars.blade.php -->
            <section class="py-14 bg-white border-t border-slate-200/60">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                        <div class="flex items-start gap-4 p-4 rounded-2xl bg-slate-50/70 border border-slate-100">
                            <div class="w-12 h-12 rounded-2xl bg-brand-primary/10 text-brand-primary flex items-center justify-center text-xl shrink-0">
                                <i class="fa-solid fa-award"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-900 text-base">Quality Products</h3>
                                <p class="text-xs text-slate-600 mt-1">Handpicked, child-safe, and thoroughly tested toys & gifts.</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4 p-4 rounded-2xl bg-slate-50/70 border border-slate-100">
                            <div class="w-12 h-12 rounded-2xl bg-brand-sage/10 text-brand-sage flex items-center justify-center text-xl shrink-0">
                                <i class="fa-solid fa-truck-fast"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-900 text-base">Fast USA Shipping</h3>
                                <p class="text-xs text-slate-600 mt-1">Reliable 2-3 day delivery across all 50 US States.</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4 p-4 rounded-2xl bg-slate-50/70 border border-slate-100">
                            <div class="w-12 h-12 rounded-2xl bg-brand-amber/10 text-amber-600 flex items-center justify-center text-xl shrink-0">
                                <i class="fa-solid fa-rotate-left"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-900 text-base">30-Day Easy Returns</h3>
                                <p class="text-xs text-slate-600 mt-1">Hassle-free exchange or return policy for complete peace of mind.</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4 p-4 rounded-2xl bg-slate-50/70 border border-slate-100">
                            <div class="w-12 h-12 rounded-2xl bg-sky-100 text-sky-600 flex items-center justify-center text-xl shrink-0">
                                <i class="fa-solid fa-headset"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-900 text-base">Friendly Service</h3>
                                <p class="text-xs text-slate-600 mt-1">Our family retail team is here to help you pick the best gift!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- CUSTOMER REVIEWS -->
            <section class="py-14 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-xl mx-auto mb-10">
                    <span class="text-brand-primary font-bold text-xs uppercase tracking-widest">Verified Buyer Feedback</span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 mt-1">Loved by USA Families</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-soft">
                        <div class="flex text-amber-400 text-sm mb-3">
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                        </div>
                        <p class="text-slate-700 text-xs sm:text-sm italic mb-4">"Such a lovely store! I ordered the Plush Bear and Learning Piano for my daughter's birthday. Fast shipping and the gift packaging was beautiful!"</p>
                        <div class="flex items-center gap-3 border-t border-slate-100 pt-3">
                            <div class="w-8 h-8 rounded-full bg-brand-primary/20 text-brand-primary flex items-center justify-center font-bold text-xs">SM</div>
                            <div>
                                <h4 class="font-bold text-xs text-slate-900">Sarah M.</h4>
                                <span class="text-[10px] text-emerald-600 font-semibold"><i class="fa-solid fa-circle-check mr-1"></i>Verified Buyer • Austin, TX</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-soft">
                        <div class="flex text-amber-400 text-sm mb-3">
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                        </div>
                        <p class="text-slate-700 text-xs sm:text-sm italic mb-4">"SAMA'S is my go-to toy shop now. Their STEM building blocks kept my 6-year-old engaged for hours. Excellent quality and friendly support."</p>
                        <div class="flex items-center gap-3 border-t border-slate-100 pt-3">
                            <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-xs">DJ</div>
                            <div>
                                <h4 class="font-bold text-xs text-slate-900">David J.</h4>
                                <span class="text-[10px] text-emerald-600 font-semibold"><i class="fa-solid fa-circle-check mr-1"></i>Verified Buyer • Columbus, OH</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-soft">
                        <div class="flex text-amber-400 text-sm mb-3">
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                        </div>
                        <p class="text-slate-700 text-xs sm:text-sm italic mb-4">"Ordered last minute for a baby shower. Arrived in 2 days as promised! High standard of toys you don't find in big box marketplaces."</p>
                        <div class="flex items-center gap-3 border-t border-slate-100 pt-3">
                            <div class="w-8 h-8 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold text-xs">EL</div>
                            <div>
                                <h4 class="font-bold text-xs text-slate-900">Emily L.</h4>
                                <span class="text-[10px] text-emerald-600 font-semibold"><i class="fa-solid fa-circle-check mr-1"></i>Verified Buyer • Tampa, FL</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- NEWSLETTER SECTION -->
            <section class="py-12 bg-slate-900 text-white">
                <div class="max-w-4xl mx-auto px-4 text-center">
                    <i class="fa-solid fa-envelope-open-text text-3xl text-brand-primary mb-3"></i>
                    <h2 class="text-2xl sm:text-3xl font-extrabold">Get $10 Off Your First Order</h2>
                    <p class="text-slate-400 text-xs sm:text-sm mt-1 max-w-lg mx-auto">Sign up for SAMA'S VIP list to receive new product drops, holiday gift guides, and exclusive discount codes.</p>
                    <form onsubmit="handleNewsletterSubmit(event)" class="mt-6 flex flex-col sm:flex-row gap-3 max-w-md mx-auto">
                        <input type="email" required placeholder="Enter your email address..." class="flex-1 px-4 py-3 rounded-xl bg-slate-800 text-white placeholder-slate-500 border border-slate-700 focus:outline-none focus:border-brand-primary text-sm">
                        <button type="submit" class="bg-brand-primary hover:bg-brand-primaryHover text-white font-bold px-6 py-3 rounded-xl text-sm transition">
                            Subscribe
                        </button>
                    </form>
                </div>
            </section>
        </section>


        <!-- 2. SHOP CATALOG PAGE VIEW -->
        <!-- Blade Partial: resources/views/frontend/shop.blade.php -->
        <section id="view-shop" class="view-section py-8 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Breadcrumbs -->
            <nav class="flex text-xs text-slate-500 mb-6 gap-2 items-center">
                <a href="#" onclick="navigateTo('home'); return false;" class="hover:text-brand-primary">Home</a>
                <i class="fa-solid fa-chevron-right text-[10px]"></i>
                <span id="shop-breadcrumb-category" class="font-semibold text-slate-900">Shop All Products</span>
            </nav>

            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Sidebar Filters -->
                <aside class="w-full lg:w-64 shrink-0 space-y-6 bg-white p-6 rounded-2xl border border-slate-200/80 shadow-soft h-fit">
                    <div class="flex justify-between items-center border-b border-slate-100 pb-4">
                        <h3 class="font-extrabold text-slate-900 text-base"><i class="fa-solid fa-sliders text-brand-primary mr-2"></i>Filters</h3>
                        <button onclick="resetShopFilters()" class="text-xs text-brand-primary hover:underline font-semibold">Reset All</button>
                    </div>

                    <!-- Category Filter -->
                    <div>
                        <h4 class="font-bold text-xs uppercase text-slate-500 tracking-wider mb-3">Categories</h4>
                        <div class="space-y-2 text-xs font-medium text-slate-700">
                            <label class="flex items-center gap-2.5 cursor-pointer">
                                <input type="radio" name="shop-category" value="all" checked onchange="filterShopCategory('all')" class="text-brand-primary focus:ring-brand-primary">
                                <span>All Products</span>
                            </label>
                            <label class="flex items-center gap-2.5 cursor-pointer">
                                <input type="radio" name="shop-category" value="toys" onchange="filterShopCategory('toys')" class="text-brand-primary focus:ring-brand-primary">
                                <span>Toys & Playsets</span>
                            </label>
                            <label class="flex items-center gap-2.5 cursor-pointer">
                                <input type="radio" name="shop-category" value="gifts" onchange="filterShopCategory('gifts')" class="text-brand-primary focus:ring-brand-primary">
                                <span>Gifts & Celebrations</span>
                            </label>
                            <label class="flex items-center gap-2.5 cursor-pointer">
                                <input type="radio" name="shop-category" value="plush" onchange="filterShopCategory('plush')" class="text-brand-primary focus:ring-brand-primary">
                                <span>Plush & Dolls</span>
                            </label>
                            <label class="flex items-center gap-2.5 cursor-pointer">
                                <input type="radio" name="shop-category" value="stem" onchange="filterShopCategory('stem')" class="text-brand-primary focus:ring-brand-primary">
                                <span>Educational & STEM</span>
                            </label>
                        </div>
                    </div>

                    <!-- Price Slider Filter -->
                    <div class="border-t border-slate-100 pt-4">
                        <div class="flex justify-between items-center mb-2">
                            <h4 class="font-bold text-xs uppercase text-slate-500 tracking-wider">Max Price</h4>
                            <span id="price-range-value" class="font-bold text-xs text-brand-primary">$100</span>
                        </div>
                        <input type="range" id="price-range-input" min="10" max="100" value="100" step="5" oninput="updatePriceFilter(this.value)" class="w-full accent-brand-primary cursor-pointer">
                    </div>

                    <!-- Age Group Filter -->
                    <div class="border-t border-slate-100 pt-4">
                        <h4 class="font-bold text-xs uppercase text-slate-500 tracking-wider mb-3">Age Group</h4>
                        <div class="space-y-2 text-xs font-medium text-slate-700">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" value="0-2" onchange="applyShopFilters()" class="rounded text-brand-primary"> 0 - 2 Years (Toddler)
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" value="3-5" onchange="applyShopFilters()" class="rounded text-brand-primary"> 3 - 5 Years (Preschool)
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" value="6-8" onchange="applyShopFilters()" class="rounded text-brand-primary"> 6 - 8 Years
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" value="9+" onchange="applyShopFilters()" class="rounded text-brand-primary"> 9+ Years
                            </label>
                        </div>
                    </div>
                </aside>

                <!-- Shop Main Grid Area -->
                <div class="flex-1 space-y-6">
                    <!-- Top Filter Toolbar -->
                    <div class="bg-white p-4 rounded-2xl border border-slate-200/80 shadow-soft flex flex-col sm:flex-row justify-between items-center gap-4">
                        <p class="text-xs text-slate-600 font-medium">Showing <span id="shop-product-count" class="font-bold text-slate-900">0</span> Products</p>
                        
                        <div class="flex items-center gap-3 w-full sm:w-auto">
                            <!-- Sort Dropdown -->
                            <select id="shop-sort-select" onchange="applyShopFilters()" class="bg-slate-100 text-xs font-semibold text-slate-800 px-3 py-2 rounded-xl border border-slate-200 focus:outline-none">
                                <option value="featured">Featured First</option>
                                <option value="price-low">Price: Low to High</option>
                                <option value="price-high">Price: High to Low</option>
                                <option value="rating">Highest Rated</option>
                            </select>
                        </div>
                    </div>

                    <!-- Dynamic Shop Product Grid -->
                    <div id="shop-products-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Populated via renderShopProducts() -->
                    </div>
                </div>
            </div>
        </section>


        <!-- 3. PRODUCT DETAILS PAGE VIEW -->
        <!-- Blade Partial: resources/views/frontend/product-details.blade.php -->
        <section id="view-product-details" class="view-section py-8 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Breadcrumb -->
            <nav class="flex text-xs text-slate-500 mb-6 gap-2 items-center">
                <a href="#" onclick="navigateTo('home'); return false;" class="hover:text-brand-primary">Home</a>
                <i class="fa-solid fa-chevron-right text-[10px]"></i>
                <a href="#" onclick="navigateTo('shop'); return false;" class="hover:text-brand-primary">Shop</a>
                <i class="fa-solid fa-chevron-right text-[10px]"></i>
                <span id="detail-breadcrumb-title" class="font-semibold text-slate-900">Product Name</span>
            </nav>

            <div class="bg-white rounded-3xl border border-slate-200/80 p-6 lg:p-10 shadow-soft">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
                    <!-- Left: Gallery Image Switcher -->
                    <div class="lg:col-span-6 space-y-4">
                        <div class="relative rounded-2xl overflow-hidden bg-slate-100 border border-slate-200 aspect-square">
                            <img id="detail-main-image" src="" alt="" class="w-full h-full object-cover">
                            <span id="detail-badge" class="absolute top-4 left-4 bg-brand-primary text-white font-extrabold text-xs px-3 py-1 rounded-full uppercase">NEW</span>
                        </div>
                        
                        <!-- Image Thumbnails -->
                        <div id="detail-thumbnails-container" class="grid grid-cols-4 gap-3">
                            <!-- Populated dynamically -->
                        </div>
                    </div>

                    <!-- Right: Product Info & Actions -->
                    <div class="lg:col-span-6 space-y-6">
                        <div>
                            <span id="detail-category-tag" class="text-brand-primary font-bold text-xs uppercase tracking-wider">Category</span>
                            <h1 id="detail-title" class="text-2xl sm:text-3xl font-extrabold text-slate-900 mt-1">Product Title</h1>
                            
                            <!-- Rating -->
                            <div class="flex items-center gap-2 mt-2">
                                <div id="detail-rating-stars" class="flex text-amber-400 text-sm"></div>
                                <span id="detail-rating-text" class="text-xs font-semibold text-slate-600">(4.9 / 5.0 from 84 reviews)</span>
                            </div>
                        </div>

                        <!-- Price Section -->
                        <div class="flex items-baseline gap-3 border-y border-slate-100 py-4">
                            <span id="detail-price" class="text-3xl font-extrabold text-slate-900">$29.99</span>
                            <span id="detail-old-price" class="text-lg text-slate-400 line-through font-semibold">$34.99</span>
                            <span class="text-xs font-bold text-emerald-600 bg-emerald-50 px-2.5 py-1 rounded-full"><i class="fa-solid fa-check mr-1"></i>In Stock - Ships Today</span>
                        </div>

                        <!-- Short Description -->
                        <p id="detail-description" class="text-slate-600 text-sm leading-relaxed">
                            Product description goes here...
                        </p>

                        <!-- Specs Pills -->
                        <div class="grid grid-cols-2 gap-3 text-xs bg-slate-50 p-4 rounded-xl border border-slate-100">
                            <div><strong class="text-slate-900">Age:</strong> <span id="detail-age-spec">3+ Years</span></div>
                            <div><strong class="text-slate-900">SKU:</strong> <span id="detail-sku-spec">SAMA-1092</span></div>
                            <div><strong class="text-slate-900">Safety:</strong> Non-toxic / BPA Free</div>
                            <div><strong class="text-slate-900">Shipping:</strong> USA Fast Express</div>
                        </div>

                        <!-- Quantity Selector & Add to Cart -->
                        <div class="space-y-4 pt-2">
                            <div class="flex items-center gap-4">
                                <span class="text-xs font-bold text-slate-700">Quantity:</span>
                                <div class="flex items-center border border-slate-300 rounded-xl bg-white overflow-hidden">
                                    <button onclick="adjustDetailQty(-1)" class="px-3 py-2 text-slate-600 hover:bg-slate-100"><i class="fa-solid fa-minus text-xs"></i></button>
                                    <span id="detail-qty-val" class="px-4 text-xs font-bold text-slate-900">1</span>
                                    <button onclick="adjustDetailQty(1)" class="px-3 py-2 text-slate-600 hover:bg-slate-100"><i class="fa-solid fa-plus text-xs"></i></button>
                                </div>
                            </div>

                            <div class="flex flex-col sm:flex-row gap-3">
                                <button onclick="addDetailToCart()" class="flex-1 bg-brand-primary hover:bg-brand-primaryHover text-white font-bold text-sm py-3.5 px-6 rounded-2xl shadow-md transition flex items-center justify-center gap-2">
                                    <i class="fa-solid fa-bag-shopping"></i> Add to Cart
                                </button>
                                <button onclick="buyNowFromDetails()" class="flex-1 bg-slate-900 hover:bg-slate-800 text-white font-bold text-sm py-3.5 px-6 rounded-2xl transition">
                                    Buy Now
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Information Tabs -->
                <div class="mt-12 border-t border-slate-200/80 pt-8">
                    <div class="flex gap-6 border-b border-slate-200 text-sm font-bold pb-2">
                        <button class="text-brand-primary border-b-2 border-brand-primary pb-2">Description & Specs</button>
                        <button class="text-slate-500 hover:text-slate-800 pb-2">USA Delivery & Returns</button>
                        <button class="text-slate-500 hover:text-slate-800 pb-2">Customer Reviews (84)</button>
                    </div>
                    <div class="py-6 text-slate-600 text-sm space-y-3">
                        <p>All items sold at SAMA'S GIFTS & TOYS undergo strict US Consumer Product Safety Commission (CPSC) compliance testing to ensure maximum safety and joyful play for children of all ages.</p>
                        <p>Packaged in sustainable, gift-ready presentation boxes with optional personalized note cards.</p>
                    </div>
                </div>
            </div>
        </section>


        <!-- 4. CART PAGE VIEW -->
        <!-- Blade Partial: resources/views/frontend/cart.blade.php -->
        <section id="view-cart" class="view-section py-8 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 mb-6">Your Shopping Cart</h1>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                <!-- Cart Items List -->
                <div class="lg:col-span-8 bg-white p-6 rounded-3xl border border-slate-200/80 shadow-soft">
                    <div id="cart-page-items-container" class="divide-y divide-slate-100">
                        <!-- Populated dynamically via JS -->
                    </div>
                </div>

                <!-- Cart Summary Side Card -->
                <div class="lg:col-span-4 space-y-6">
                    <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-soft space-y-4">
                        <h2 class="font-extrabold text-slate-900 text-lg border-b border-slate-100 pb-3">Order Summary</h2>

                        <!-- Free Shipping Threshold Bar -->
                        <div class="bg-orange-50 p-3 rounded-2xl border border-orange-100 text-xs">
                            <p id="free-shipping-msg" class="font-bold text-slate-800 mb-1.5"></p>
                            <div class="w-full bg-orange-200 rounded-full h-2 overflow-hidden">
                                <div id="free-shipping-bar" class="bg-brand-primary h-full transition-all duration-300" style="width: 0%;"></div>
                            </div>
                        </div>

                        <div class="space-y-2 text-xs sm:text-sm text-slate-600">
                            <div class="flex justify-between">
                                <span>Subtotal</span>
                                <span id="cart-summary-subtotal" class="font-bold text-slate-900">$0.00</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Estimated Shipping</span>
                                <span id="cart-summary-shipping" class="font-bold text-slate-900">FREE</span>
                            </div>
                            <div id="promo-applied-row" class="hidden flex justify-between text-emerald-600 font-bold">
                                <span>Discount (SAMAGIFT 10%)</span>
                                <span id="cart-summary-discount">-$0.00</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Estimated Tax (8%)</span>
                                <span id="cart-summary-tax" class="font-bold text-slate-900">$0.00</span>
                            </div>
                            <div class="flex justify-between text-base font-extrabold text-slate-900 border-t border-slate-100 pt-3">
                                <span>Total</span>
                                <span id="cart-summary-total" class="text-brand-primary">$0.00</span>
                            </div>
                        </div>

                        <!-- Promo Code Form -->
                        <div class="pt-2">
                            <label class="block text-xs font-bold text-slate-700 mb-1">Promo Code</label>
                            <div class="flex gap-2">
                                <input type="text" id="promo-input" placeholder="e.g. SAMAGIFT" class="flex-1 px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs uppercase focus:outline-none focus:border-brand-primary">
                                <button onclick="applyPromoCode()" class="bg-slate-900 hover:bg-slate-800 text-white font-bold text-xs px-4 py-2 rounded-xl">Apply</button>
                            </div>
                        </div>

                        <button onclick="navigateTo('checkout')" class="w-full bg-brand-primary hover:bg-brand-primaryHover text-white font-bold text-sm py-3.5 rounded-2xl shadow-md transition text-center block">
                            Proceed to Checkout <i class="fa-solid fa-arrow-right ml-1"></i>
                        </button>
                    </div>
                </div>
            </div>
        </section>


        <!-- 5. CHECKOUT PAGE VIEW -->
        <!-- Blade Partial: resources/views/frontend/checkout.blade.php -->
        <section id="view-checkout" class="view-section py-8 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 mb-6">Checkout</h1>

            <form onsubmit="handlePlaceOrder(event)" class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                <!-- Left: Shipping & Payment Form -->
                <div class="lg:col-span-8 space-y-6">
                    
                    <!-- Express Checkout Buttons -->
                    <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-soft">
                        <span class="text-xs font-bold uppercase text-slate-400 tracking-wider block mb-3 text-center">Express Checkout</span>
                        <div class="grid grid-cols-2 gap-3">
                            <button type="button" class="bg-black text-white py-3 rounded-2xl font-bold text-sm hover:opacity-90 transition flex items-center justify-center gap-2">
                                <i class="fa-brands fa-apple text-lg"></i> Pay
                            </button>
                            <button type="button" class="bg-amber-400 text-slate-900 py-3 rounded-2xl font-bold text-sm hover:bg-amber-500 transition flex items-center justify-center gap-2">
                                <i class="fa-brands fa-paypal text-lg"></i> PayPal
                            </button>
                        </div>
                    </div>

                    <!-- Customer Information & Shipping Address -->
                    <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-soft space-y-4">
                        <h2 class="font-extrabold text-slate-900 text-lg border-b border-slate-100 pb-3">1. Shipping Address (USA Only)</h2>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">First Name *</label>
                                <input type="text" required value="Jane" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2.5 text-xs text-slate-900 focus:outline-none focus:border-brand-primary">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Last Name *</label>
                                <input type="text" required value="Doe" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2.5 text-xs text-slate-900 focus:outline-none focus:border-brand-primary">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Email Address *</label>
                                <input type="email" required value="jane.doe@example.com" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2.5 text-xs text-slate-900 focus:outline-none focus:border-brand-primary">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Phone Number *</label>
                                <input type="tel" required value="(555) 234-5678" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2.5 text-xs text-slate-900 focus:outline-none focus:border-brand-primary">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Street Address *</label>
                            <input type="text" required value="742 Evergreen Terrace" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2.5 text-xs text-slate-900 focus:outline-none focus:border-brand-primary">
                        </div>

                        <div class="grid grid-cols-3 gap-3">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">City *</label>
                                <input type="text" required value="Austin" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2.5 text-xs text-slate-900">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">State *</label>
                                <select required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2.5 text-xs text-slate-900">
                                    <option value="TX">Texas (TX)</option>
                                    <option value="CA">California (CA)</option>
                                    <option value="NY">New York (NY)</option>
                                    <option value="FL">Florida (FL)</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">ZIP Code *</label>
                                <input type="text" required value="78701" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2.5 text-xs text-slate-900">
                            </div>
                        </div>
                    </div>

                    <!-- Payment Method UI Placeholder -->
                    <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-soft space-y-4">
                        <h2 class="font-extrabold text-slate-900 text-lg border-b border-slate-100 pb-3">2. Credit Card Payment</h2>
                        
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Card Number</label>
                            <div class="relative">
                                <input type="text" value="4532 •••• •••• 8892" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2.5 text-xs text-slate-900 font-mono">
                                <i class="fa-solid fa-lock absolute right-3 top-3 text-slate-400"></i>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Expiration</label>
                                <input type="text" value="08/28" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2.5 text-xs text-slate-900 font-mono">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">CVC Code</label>
                                <input type="text" value="382" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2.5 text-xs text-slate-900 font-mono">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: Order Breakdown & Complete Button -->
                <div class="lg:col-span-4 space-y-6">
                    <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-soft space-y-4">
                        <h2 class="font-extrabold text-slate-900 text-lg border-b border-slate-100 pb-3">Order Summary</h2>
                        <div id="checkout-items-summary" class="divide-y divide-slate-100 max-h-60 overflow-y-auto">
                            <!-- Populated dynamically -->
                        </div>

                        <div class="border-t border-slate-100 pt-3 space-y-2 text-xs font-medium text-slate-600">
                            <div class="flex justify-between"><span>Subtotal</span><span id="checkout-subtotal">$0.00</span></div>
                            <div class="flex justify-between"><span>Tax (8%)</span><span id="checkout-tax">$0.00</span></div>
                            <div class="flex justify-between"><span>Shipping</span><span>FREE</span></div>
                            <div class="flex justify-between text-sm font-extrabold text-slate-900 pt-2 border-t"><span>Total Due</span><span id="checkout-total" class="text-brand-primary">$0.00</span></div>
                        </div>

                        <button type="submit" class="w-full bg-brand-primary hover:bg-brand-primaryHover text-white font-bold text-sm py-4 rounded-2xl shadow-lg transition text-center block">
                            Place Order <i class="fa-solid fa-check ml-1"></i>
                        </button>
                    </div>
                </div>
            </form>
        </section>


        <!-- 6. ORDER CONFIRMATION PAGE VIEW -->
        <!-- Blade Partial: resources/views/frontend/order-confirmation.blade.php -->
        <section id="view-confirmation" class="view-section py-12 max-w-3xl mx-auto px-4 text-center">
            <div class="bg-white p-8 sm:p-12 rounded-3xl border border-slate-200/80 shadow-soft space-y-6">
                <div class="w-20 h-20 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center text-4xl mx-auto badge-pulse">
                    <i class="fa-solid fa-check"></i>
                </div>
                
                <div>
                    <span class="text-emerald-600 font-bold text-xs uppercase tracking-widest">Order Success!</span>
                    <h1 class="text-3xl font-extrabold text-slate-900 mt-1">Thank You for Your Order!</h1>
                    <p class="text-slate-600 text-sm mt-2">Your order has been received and is being prepared with care at our retail shop.</p>
                </div>

                <div class="bg-slate-50 p-6 rounded-2xl border border-slate-100 text-left space-y-3 text-xs sm:text-sm">
                    <div class="flex justify-between border-b pb-2">
                        <span class="text-slate-500">Order Number:</span>
                        <strong id="confirm-order-number" class="text-slate-900 font-mono">#SAMA-98421</strong>
                    </div>
                    <div class="flex justify-between border-b pb-2">
                        <span class="text-slate-500">Estimated USA Delivery:</span>
                        <strong class="text-slate-900">3 Business Days</strong>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-slate-500">Confirmation Sent To:</span>
                        <strong id="confirm-email" class="text-slate-900">jane.doe@example.com</strong>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row justify-center gap-3 pt-4">
                    <button onclick="navigateTo('home')" class="bg-brand-primary hover:bg-brand-primaryHover text-white font-bold text-sm px-6 py-3.5 rounded-2xl transition">
                        Back to Home
                    </button>
                    <button onclick="window.print()" class="bg-slate-100 hover:bg-slate-200 text-slate-800 font-bold text-sm px-6 py-3.5 rounded-2xl transition">
                        <i class="fa-solid fa-print mr-1"></i> Print Receipt
                    </button>
                </div>
            </div>
        </section>


        <!-- 7. ABOUT US VIEW -->
        <section id="view-about" class="view-section py-12 max-w-4xl mx-auto px-4">
            <div class="bg-white p-8 rounded-3xl border border-slate-200/80 shadow-soft space-y-6">
                <h1 class="text-3xl font-extrabold text-slate-900">About SAMA'S GIFTS & TOYS</h1>
                <p class="text-slate-600 text-sm leading-relaxed">SAMA'S GIFTS & TOYS began as a beloved brick-and-mortar physical retail shop serving families in our local community. Built on a love for childhood wonder and thoughtful gift-giving, we carefully select safe, high-quality, and creative toys that spark joy and imagination.</p>
                <div class="grid grid-cols-2 gap-4 pt-4">
                    <img src="https://images.unsplash.com/photo-1560506840-ec148e82a604?auto=format&fit=crop&w=600&q=80" class="rounded-2xl h-48 object-cover w-full">
                    <img src="https://images.unsplash.com/photo-1513151233558-d860c5398176?auto=format&fit=crop&w=600&q=80" class="rounded-2xl h-48 object-cover w-full">
                </div>
            </div>
        </section>


        <!-- 8. FAQ VIEW -->
        <section id="view-faq" class="view-section py-12 max-w-3xl mx-auto px-4">
            <div class="bg-white p-8 rounded-3xl border border-slate-200/80 shadow-soft space-y-6">
                <h1 class="text-3xl font-extrabold text-slate-900 text-center mb-6">Frequently Asked Questions</h1>
                <div class="space-y-4 text-xs sm:text-sm">
                    <div class="p-4 bg-slate-50 rounded-2xl">
                        <h3 class="font-bold text-slate-900 mb-1">How fast do you ship within the USA?</h3>
                        <p class="text-slate-600">Standard shipping takes 3-5 business days. Express shipping delivers in 2 business days!</p>
                    </div>
                    <div class="p-4 bg-slate-50 rounded-2xl">
                        <h3 class="font-bold text-slate-900 mb-1">Can I request custom gift wrapping?</h3>
                        <p class="text-slate-600">Yes! Every item can be wrapped in signature ribbon with a personalized gift card free of charge.</p>
                    </div>
                </div>
            </div>
        </section>


        <!-- 9. CONTACT VIEW -->
        <section id="view-contact" class="view-section py-12 max-w-3xl mx-auto px-4">
            <div class="bg-white p-8 rounded-3xl border border-slate-200/80 shadow-soft space-y-6">
                <h1 class="text-3xl font-extrabold text-slate-900 text-center">Contact Our USA Retail Store</h1>
                <p class="text-center text-slate-600 text-sm">Have a question about an item or need help choosing a gift? Reach out!</p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs font-semibold text-slate-700">
                    <div class="p-4 bg-slate-50 rounded-2xl"><i class="fa-solid fa-location-dot text-brand-primary mr-2"></i> 124 Main Street, Austin, TX 78701</div>
                    <div class="p-4 bg-slate-50 rounded-2xl"><i class="fa-solid fa-phone text-brand-primary mr-2"></i> +1 (800) 555-SAMA</div>
                </div>
            </div>
        </section>

    </main>


    <!-- SLIDE-OVER CART DRAWER -->
    <div id="cart-drawer-backdrop" onclick="toggleCartDrawer()" class="hidden fixed inset-0 bg-slate-950/40 backdrop-blur-xs z-50 transition-opacity"></div>
    <div id="cart-drawer" class="fixed top-0 right-0 h-full w-full max-w-md bg-white shadow-2xl z-50 transform translate-x-full transition-transform duration-300 ease-in-out flex flex-col justify-between">
        <!-- Drawer Header -->
        <div class="p-5 border-b border-slate-100 flex items-center justify-between">
            <div class="flex items-center gap-2">
                <i class="fa-solid fa-bag-shopping text-brand-primary text-xl"></i>
                <h2 class="font-extrabold text-slate-900 text-lg">Your Cart</h2>
            </div>
            <button onclick="toggleCartDrawer()" class="p-2 text-slate-400 hover:text-slate-700 text-lg"><i class="fa-solid fa-xmark"></i></button>
        </div>

        <!-- Drawer Content Items -->
        <div id="cart-drawer-items" class="p-5 flex-grow overflow-y-auto divide-y divide-slate-100 space-y-4">
            <!-- Populated via JS -->
        </div>

        <!-- Drawer Footer -->
        <div class="p-5 border-t border-slate-100 bg-slate-50 space-y-3">
            <div class="flex justify-between font-extrabold text-slate-900 text-base">
                <span>Subtotal:</span>
                <span id="drawer-subtotal" class="text-brand-primary">$0.00</span>
            </div>
            <button onclick="toggleCartDrawer(); navigateTo('cart');" class="w-full bg-slate-900 hover:bg-slate-800 text-white font-bold text-xs py-3 rounded-xl transition text-center block">
                View Full Cart
            </button>
            <button onclick="toggleCartDrawer(); navigateTo('checkout');" class="w-full bg-brand-primary hover:bg-brand-primaryHover text-white font-bold text-xs py-3 rounded-xl transition text-center block">
                Checkout Now
            </button>
        </div>
    </div>


    <!-- Blade Partial: resources/views/components/footer.blade.php -->
    <footer class="bg-slate-900 text-slate-400 border-t border-slate-800 text-xs py-12 mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Col 1 -->
            <div class="space-y-3">
                <span class="text-white font-extrabold text-lg tracking-tight">SAMA'S GIFTS & TOYS</span>
                <p class="text-slate-400 leading-relaxed">A USA physical retail store launching online. Dedicated to thoughtful gifts, joyful toys, and friendly local service.</p>
                <div class="flex gap-3 text-white text-base pt-2">
                    <a href="#" class="hover:text-brand-primary"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#" class="hover:text-brand-primary"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#" class="hover:text-brand-primary"><i class="fa-brands fa-pinterest"></i></a>
                </div>
            </div>

            <!-- Col 2 -->
            <div>
                <h4 class="text-white font-bold mb-3 uppercase tracking-wider">Quick Links</h4>
                <ul class="space-y-2">
                    <li><a href="#" onclick="filterShopCategory('toys'); return false;" class="hover:text-white">Toys & Playsets</a></li>
                    <li><a href="#" onclick="filterShopCategory('gifts'); return false;" class="hover:text-white">Gift Celebrations</a></li>
                    <li><a href="#" onclick="filterShopCategory('plush'); return false;" class="hover:text-white">Plush & Dolls</a></li>
                    <li><a href="#" onclick="filterShopCategory('stem'); return false;" class="hover:text-white">Educational & STEM</a></li>
                </ul>
            </div>

            <!-- Col 3 -->
            <div>
                <h4 class="text-white font-bold mb-3 uppercase tracking-wider">Customer Care</h4>
                <ul class="space-y-2">
                    <li><a href="#" onclick="navigateTo('faq'); return false;" class="hover:text-white">Shipping & Returns</a></li>
                    <li><a href="#" onclick="navigateTo('faq'); return false;" class="hover:text-white">Order Tracking</a></li>
                    <li><a href="#" onclick="navigateTo('contact'); return false;" class="hover:text-white">Contact Store</a></li>
                    <li><a href="#" onclick="navigateTo('faq'); return false;" class="hover:text-white">Store FAQs</a></li>
                </ul>
            </div>

            <!-- Col 4 -->
            <div>
                <h4 class="text-white font-bold mb-3 uppercase tracking-wider">US Retail Store</h4>
                <p class="text-slate-400 mb-2"><i class="fa-solid fa-location-dot text-brand-primary mr-1"></i> 124 Main Street, Austin, TX 78701</p>
                <p class="text-slate-400 mb-2"><i class="fa-solid fa-clock text-brand-primary mr-1"></i> Mon - Sat: 9:00 AM - 7:00 PM</p>
                <div class="pt-3 flex gap-2 text-2xl text-slate-500">
                    <i class="fa-brands fa-cc-visa"></i>
                    <i class="fa-brands fa-cc-mastercard"></i>
                    <i class="fa-brands fa-cc-amex"></i>
                    <i class="fa-brands fa-cc-apple-pay"></i>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8 mt-8 border-t border-slate-800 text-center text-slate-500">
            &copy; 2026 SAMA'S GIFTS & TOYS Retail Inc. All rights reserved. Built with love for USA families.
        </div>
    </footer>


    <!-- ================================================================= -->
    <!-- VANILLA JAVASCRIPT STATE MANAGEMENT & INTERACTIVE LOGIC -->
    <!-- ================================================================= -->
    <script>
        
        // Product Database
        const PRODUCTS = [
            {
                id: 1,
                title: "Rainbow Plush Bear",
                category: "plush",
                price: 19.99,
                oldPrice: 24.99,
                rating: 4.9,
                reviewsCount: 84,
                ageGroup: "0-2",
                badge: "BESTSELLER",
                image: "https://images.unsplash.com/photo-1559454403-b8fb88521f11?auto=format&fit=crop&w=800&q=80",
                description: "Ultra-soft premium plush teddy bear made with hypoallergenic child-safe materials.",
                specs: { sku: "SAMA-101", weight: "0.8 lbs" }
            },
            {
                id: 2,
                title: "Musical Learning Toy Piano",
                category: "toys",
                price: 29.99,
                oldPrice: 34.99,
                rating: 4.8,
                reviewsCount: 62,
                ageGroup: "3-5",
                badge: "NEW",
                image: "https://images.unsplash.com/photo-1596461404969-9ae70f2830c1?auto=format&fit=crop&w=800&q=80",
                description: "Interactive keyboard featuring cheerful tunes, light-up keys, and early sound learning mode.",
                specs: { sku: "SAMA-102", weight: "1.5 lbs" }
            },
            {
                id: 3,
                title: "Kids Creative Building Blocks",
                category: "stem",
                price: 34.99,
                oldPrice: 39.99,
                rating: 5.0,
                reviewsCount: 112,
                ageGroup: "6-8",
                badge: "HOT",
                image: "https://images.unsplash.com/photo-1587654780291-39c9404d746b?auto=format&fit=crop&w=800&q=80",
                description: "120-piece wooden & colorful building set fostering spatial thinking and creativity.",
                specs: { sku: "SAMA-103", weight: "2.8 lbs" }
            },
            {
                id: 4,
                title: "Wooden Animal Puzzle Game",
                category: "stem",
                price: 14.99,
                oldPrice: 18.99,
                rating: 4.7,
                reviewsCount: 45,
                ageGroup: "3-5",
                badge: "SALE",
                image: "https://images.unsplash.com/photo-1618842676088-c4d48a6a7c9d?auto=format&fit=crop&w=800&q=80",
                description: "Hand-finished wooden puzzle with smooth edges designed for fine motor skill development.",
                specs: { sku: "SAMA-104", weight: "1.0 lbs" }
            },
            {
                id: 5,
                title: "Adorable Princess Doll & Set",
                category: "plush",
                price: 24.99,
                oldPrice: 29.99,
                rating: 4.9,
                reviewsCount: 78,
                ageGroup: "3-5",
                badge: "NEW",
                image: "https://images.unsplash.com/photo-1566576721346-d4a3b4eaeb55?auto=format&fit=crop&w=800&q=80",
                description: "Cute cloth doll with interchangeable outfits and tea party accessories.",
                specs: { sku: "SAMA-105", weight: "1.2 lbs" }
            },
            {
                id: 6,
                title: "Soft Huggable Teddy & Gift Box",
                category: "gifts",
                price: 22.99,
                oldPrice: null,
                rating: 4.8,
                reviewsCount: 51,
                ageGroup: "0-2",
                badge: "GIFT",
                image: "https://images.unsplash.com/photo-1513542789411-b6a5d4f31634?auto=format&fit=crop&w=800&q=80",
                description: "Ready-to-gift box wrapped in silk ribbon with cozy plush pal.",
                specs: { sku: "SAMA-106", weight: "1.1 lbs" }
            },
            {
                id: 7,
                title: "Junior STEM Science Kit",
                category: "stem",
                price: 39.99,
                oldPrice: 49.99,
                rating: 4.9,
                reviewsCount: 93,
                ageGroup: "9+",
                badge: "STEM",
                image: "https://images.unsplash.com/photo-1530210124550-912dc1381cb8?auto=format&fit=crop&w=800&q=80",
                description: "Safe kitchen & lab science experiments for curious young minds.",
                specs: { sku: "SAMA-107", weight: "3.0 lbs" }
            },
            {
                id: 8,
                title: "Birthday Celebration Box",
                category: "gifts",
                price: 49.99,
                oldPrice: 59.99,
                rating: 5.0,
                reviewsCount: 130,
                ageGroup: "6-8",
                badge: "POPULAR",
                image: "https://images.unsplash.com/photo-1513151233558-d860c5398176?auto=format&fit=crop&w=800&q=80",
                description: "Ultimate birthday surprise box containing party favors, toys, and greeting card.",
                specs: { sku: "SAMA-108", weight: "3.5 lbs" }
            }
        ];

        // Global Reactive State
        let state = {
            cart: [
                { id: 1, qty: 1 } // Pre-loaded item for immediate demo appeal
            ],
            wishlist: [2],
            activeView: 'home',
            activeDetailProductId: 1,
            detailQty: 1,
            appliedCoupon: null,
            filterCategory: 'all',
            filterMaxPrice: 100,
            searchQuery: ''
        };


        // Initialize application on window load
        window.onload = function() {
            renderFeaturedHomeProducts();
            renderShopProducts();
            updateCartUI();
        };

        // Navigation Switcher (SPA View Switcher)
        function navigateTo(viewId) {
            // Hide all views
            document.querySelectorAll('.view-section').forEach(el => el.classList.remove('active'));
            
            // Show target view
            const target = document.getElementById(`view-${viewId}`);
            if (target) {
                target.classList.add('active');
                state.activeView = viewId;
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }

            // Sync View Specific Data
            if (viewId === 'cart') renderCartPage();
            if (viewId === 'checkout') renderCheckoutPage();
        }

        // Filter Shop Category Handler
        function filterShopCategory(cat) {
            state.filterCategory = cat;
            
            // Sync radio button if exists
            const radio = document.querySelector(`input[name="shop-category"][value="${cat}"]`);
            if (radio) radio.checked = true;

            const categoryNameMap = {
                all: "Shop All Products",
                toys: "Toys & Playsets",
                gifts: "Gifts & Celebrations",
                plush: "Plush & Dolls",
                stem: "Educational & STEM",
                baby: "Baby & Toddler"
            };

            const labelEl = document.getElementById('shop-breadcrumb-category');
            if (labelEl) labelEl.textContent = categoryNameMap[cat] || "Filtered Collection";

            renderShopProducts();
            navigateTo('shop');
        }

        // Render Home Featured Products
        function renderFeaturedHomeProducts() {
            const container = document.getElementById('home-featured-grid');
            if (!container) return;

            const featured = PRODUCTS.slice(0, 4);
            container.innerHTML = featured.map(p => createProductCardHTML(p)).join('');
        }

        // Render Shop Page Products
        function renderShopProducts() {
            const container = document.getElementById('shop-products-grid');
            if (!container) return;

            let filtered = PRODUCTS.filter(p => {
                const matchCat = state.filterCategory === 'all' || p.category === state.filterCategory;
                const matchPrice = p.price <= state.filterMaxPrice;
                const matchSearch = p.title.toLowerCase().includes(state.searchQuery.toLowerCase());
                return matchCat && matchPrice && matchSearch;
            });

            document.getElementById('shop-product-count').textContent = filtered.length;

            if (filtered.length === 0) {
                container.innerHTML = `
                    <div class="col-span-full py-12 text-center text-slate-500">
                        <i class="fa-solid fa-gift text-4xl mb-3 text-slate-300"></i>
                        <p class="font-bold">No products found matching your filters.</p>
                        <button onclick="resetShopFilters()" class="mt-3 text-xs text-brand-primary underline font-bold">Reset Filters</button>
                    </div>
                `;
                return;
            }

            container.innerHTML = filtered.map(p => createProductCardHTML(p)).join('');
        }

        // Reusable HTML Generator for Product Cards (Matches Blade partial structure)
        function createProductCardHTML(p) {
            return `
                <div class="group bg-white rounded-2xl border border-slate-200/80 hover:border-brand-primary/40 p-4 shadow-soft hover:shadow-hover transition-all flex flex-col justify-between relative">
                    <span class="absolute top-6 left-6 z-10 bg-brand-primary text-white font-extrabold text-[10px] px-2.5 py-0.5 rounded-full uppercase shadow-xs">${p.badge}</span>
                    
                    <button onclick="toggleWishlist(${p.id})" class="absolute top-6 right-6 z-10 w-8 h-8 rounded-full bg-white/80 backdrop-blur-xs text-slate-400 hover:text-rose-500 flex items-center justify-center shadow-xs transition">
                        <i class="fa-${state.wishlist.includes(p.id) ? 'solid text-rose-500' : 'regular'} fa-heart text-xs"></i>
                    </button>

                    <div onclick="openProductDetail(${p.id})" class="cursor-pointer">
                        <div class="rounded-xl overflow-hidden bg-slate-50 mb-3 aspect-square relative">
                            <img src="${p.image}" alt="${p.title}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        </div>
                        
                        <div class="flex items-center gap-1 text-amber-400 text-xs mb-1">
                            <i class="fa-solid fa-star"></i>
                            <span class="font-bold text-slate-800 text-[11px]">${p.rating}</span>
                            <span class="text-slate-400 text-[10px]">(${p.reviewsCount})</span>
                        </div>

                        <h3 class="font-bold text-slate-900 text-sm group-hover:text-brand-primary transition line-clamp-1">${p.title}</h3>
                    </div>

                    <div class="flex items-center justify-between mt-4 pt-3 border-t border-slate-100">
                        <div>
                            <span class="font-extrabold text-slate-900 text-base">$${p.price.toFixed(2)}</span>
                            ${p.oldPrice ? `<span class="text-xs text-slate-400 line-through ml-1.5 font-semibold">$${p.oldPrice.toFixed(2)}</span>` : ''}
                        </div>
                        <button onclick="addToCart(${p.id})" class="bg-brand-primary hover:bg-brand-primaryHover text-white text-xs font-bold px-3.5 py-2 rounded-xl shadow-xs transition flex items-center gap-1.5">
                            <i class="fa-solid fa-cart-plus"></i> Add
                        </button>
                    </div>
                </div>
            `;
        }


        // Product Details View Opener
        function openProductDetail(productId) {
            const product = PRODUCTS.find(p => p.id === productId);
            if (!product) return;

            state.activeDetailProductId = productId;
            state.detailQty = 1;

            document.getElementById('detail-breadcrumb-title').textContent = product.title;
            document.getElementById('detail-title').textContent = product.title;
            document.getElementById('detail-category-tag').textContent = product.category;
            document.getElementById('detail-main-image').src = product.image;
            document.getElementById('detail-price').textContent = `$${product.price.toFixed(2)}`;
            document.getElementById('detail-old-price').textContent = product.oldPrice ? `$${product.oldPrice.toFixed(2)}` : '';
            document.getElementById('detail-description').textContent = product.description;
            document.getElementById('detail-sku-spec').textContent = product.specs.sku;
            document.getElementById('detail-age-spec').textContent = `${product.ageGroup} Years`;
            document.getElementById('detail-qty-val').textContent = 1;

            // Rating Stars
            document.getElementById('detail-rating-stars').innerHTML = Array(5).fill('<i class="fa-solid fa-star"></i>').join('');

            // Thumbnails
            const thumbs = document.getElementById('detail-thumbnails-container');
            thumbs.innerHTML = [product.image, product.image, product.image, product.image].map((img, i) => `
                <img src="${img}" onclick="document.getElementById('detail-main-image').src='${img}'" class="rounded-xl border border-slate-200 cursor-pointer object-cover h-16 w-full hover:border-brand-primary transition">
            `).join('');

            navigateTo('product-details');
        }

        // Adjust Detail Qty
        function adjustDetailQty(delta) {
            state.detailQty = Math.max(1, state.detailQty + delta);
            document.getElementById('detail-qty-val').textContent = state.detailQty;
        }

        function addDetailToCart() {
            addToCart(state.activeDetailProductId, state.detailQty);
        }

        function buyNowFromDetails() {
            addToCart(state.activeDetailProductId, state.detailQty);
            navigateTo('checkout');
        }

        // Add to Cart Logic
        function addToCart(productId, qty = 1) {
            const existing = state.cart.find(item => item.id === productId);
            if (existing) {
                existing.qty += qty;
            } else {
                state.cart.push({ id: productId, qty });
            }
            updateCartUI();
            const product = PRODUCTS.find(p => p.id === productId);
            showToast(`Added ${qty}x "${product.title}" to cart!`);
        }

        // Update Global Cart UI
        function updateCartUI() {
            const totalQty = state.cart.reduce((sum, item) => sum + item.qty, 0);
            document.getElementById('header-cart-badge').textContent = totalQty;

            // Render Cart Drawer
            const drawerContainer = document.getElementById('cart-drawer-items');
            if (drawerContainer) {
                if (state.cart.length === 0) {
                    drawerContainer.innerHTML = '<p class="text-center text-slate-400 text-xs py-8">Your shopping cart is empty.</p>';
                } else {
                    drawerContainer.innerHTML = state.cart.map(item => {
                        const p = PRODUCTS.find(prod => prod.id === item.id);
                        return `
                            <div class="flex gap-3 py-3 items-center">
                                <img src="${p.image}" class="w-14 h-14 rounded-xl object-cover border border-slate-100">
                                <div class="flex-1">
                                    <h4 class="font-bold text-xs text-slate-800 line-clamp-1">${p.title}</h4>
                                    <span class="text-xs text-slate-500 font-semibold">$${p.price.toFixed(2)} x ${item.qty}</span>
                                </div>
                                <button onclick="removeFromCart(${p.id})" class="text-slate-400 hover:text-rose-500 text-xs p-1"><i class="fa-solid fa-trash"></i></button>
                            </div>
                        `;
                    }).join('');
                }
            }

            // Subtotals
            const subtotal = calculateSubtotal();
            document.getElementById('drawer-subtotal').textContent = `$${subtotal.toFixed(2)}`;
        }

        function removeFromCart(productId) {
            state.cart = state.cart.filter(item => item.id !== productId);
            updateCartUI();
            if (state.activeView === 'cart') renderCartPage();
        }

        function calculateSubtotal() {
            return state.cart.reduce((sum, item) => {
                const p = PRODUCTS.find(prod => prod.id === item.id);
                return sum + (p.price * item.qty);
            }, 0);
        }

        // Render Cart Page
        function renderCartPage() {
            const container = document.getElementById('cart-page-items-container');
            if (!container) return;

            if (state.cart.length === 0) {
                container.innerHTML = '<p class="text-center text-slate-500 py-12 font-bold">Your cart is currently empty.</p>';
            } else {
                container.innerHTML = state.cart.map(item => {
                    const p = PRODUCTS.find(prod => prod.id === item.id);
                    return `
                        <div class="py-4 flex flex-col sm:flex-row items-center justify-between gap-4">
                            <div class="flex items-center gap-4 w-full sm:w-auto">
                                <img src="${p.image}" class="w-16 h-16 rounded-2xl object-cover border border-slate-100">
                                <div>
                                    <h3 class="font-bold text-slate-900 text-sm">${p.title}</h3>
                                    <span class="text-xs text-slate-500">SKU: ${p.specs.sku}</span>
                                </div>
                            </div>

                            <div class="flex items-center gap-6 justify-between w-full sm:w-auto">
                                <span class="font-extrabold text-slate-900 text-sm">$${p.price.toFixed(2)}</span>
                                <div class="flex items-center border rounded-xl overflow-hidden bg-slate-50">
                                    <button onclick="updateCartItemQty(${p.id}, -1)" class="px-2.5 py-1 text-slate-600 hover:bg-slate-200 text-xs"><i class="fa-solid fa-minus"></i></button>
                                    <span class="px-3 text-xs font-bold">${item.qty}</span>
                                    <button onclick="updateCartItemQty(${p.id}, 1)" class="px-2.5 py-1 text-slate-600 hover:bg-slate-200 text-xs"><i class="fa-solid fa-plus"></i></button>
                                </div>
                                <span class="font-extrabold text-brand-primary text-sm">$${(p.price * item.qty).toFixed(2)}</span>
                                <button onclick="removeFromCart(${p.id})" class="text-slate-400 hover:text-rose-500"><i class="fa-solid fa-trash-can text-sm"></i></button>
                            </div>
                        </div>
                    `;
                }).join('');
            }

            // Summary calculations
            const subtotal = calculateSubtotal();
            const discount = state.appliedCoupon ? subtotal * (state.appliedCoupon.discountPercent / 100) : 0;
            const tax = (subtotal - discount) * 0.08;
            const total = (subtotal - discount) + tax;

            document.getElementById('cart-summary-subtotal').textContent = `$${subtotal.toFixed(2)}`;
            document.getElementById('cart-summary-tax').textContent = `$${tax.toFixed(2)}`;
            document.getElementById('cart-summary-total').textContent = `$${total.toFixed(2)}`;

            // Free Shipping Progress Bar
            const threshold = 50;
            const progress = Math.min(100, (subtotal / threshold) * 100);
            document.getElementById('free-shipping-bar').style.width = `${progress}%`;
            
            const msgEl = document.getElementById('free-shipping-msg');
            if (subtotal >= threshold) {
                msgEl.innerHTML = '<i class="fa-solid fa-circle-check text-emerald-600 mr-1"></i> You qualify for FREE USA Shipping!';
            } else {
                msgEl.textContent = `Add $${(threshold - subtotal).toFixed(2)} more to unlock FREE Shipping!`;
            }
        }

        function updateCartItemQty(productId, delta) {
            const item = state.cart.find(i => i.id === productId);
            if (item) {
                item.qty += delta;
                if (item.qty <= 0) {
                    removeFromCart(productId);
                } else {
                    updateCartUI();
                    renderCartPage();
                }
            }
        }

        // Apply Promo Code
        function applyPromoCode() {
            const val = document.getElementById('promo-input').value.trim().toUpperCase();
            if (val === 'SAMAGIFT') {
                state.appliedCoupon = { code: 'SAMAGIFT', discountPercent: 10 };
                document.getElementById('promo-applied-row').classList.remove('hidden');
                showToast('10% Discount applied successfully!');
                renderCartPage();
            } else {
                showToast('Invalid Promo Code. Try SAMAGIFT');
            }
        }


        // Render Checkout Page
        function renderCheckoutPage() {
            const container = document.getElementById('checkout-items-summary');
            if (!container) return;

            container.innerHTML = state.cart.map(item => {
                const p = PRODUCTS.find(prod => prod.id === item.id);
                return `
                    <div class="py-2.5 flex justify-between items-center text-xs">
                        <div class="flex items-center gap-2">
                            <span class="font-bold text-slate-800">${item.qty}x</span>
                            <span class="text-slate-600 line-clamp-1">${p.title}</span>
                        </div>
                        <span class="font-bold text-slate-900">$${(p.price * item.qty).toFixed(2)}</span>
                    </div>
                `;
            }).join('');

            const subtotal = calculateSubtotal();
            const tax = subtotal * 0.08;
            const total = subtotal + tax;

            document.getElementById('checkout-subtotal').textContent = `$${subtotal.toFixed(2)}`;
            document.getElementById('checkout-tax').textContent = `$${tax.toFixed(2)}`;
            document.getElementById('checkout-total').textContent = `$${total.toFixed(2)}`;
        }

        // Handle Order Placement
        function handlePlaceOrder(e) {
            e.preventDefault();
            if (state.cart.length === 0) {
                showToast('Your cart is empty!');
                return;
            }

            const randNum = Math.floor(10000 + Math.random() * 90000);
            document.getElementById('confirm-order-number').textContent = `#SAMA-${randNum}`;
            
            // Clear cart
            state.cart = [];
            updateCartUI();

            navigateTo('confirmation');
        }

        // Live Header Search Filter
        function handleLiveSearch(query) {
            state.searchQuery = query;
            const dropdown = document.getElementById('search-results-dropdown');
            const content = document.getElementById('search-results-content');
            const clearBtn = document.getElementById('header-search-clear');

            if (query.trim().length > 0) {
                clearBtn.classList.remove('hidden');
                const matches = PRODUCTS.filter(p => p.title.toLowerCase().includes(query.toLowerCase()));
                
                if (matches.length > 0) {
                    content.innerHTML = matches.map(p => `
                        <div onclick="openProductDetail(${p.id}); document.getElementById('search-results-dropdown').classList.add('hidden');" class="p-2.5 hover:bg-slate-50 cursor-pointer flex items-center gap-3">
                            <img src="${p.image}" class="w-10 h-10 rounded-lg object-cover">
                            <div class="flex-1">
                                <h4 class="text-xs font-bold text-slate-900">${p.title}</h4>
                                <span class="text-[11px] text-brand-primary font-extrabold">$${p.price.toFixed(2)}</span>
                            </div>
                        </div>
                    `).join('');
                } else {
                    content.innerHTML = '<p class="p-4 text-xs text-slate-400 text-center">No matching toys found</p>';
                }
                dropdown.classList.remove('hidden');
            } else {
                clearBtn.classList.add('hidden');
                dropdown.classList.add('hidden');
            }
        }

        function clearHeaderSearch() {
            document.getElementById('header-search-input').value = '';
            handleLiveSearch('');
        }

        function updatePriceFilter(val) {
            state.filterMaxPrice = parseFloat(val);
            document.getElementById('price-range-value').textContent = `$${val}`;
            renderShopProducts();
        }

        function resetShopFilters() {
            state.filterCategory = 'all';
            state.filterMaxPrice = 100;
            state.searchQuery = '';
            document.getElementById('price-range-input').value = 100;
            document.getElementById('price-range-value').textContent = '$100';
            filterShopCategory('all');
        }

        // UI Drawer Toggles
        function toggleCartDrawer() {
            const drawer = document.getElementById('cart-drawer');
            const backdrop = document.getElementById('cart-drawer-backdrop');
            drawer.classList.toggle('translate-x-full');
            backdrop.classList.toggle('hidden');
        }

        function toggleMobileMenu() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        }

        function toggleWishlist(productId) {
            const idx = state.wishlist.indexOf(productId);
            if (idx > -1) {
                state.wishlist.splice(idx, 1);
                showToast('Removed from Wishlist');
            } else {
                state.wishlist.push(productId);
                showToast('Added to Wishlist!');
            }
            document.getElementById('wishlist-badge').textContent = state.wishlist.length;
            renderShopProducts();
            renderFeaturedHomeProducts();
        }

        function copyPromoCode(code) {
            navigator.clipboard.writeText(code);
            showToast(`Code "${code}" copied to clipboard!`);
        }

        // Toast Feedback System
        function showToast(msg) {
            const container = document.getElementById('toast-container');
            const toast = document.createElement('div');
            toast.className = 'bg-slate-900 text-white font-semibold text-xs px-4 py-3 rounded-2xl shadow-floating flex items-center gap-2 border border-slate-800 transition-all transform translate-y-2 pointer-events-auto';
            toast.innerHTML = `<i class="fa-solid fa-sparkles text-brand-primary"></i> <span>${msg}</span>`;
            
            container.appendChild(toast);
            setTimeout(() => {
                toast.classList.add('opacity-0', 'translate-y-2');
                setTimeout(() => toast.remove(), 300);
            }, 2500);
        }

        function handleNewsletterSubmit(e) {
            e.preventDefault();
            showToast('Thank you for subscribing! Check your inbox for $10 off code.');
            e.target.reset();
        }

        function showAccountModal() {
            showToast('Account Portal placeholder: Demo view ready');
        }
    </script>
</body>
</html>