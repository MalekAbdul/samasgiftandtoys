<footer class="bg-slate-900 text-slate-400 border-t border-slate-800 text-xs py-12 mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Col 1 -->
            <div class="space-y-3">
                <span class="text-white font-extrabold text-lg tracking-tight">SAMA'S GIFTS & TOYS</span>
                <p class="text-slate-400 leading-relaxed">A local gifts and toys retailer preparing an online storefront for families.</p>
                <div class="flex gap-3 text-white text-base pt-2">
                    <span aria-label="Facebook"><i class="fa-brands fa-facebook"></i></span>
                    <span aria-label="Instagram"><i class="fa-brands fa-instagram"></i></span>
                    <span aria-label="Pinterest"><i class="fa-brands fa-pinterest"></i></span>
                </div>
            </div>

            <!-- Col 2 -->
            <div>
                <h4 class="text-white font-bold mb-3 uppercase tracking-wider">Quick Links</h4>
                <ul class="space-y-2">
                    <li><a href="{{ route('shop', ['category' => 'toys']) }}" class="hover:text-white">Toys & Playsets</a></li>
                    <li><a href="{{ route('shop', ['category' => 'gifts']) }}" class="hover:text-white">Gift Celebrations</a></li>
                    <li><a href="{{ route('shop', ['category' => 'plush']) }}" class="hover:text-white">Plush & Dolls</a></li>
                    <li><a href="{{ route('shop', ['category' => 'stem']) }}" class="hover:text-white">Educational & STEM</a></li>
                </ul>
            </div>

            <!-- Col 3 -->
            <div>
                <h4 class="text-white font-bold mb-3 uppercase tracking-wider">Customer Care</h4>
                <ul class="space-y-2">
                    <li><a href="{{ route('faq') }}" class="hover:text-white">Shipping & Returns</a></li>
                    <li><a href="{{ route('faq') }}" class="hover:text-white">Order Tracking</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-white">Contact Store</a></li>
                    <li><a href="{{ route('faq') }}" class="hover:text-white">Store FAQs</a></li>
                </ul>
            </div>

            <!-- Col 4 -->
            <div>
                <h4 class="text-white font-bold mb-3 uppercase tracking-wider">US Retail Store</h4>
                <p class="text-slate-400 mb-2">USA local retailer</p>
                <p class="text-slate-400 mb-2">Online ordering is coming soon.</p>
            </div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8 mt-8 border-t border-slate-800 text-center text-slate-500">
            &copy; {{ now()->year }} SAMA'S GIFTS & TOYS. All rights reserved.
        </div>
    </footer>
