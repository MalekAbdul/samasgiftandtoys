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
