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
