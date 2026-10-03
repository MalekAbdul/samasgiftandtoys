@extends('layouts.frontend')

@section('title', $title)
@section('description', $description)

@section('content')
<section class="py-8 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 mb-6">Checkout Preview</h1>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        <div class="lg:col-span-8 space-y-6">
            <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-soft space-y-4">
                <h2 class="font-extrabold text-slate-900 text-lg border-b border-slate-100 pb-3">Online checkout is not enabled yet</h2>
                <p class="text-sm text-slate-600 leading-relaxed">This storefront is a frontend preview. It does not collect customer or payment details, create orders, or change inventory.</p>
                <p class="text-sm text-slate-600 leading-relaxed">When ecommerce is implemented, online orders should follow the planned flow: Pending → Confirmed/Paid → Sale Created → Inventory Deducted.</p>
            </div>
        </div>

        <div class="lg:col-span-4 space-y-6">
            <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-soft space-y-4">
                <h2 class="font-extrabold text-slate-900 text-lg border-b border-slate-100 pb-3">Cart Summary</h2>
                <div id="checkout-items-summary" class="divide-y divide-slate-100 max-h-60 overflow-y-auto"></div>
                <div class="border-t border-slate-100 pt-3 space-y-2 text-xs font-medium text-slate-600">
                    <div class="flex justify-between"><span>Subtotal</span><span id="checkout-subtotal">$0.00</span></div>
                    <div class="flex justify-between"><span>Estimated Tax (8%)</span><span id="checkout-tax">$0.00</span></div>
                    <div class="flex justify-between"><span>Shipping</span><span>FREE</span></div>
                    <div class="flex justify-between text-sm font-extrabold text-slate-900 pt-2 border-t"><span>Estimated Total</span><span id="checkout-total" class="text-brand-primary">$0.00</span></div>
                </div>
                <a href="{{ route('order-confirmation') }}" class="w-full bg-slate-300 text-slate-700 font-bold text-sm py-4 rounded-2xl transition text-center block" aria-describedby="checkout-preview-note">
                    View Confirmation Preview
                </a>
                <p id="checkout-preview-note" class="text-xs text-slate-500">No purchase will be created or charged.</p>
            </div>
        </div>
    </div>
</section>
@endsection
