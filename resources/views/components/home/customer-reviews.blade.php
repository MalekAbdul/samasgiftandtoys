<section class="py-14 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center max-w-xl mx-auto mb-10">
        <span class="text-brand-primary font-bold text-xs uppercase tracking-widest">Customer Feedback</span>
        <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 mt-1">Reviews Coming Soon</h2>
        <p class="text-slate-600 text-xs sm:text-sm mt-2">Verified customer reviews will appear here once online shopping is available.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach (['Product reviews', 'Store experiences', 'Gift recommendations'] as $reviewTopic)
            <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-soft">
                <div class="flex text-slate-300 text-sm mb-3" aria-hidden="true">
                    @for ($star = 0; $star < 5; $star++)<i class="fa-regular fa-star"></i>@endfor
                </div>
                <p class="text-slate-600 text-xs sm:text-sm italic mb-4">Customer-submitted {{ strtolower($reviewTopic) }} will be shown after a review system is added.</p>
                <div class="flex items-center gap-3 border-t border-slate-100 pt-3">
                    <div class="w-8 h-8 rounded-full bg-brand-primary/20 text-brand-primary flex items-center justify-center font-bold text-xs" aria-hidden="true">
                        <i class="fa-regular fa-comment"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-xs text-slate-900">{{ $reviewTopic }}</h3>
                        <span class="text-[10px] text-slate-500 font-semibold">No verified reviews yet</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
