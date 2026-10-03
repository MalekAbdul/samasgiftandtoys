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
