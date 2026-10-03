<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Illuminate\View\View as ViewInstance;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('layouts.frontend', function (ViewInstance $view): void {
            $products = collect(config('demo-catalog.products'))
                ->map(function (array $product): array {
                    $product['image'] = Str::startsWith($product['image'], ['http://', 'https://'])
                        ? $product['image']
                        : asset($product['image']);
                    $product['url'] = route('product.show', ['slug' => $product['slug']]);

                    return $product;
                })
                ->all();

            $view->with('catalogProducts', $products);
        });
    }
}
