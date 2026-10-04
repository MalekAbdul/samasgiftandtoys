<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DummyProductSeeder extends Seeder
{
    private const COUNT = 50;

    /**
     * Inserts 50 dummy products (SKU SAMA-201 .. SAMA-250) with a primary image,
     * an inventory level and an "opening" stock movement.
     *
     * Prerequisite: php artisan db:seed --class=BusinessSeeder (creates categories)
     * Run:          php artisan db:seed --class=DummyProductSeeder
     * Safe to re-run: products whose SKU already exists are skipped.
     */
    public function run(): void
    {
        $categories = DB::table('categories')->pluck('id', 'slug');

        if ($categories->isEmpty()) {
            $this->command?->error('No categories found. Run: php artisan db:seed --class=BusinessSeeder');

            return;
        }

        $bases = [
            'toys' => ['Remote Control Truck', 'Building Train Set', 'Racing Car', 'Dino Figure Set', 'Water Squirter', 'Toy Kitchen Set', 'Pull-Back Cars', 'Spinning Top Pack'],
            'gifts' => ['Gift Hamper', 'Birthday Surprise Box', 'Keepsake Music Box', 'Party Favor Pack', 'Greeting Card Bundle', 'Balloon Celebration Kit', 'Cuddle Gift Set'],
            'plush' => ['Plush Bunny', 'Teddy Bear', 'Plush Unicorn', 'Plush Elephant', 'Fluffy Panda', 'Soft Puppy', 'Plush Dinosaur'],
            'stem' => ['Science Experiment Kit', 'Magnetic Tiles Set', 'Coding Robot', 'Crystal Growing Kit', 'Solar Mini Car Kit', 'Microscope Kit', 'Engineering Blocks'],
            'games' => ['Memory Match Game', 'Wooden Jigsaw Puzzle', 'Family Board Game', 'Card Game Deck', 'Stacking Tower Game', 'Alphabet Puzzle Mat', 'Dice Adventure Game'],
        ];

        $adjectives = ['Mini', 'Giant', 'Super', 'Rainbow', 'Deluxe', 'Fun', 'Magic', 'Happy', 'Jumbo', 'Classic'];
        $ageGroups = ['0-2', '3-5', '6-8', '9+'];
        $badges = [null, null, null, 'NEW', 'HOT', 'SALE', 'POPULAR', 'GIFT'];

        $slugs = array_values(array_filter(array_keys($bases), fn ($slug) => $categories->has($slug)));

        if ($slugs === []) {
            $this->command?->error('Expected category slugs (toys, gifts, plush, stem, games) were not found.');

            return;
        }

        $now = now();
        $created = 0;

        DB::transaction(function () use (&$created, $bases, $adjectives, $ageGroups, $badges, $slugs, $categories, $now) {
            for ($i = 1; $i <= self::COUNT; $i++) {
                $sku = 'SAMA-'.(200 + $i);

                if (DB::table('products')->where('sku', $sku)->exists()) {
                    continue;
                }

                $categorySlug = $slugs[($i - 1) % count($slugs)];
                $base = $bases[$categorySlug][array_rand($bases[$categorySlug])];
                $title = $adjectives[array_rand($adjectives)].' '.$base;

                $price = mt_rand(499, 5999) / 100;
                $cost = round($price * mt_rand(40, 65) / 100, 2);
                $compareAt = mt_rand(1, 100) <= 30 ? round($price * 1.2, 2) : null;
                $stock = mt_rand(0, 100);

                $productId = DB::table('products')->insertGetId([
                    'category_id' => $categories[$categorySlug],
                    'sku' => $sku,
                    'barcode' => '890'.str_pad((string) (1000000 + $i), 10, '0', STR_PAD_LEFT),
                    'slug' => Str::slug($title).'-'.strtolower($sku),
                    'title' => $title,
                    'description' => "A fun, child-safe {$base} that makes a great gift for any occasion.",
                    'price' => $price,
                    'compare_at_price' => $compareAt,
                    'cost_price' => $cost,
                    'age_group' => $ageGroups[array_rand($ageGroups)],
                    'badge' => $badges[array_rand($badges)],
                    'weight' => mt_rand(3, 40) / 10,
                    'weight_unit' => 'lb',
                    'attributes' => json_encode(['material' => 'Non-toxic, child-safe materials']),
                    'track_inventory' => true,
                    'reorder_level' => 5,
                    'is_active' => true,
                    'is_featured' => mt_rand(1, 100) <= 15,
                    'rating_average' => mt_rand(40, 50) / 10,
                    'reviews_count' => mt_rand(0, 120),
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);

                DB::table('product_images')->insert([
                    'product_id' => $productId,
                    'path' => 'images/products/p'.((($i - 1) % 7) + 1).'.jpeg', // reuses your 7 local sample photos
                    'alt_text' => $title,
                    'sort_order' => 0,
                    'is_primary' => true,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);

                DB::table('inventory_levels')->updateOrInsert(
                    ['product_id' => $productId],
                    ['quantity_on_hand' => $stock, 'quantity_reserved' => 0, 'created_at' => $now, 'updated_at' => $now]
                );

                if ($stock > 0) {
                    DB::table('stock_movements')->insert([
                        'product_id' => $productId,
                        'type' => 'opening',
                        'quantity' => $stock,
                        'balance_after' => $stock,
                        'unit_cost' => $cost,
                        'note' => 'Dummy opening stock',
                        'occurred_at' => $now,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ]);
                }

                $created++;
            }
        });

        $this->command?->info("Inserted {$created} dummy products.");
    }
}
