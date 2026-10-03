<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class CartController extends Controller
{
    public function index(): View
    {
        return view('frontend.cart', [
            'title' => 'Your Shopping Cart | SAMA\'S GIFTS & TOYS',
            'description' => 'Review your selected gifts and toys.',
        ]);
    }
}
