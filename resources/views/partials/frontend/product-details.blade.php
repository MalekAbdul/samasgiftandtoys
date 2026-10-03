<section id="view-product-details" class="view-section py-8 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Breadcrumb -->
            <nav class="flex text-xs text-slate-500 mb-6 gap-2 items-center">
                <button type="button" onclick="navigateTo('home')" class="hover:text-brand-primary">Home</button>
                <i class="fa-solid fa-chevron-right text-[10px]"></i>
                <button type="button" onclick="navigateTo('shop')" class="hover:text-brand-primary">Shop</button>
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
