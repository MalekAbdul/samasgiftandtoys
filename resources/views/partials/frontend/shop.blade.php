<section id="view-shop" class="view-section py-8 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Breadcrumbs -->
            <nav class="flex text-xs text-slate-500 mb-6 gap-2 items-center">
                <button type="button" onclick="navigateTo('home')" class="hover:text-brand-primary">Home</button>
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
                            <label class="flex items-center gap-2.5 cursor-pointer">
                                <input type="radio" name="shop-category" value="games" onchange="filterShopCategory('games')" class="text-brand-primary focus:ring-brand-primary">
                                <span>Games & Puzzles</span>
                            </label>
                            <label class="flex items-center gap-2.5 cursor-pointer">
                                <input type="radio" name="shop-category" value="baby" onchange="filterShopCategory('baby')" class="text-brand-primary focus:ring-brand-primary">
                                <span>Baby & Toddler</span>
                            </label>
                            <label class="flex items-center gap-2.5 cursor-pointer">
                                <input type="radio" name="shop-category" value="sale" onchange="filterShopCategory('sale')" class="text-brand-primary focus:ring-brand-primary">
                                <span>Sale & Clearance</span>
                            </label>
                            <label class="flex items-center gap-2.5 cursor-pointer">
                                <input type="radio" name="shop-category" value="wishlist" onchange="filterShopCategory('wishlist')" class="text-brand-primary focus:ring-brand-primary">
                                <span>Wishlist</span>
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
