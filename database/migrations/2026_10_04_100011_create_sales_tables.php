<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * A Sale is the financial record that moves inventory.
     *  - Online: created from a confirmed/paid Order (order_id set, channel = online)
     *  - Physical shop: created directly at the till (order_id null, channel = pos)
     */
    public function up(): void
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('sale_number', 30)->unique();  // INV-20261004-0001
            $table->string('channel', 10)->index();       // online | pos
            $table->foreignId('order_id')->nullable()->unique()->constrained()->nullOnDelete(); // 1 order -> max 1 sale
            $table->foreignId('customer_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete(); // cashier / staff

            $table->string('status', 20)->default('completed')->index(); // completed, partially_returned, returned, voided
            $table->string('payment_status', 20)->default('paid')->index();

            $table->decimal('subtotal', 12, 2);
            $table->decimal('discount_total', 12, 2)->default(0);
            $table->decimal('shipping_total', 12, 2)->default(0);
            $table->decimal('tax_total', 12, 2)->default(0);
            $table->decimal('grand_total', 12, 2);
            $table->decimal('paid_amount', 12, 2)->default(0);
            $table->decimal('cost_total', 12, 2)->default(0); // sum of unit_cost*qty -> gross profit

            $table->text('notes')->nullable();
            $table->timestamp('sold_at')->useCurrent()->index();
            $table->timestamps();
        });

        Schema::create('sale_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sale_id')->constrained()->cascadeOnDelete();
            $table->foreignId('product_id')->constrained()->restrictOnDelete();
            $table->string('sku', 50);
            $table->string('title');
            $table->unsignedInteger('quantity');
            $table->unsignedInteger('returned_quantity')->default(0);
            $table->decimal('unit_price', 12, 2);
            $table->decimal('unit_cost', 12, 2)->default(0);   // cost at time of sale
            $table->decimal('discount_amount', 12, 2)->default(0);
            $table->decimal('tax_amount', 12, 2)->default(0);
            $table->decimal('line_total', 12, 2);
            $table->timestamps();

            $table->index('product_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sale_items');
        Schema::dropIfExists('sales');
    }
};
