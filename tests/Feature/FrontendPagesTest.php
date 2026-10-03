<?php

namespace Tests\Feature;

use Tests\TestCase;

class FrontendPagesTest extends TestCase
{
    public function test_public_frontend_pages_render_successfully(): void
    {
        foreach ([
            '/',
            '/shop',
            '/product/giant-banana-squishy-toy',
            '/cart',
            '/checkout',
            '/order-confirmation',
            '/about',
            '/faq',
            '/contact',
        ] as $path) {
            $this->get($path)->assertOk();
        }
    }

    public function test_shop_supports_catalog_filters_and_rejects_unknown_categories(): void
    {
        $this->get('/shop?category=toys')
            ->assertOk()
            ->assertSee('Toys & Playsets');

        $this->get('/shop?category[]=toys')->assertNotFound();
        $this->get('/shop?category=unknown')->assertNotFound();
    }

    public function test_unknown_products_return_a_branded_not_found_page(): void
    {
        $this->get('/product/not-a-product')
            ->assertNotFound()
            ->assertSee("We couldn't find that page", false);
    }

    public function test_homepage_banner_images_use_public_asset_urls(): void
    {
        $response = $this->get('/');

        foreach (['banner1.jpg', 'banner2.jpg', 'banner3.jpg', 'banner4.jpg', 'banner5.jpg'] as $image) {
            $response->assertSee('/images/banner/'.$image);
        }

        $response->assertDontSee('/public/images/banner/');
    }

    public function test_checkout_preview_does_not_claim_to_create_an_order(): void
    {
        $this->get('/checkout')
            ->assertOk()
            ->assertSee('does not collect customer or payment details');

        $this->get('/order-confirmation')
            ->assertOk()
            ->assertSee('No order or payment has been submitted.');
    }
}
