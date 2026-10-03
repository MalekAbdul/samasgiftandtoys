<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class CheckoutController extends Controller
{
    public function index(): View
    {
        return view('frontend.checkout', [
            'title' => 'Checkout Preview | SAMA\'S GIFTS & TOYS',
            'description' => 'Review the checkout preview for your cart.',
        ]);
    }

    public function confirmation(): View
    {
        return view('frontend.confirmation', [
            'title' => 'Checkout Preview | SAMA\'S GIFTS & TOYS',
            'description' => 'Checkout is not enabled yet. No order or payment has been submitted.',
        ]);
    }
}
