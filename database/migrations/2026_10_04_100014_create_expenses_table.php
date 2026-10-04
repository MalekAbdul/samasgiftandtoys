<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Operating costs not tied to stock: rent, packaging, ads, salaries, utilities
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->string('category', 50)->index();
            $table->string('description')->nullable();
            $table->decimal('amount', 12, 2);
            $table->string('payment_method', 20)->nullable();
            $table->date('expense_date')->index();
            $table->string('receipt_path')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
