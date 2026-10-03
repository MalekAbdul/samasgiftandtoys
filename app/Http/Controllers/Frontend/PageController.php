<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class PageController extends Controller
{
    public function about(): View
    {
        return $this->page('frontend.about', 'About Us | SAMA\'S GIFTS & TOYS', 'Learn about SAMA\'S GIFTS & TOYS and our local retail store.');
    }

    public function faq(): View
    {
        return $this->page('frontend.faq', 'Frequently Asked Questions | SAMA\'S GIFTS & TOYS', 'Find answers about shipping, returns, and shopping at SAMA\'S GIFTS & TOYS.');
    }

    public function contact(): View
    {
        return $this->page('frontend.contact', 'Contact Us | SAMA\'S GIFTS & TOYS', 'Contact SAMA\'S GIFTS & TOYS for store and product information.');
    }

    private function page(string $view, string $title, string $description): View
    {
        return view($view, compact('title', 'description'));
    }
}
