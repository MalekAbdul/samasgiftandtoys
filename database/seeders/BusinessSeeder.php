<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BusinessSeeder extends Seeder
{
    /**
     * Seeds settings, shipping, categories and the demo catalog with opening stock.
     * Run with: php artisan db:seed --class=BusinessSeeder
     */
    public function run(): void
    {
        $now = now();

        DB::transaction(function () use ($now) {
            foreach ([
                ['general', 'store.name', "SAMA'S GIFTS & TOYS"],
                ['general', 'store.currency', 'USD'],
                ['tax', 'tax.default_rate', '8'],
                ['shipping', 'shipping.free_threshold', '50'],
            ] as [$group, $key, $value]) {
                DB::table('settings')->updateOrInsert(
                    ['key' => $key],
                    ['group' => $group, 'value' => $value, 'created_at' => $now, 'updated_at' => $now]
                );
            }

            DB::table('shipping_methods')->updateOrInsert(
                ['name' => 'Standard Shipping'],
                ['cost' => 5.99, 'free_over' => 50, 'est_days_min' => 3, 'est_days_max' => 7,
                 'is_pickup' => false, 'is_active' => true, 'sort_order' => 1, 'created_at' => $now, 'updated_at' => $now]
            );
            DB::table('shipping_methods')->updateOrInsert(
                ['name' => 'Store Pickup'],
                ['cost' => 0, 'free_over' => null, 'est_days_min' => 0, 'est_days_max' => 1,
                 'is_pickup' => true, 'is_active' => true, 'sort_order' => 2, 'created_at' => $now, 'updated_at' => $now]
            );

            DB::table('coupons')->updateOrInsert(
                ['code' => 'SAMAGIFT'],
                ['description' => 'Welcome discount', 'type' => 'percent', 'value' => 10, 'min_subtotal' => 0,
                 'is_active' => true, 'created_at' => $now, 'updated_at' => $now]
            );

            $categoryIds = [];
            $order = 0;
            foreach (config('demo-catalog.categories') as $slug => $name) {
                DB::table('categories')->updateOrInsert(
                    ['slug' => $slug],
                    ['name' => $name, 'sort_order' => ++$order, 'is_active' => true, 'created_at' => $now, 'updated_at' => $now]
                );
                $categoryIds[$slug] = DB::table('categories')->where('slug', $slug)->value('id');
            }

            foreach (config('demo-catalog.products') as $p) {
                DB::table('products')->updateOrInsert(
                    ['sku' => $p['specs']['sku']],
                    [
                        'category_id' => $categoryIds[$p['category']],
                        'slug' => $p['slug'],
                        'title' => $p['title'],
                        'description' => $p['description'],
                        'price' => $p['price'],
                        'compare_at_price' => $p['oldPrice'],
                        'age_group' => $p['ageGroup'],
                        'badge' => $p['badge'],
                        'weight' => (float) $p['specs']['weight'],
                        'weight_unit' => 'lb',
                        'rating_average' => $p['rating'],
                        'reviews_count' => $p['reviewsCount'],
                        'is_active' => true,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ]
                );
                $productId = DB::table('products')->where('sku', $p['specs']['sku'])->value('id');

                DB::table('product_images')->updateOrInsert(
                    ['product_id' => $productId, 'is_primary' => true],
                    ['path' => $p['image'], 'alt_text' => $p['title'], 'sort_order' => 0, 'created_at' => $now, 'updated_at' => $now]
                );

                // Inventory starts at zero; real stock enters through a recorded Purchase or an "opening" movement.
                DB::table('inventory_levels')->updateOrInsert(
                    ['product_id' => $productId],
                    ['quantity_on_hand' => 0, 'quantity_reserved' => 0, 'created_at' => $now, 'updated_at' => $now]
                );
            }
        });
    }
}
