<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request): View
    {
        $category = $request->query('category', 'all');
        $categories = config('demo-catalog.categories');

        abort_unless(
            is_string($category)
                && (in_array($category, ['all', 'sale', 'baby', 'wishlist'], true)
                    || array_key_exists($category, $categories)),
            404
        );

        $search = $request->query('search', '');
        abort_unless(is_string($search), 404);

        return view('frontend.shop', [
            'title' => 'Shop Toys, Gifts & More | SAMA\'S GIFTS & TOYS',
            'description' => 'Browse toys, gifts, plush, games, and educational products for every age.',
            'products' => config('demo-catalog.products'),
            'categories' => $categories,
            'categoryLabel' => [
                'all' => 'Shop All Products',
                ...$categories,
                'baby' => 'Baby & Toddler',
                'sale' => 'Sale & Clearance',
                'wishlist' => 'Wishlist',
            ][$category],
            'selectedCategory' => $category,
            'search' => $search,
        ]);
    }
}
