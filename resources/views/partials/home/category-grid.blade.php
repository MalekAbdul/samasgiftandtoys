<!-- CATEGORY SECTION -->
            <!-- Blade Partial: resources/views/components/category-grid.blade.php -->
            <section class="py-14 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row md:items-end justify-between mb-8">
                    <div>
                        <span class="text-brand-primary font-bold text-xs uppercase tracking-widest">Browse Collection</span>
                        <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 mt-1">Shop by Category</h2>
                    </div>
                    <button type="button" onclick="filterShopCategory('all')" class="text-brand-primary hover:text-brand-primaryHover font-bold text-sm inline-flex items-center gap-1 mt-2 md:mt-0">
                        View All Categories <i class="fa-solid fa-arrow-right text-xs"></i>
                    </button>
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
