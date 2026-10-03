<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class ProductController extends Controller
{
    public function show(string $slug): View
    {
        $product = collect(config('demo-catalog.products'))
            ->firstWhere('slug', $slug);

        abort_if($product === null, 404);

        return view('frontend.product-details', [
            'product' => $product,
            'categoryLabel' => config('demo-catalog.categories.'.$product['category']),
            'title' => $product['title'].' | SAMA\'S GIFTS & TOYS',
            'description' => $product['description'],
        ]);
    }
}
