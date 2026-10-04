<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Current stock snapshot (one row per product; single location).
        Schema::create('inventory_levels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->unique()->constrained()->cascadeOnDelete();
            $table->integer('quantity_on_hand')->default(0);
            $table->unsignedInteger('quantity_reserved')->default(0); // held for confirmed-but-unshipped orders
            $table->timestamps();
        });

        // Immutable ledger. quantity is signed: + stock in, - stock out.
        // Every change to inventory_levels MUST have a matching row here, written in the same transaction.
        Schema::create('stock_movements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->restrictOnDelete();
            $table->string('type', 20);                   // purchase, sale, return_in, return_out, adjustment, damage, opening
            $table->integer('quantity');
            $table->integer('balance_after');
            $table->decimal('unit_cost', 12, 2)->nullable();
            $table->nullableMorphs('reference');          // Purchase, Sale, SaleReturn, ...
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('note')->nullable();
            $table->timestamp('occurred_at')->useCurrent();
            $table->timestamps();

            $table->index(['product_id', 'occurred_at']);
            $table->index('type');
            // Idempotency: one movement per product per source record and type
            $table->unique(['product_id', 'type', 'reference_type', 'reference_id'], 'stock_movements_idempotency_unique');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stock_movements');
        Schema::dropIfExists('inventory_levels');
    }
};
