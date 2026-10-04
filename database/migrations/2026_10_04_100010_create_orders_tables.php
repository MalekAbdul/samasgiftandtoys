<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Online orders. Stock is NOT deducted here; it is deducted when the order is
     * confirmed/paid and a Sale record is created (see sales tables).
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number', 30)->unique(); // SG-20261004-0001
            $table->foreignId('customer_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('shipping_method_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('coupon_id')->nullable()->constrained()->nullOnDelete();

            // pending -> confirmed -> processing -> shipped -> delivered | cancelled | refunded
            $table->string('status', 20)->default('pending')->index();
            // unpaid -> paid | failed | refunded | partially_refunded
            $table->string('payment_status', 20)->default('unpaid')->index();

            // Contact snapshot (supports guest checkout)
            $table->string('email');
            $table->string('phone', 30)->nullable();

            // Shipping address snapshot (addresses can change later; the order must not)
            $table->string('ship_name');
            $table->string('ship_phone', 30)->nullable();
            $table->string('ship_line1');
            $table->string('ship_line2')->nullable();
            $table->string('ship_city', 100);
            $table->string('ship_state', 100)->nullable();
            $table->string('ship_postal_code', 20)->nullable();
            $table->string('ship_country', 2)->default('US');

            // Money
            $table->char('currency', 3)->default('USD');
            $table->decimal('subtotal', 12, 2);
            $table->decimal('discount_total', 12, 2)->default(0);
            $table->decimal('shipping_total', 12, 2)->default(0);
            $table->decimal('tax_total', 12, 2)->default(0);
            $table->decimal('grand_total', 12, 2);

            // Gift options
            $table->boolean('is_gift')->default(false);
            $table->boolean('gift_wrap')->default(false);
            $table->text('gift_message')->nullable();

            $table->text('customer_note')->nullable();
            $table->text('internal_note')->nullable();

            // Fulfilment
            $table->string('carrier', 50)->nullable();
            $table->string('tracking_number', 100)->nullable();

            // Lifecycle timestamps
            $table->timestamp('placed_at')->useCurrent();
            $table->timestamp('confirmed_at')->nullable();
            $table->timestamp('shipped_at')->nullable();
            $table->timestamp('delivered_at')->nullable();
            $table->timestamp('cancelled_at')->nullable();
            $table->string('cancel_reason')->nullable();

            $table->string('ip_address', 45)->nullable();
            $table->timestamps();

            $table->index(['customer_id', 'placed_at']);
            $table->index('placed_at');
        });

        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->cascadeOnDelete();
            $table->foreignId('product_id')->nullable()->constrained()->nullOnDelete();
            // Snapshots so history survives product edits/deletes
            $table->string('sku', 50);
            $table->string('title');
            $table->decimal('unit_price', 12, 2);
            $table->unsignedInteger('quantity');
            $table->decimal('discount_amount', 12, 2)->default(0);
            $table->decimal('tax_amount', 12, 2)->default(0);
            $table->decimal('line_total', 12, 2);
            $table->timestamps();

            $table->index('product_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_items');
        Schema::dropIfExists('orders');
    }
};
