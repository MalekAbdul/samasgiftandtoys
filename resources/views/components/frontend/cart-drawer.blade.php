<div id="cart-drawer-backdrop" data-action="toggle-cart" class="hidden fixed inset-0 bg-slate-950/40 backdrop-blur-xs z-50 transition-opacity"></div>
    <div id="cart-drawer" class="fixed top-0 right-0 h-full w-full max-w-md bg-white shadow-2xl z-50 transform translate-x-full transition-transform duration-300 ease-in-out flex flex-col justify-between">
        <!-- Drawer Header -->
        <div class="p-5 border-b border-slate-100 flex items-center justify-between">
            <div class="flex items-center gap-2">
                <i class="fa-solid fa-bag-shopping text-brand-primary text-xl"></i>
                <h2 class="font-extrabold text-slate-900 text-lg">Your Cart</h2>
            </div>
            <button type="button" data-action="toggle-cart" class="p-2 text-slate-400 hover:text-slate-700 text-lg" aria-label="Close cart"><i class="fa-solid fa-xmark" aria-hidden="true"></i></button>
        </div>

        <!-- Drawer Content Items -->
        <div id="cart-drawer-items" class="p-5 flex-grow overflow-y-auto divide-y divide-slate-100 space-y-4"></div>

        <!-- Drawer Footer -->
        <div class="p-5 border-t border-slate-100 bg-slate-50 space-y-3">
            <div class="flex justify-between font-extrabold text-slate-900 text-base">
                <span>Subtotal:</span>
                <span id="drawer-subtotal" class="text-brand-primary">$0.00</span>
            </div>
            <a href="{{ route('cart') }}" class="w-full bg-slate-900 hover:bg-slate-800 text-white font-bold text-xs py-3 rounded-xl transition text-center block">
                View Full Cart
            </a>
            <a href="{{ route('checkout') }}" class="w-full bg-brand-primary hover:bg-brand-primaryHover text-white font-bold text-xs py-3 rounded-xl transition text-center block">
                Checkout Now
            </a>
        </div>
    </div>
