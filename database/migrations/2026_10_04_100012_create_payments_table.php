<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * One ledger for money in (orders/sales) and money out (supplier purchases, refunds).
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('direction', 3)->index();      // in | out
            $table->foreignId('order_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('sale_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('purchase_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('received_by')->nullable()->constrained('users')->nullOnDelete();

            $table->string('method', 20);                 // cash, card, bank_transfer, mobile_wallet, cod, paypal, other
            $table->string('status', 20)->default('pending')->index(); // pending, completed, failed, refunded
            $table->decimal('amount', 12, 2);
            $table->char('currency', 3)->default('USD');
            $table->string('gateway', 30)->nullable();    // stripe, paypal, ...
            $table->string('transaction_ref', 100)->nullable()->index();
            $table->json('gateway_payload')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->timestamps();

            $table->unique(['gateway', 'transaction_ref']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
