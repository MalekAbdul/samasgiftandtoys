<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->restrictOnDelete();

            $table->string('sku', 50)->unique();          // e.g. SAMA-109
            $table->string('barcode', 64)->nullable()->unique(); // for POS scanning
            $table->string('slug')->unique();
            $table->string('title');
            $table->text('description')->nullable();

            // Pricing
            $table->decimal('price', 12, 2);              // current selling price
            $table->decimal('compare_at_price', 12, 2)->nullable(); // "old price" for sale display
            $table->decimal('cost_price', 12, 2)->default(0);       // last/average purchase cost (profit reports)
            $table->decimal('tax_rate', 5, 2)->nullable();          // null = use settings default

            // Attributes shown in storefront
            $table->string('age_group', 10)->nullable()->index();   // 0-2, 3-5, 6-8, 9+
            $table->string('badge', 20)->nullable();                // NEW, HOT, SALE, ...
            $table->decimal('weight', 8, 2)->nullable();
            $table->string('weight_unit', 5)->default('lb');
            $table->json('attributes')->nullable();                 // extra specs (material, size, batteries...)

            // Inventory behaviour
            $table->boolean('track_inventory')->default(true);
            $table->unsignedInteger('reorder_level')->default(5);   // low-stock alert threshold

            // Visibility
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false);

            // Cached review stats (updated when reviews are approved)
            $table->decimal('rating_average', 3, 2)->default(0);
            $table->unsignedInteger('reviews_count')->default(0);

            $table->timestamps();
            $table->softDeletes();

            $table->index(['category_id', 'is_active']);
            $table->index(['is_featured', 'is_active']);
            $table->index('title');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
