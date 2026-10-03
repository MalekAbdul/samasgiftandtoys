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
