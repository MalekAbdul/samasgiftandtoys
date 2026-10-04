<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('code', 50)->unique();         // SAMAGIFT
            $table->string('description')->nullable();
            $table->string('type', 10);                   // percent | fixed
            $table->decimal('value', 12, 2);
            $table->decimal('min_subtotal', 12, 2)->default(0);
            $table->decimal('max_discount', 12, 2)->nullable();
            $table->unsignedInteger('usage_limit')->nullable();
            $table->unsignedInteger('per_customer_limit')->nullable();
            $table->unsignedInteger('used_count')->default(0);
            $table->timestamp('starts_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('shipping_methods', function (Blueprint $table) {
            $table->id();
            $table->string('name');                       // Standard, Express, Store pickup
            $table->decimal('cost', 12, 2)->default(0);
            $table->decimal('free_over', 12, 2)->nullable(); // free-shipping threshold bar in the cart
            $table->unsignedSmallInteger('est_days_min')->nullable();
            $table->unsignedSmallInteger('est_days_max')->nullable();
            $table->boolean('is_pickup')->default(false);
            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('shipping_methods');
        Schema::dropIfExists('coupons');
    }
};
