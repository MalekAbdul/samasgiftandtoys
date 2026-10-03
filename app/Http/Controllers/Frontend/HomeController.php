<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        $products = config('demo-catalog.products');
        $categoryCounts = collect($products)->countBy('category')->all();

        return view('frontend.home', [
            'title' => "SAMA's GIFTS & TOYS | Thoughtful Gifts & Joyful Toys",
            'description' => 'Thoughtful gifts, joyful toys, and friendly local service for families.',
            'featuredProducts' => array_slice($products, 0, 4),
            'categoryCounts' => $categoryCounts,
        ]);
    }
}
