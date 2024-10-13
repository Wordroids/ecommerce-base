<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_inventories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');

            // Inventory fields
            $table->integer('quantity')->default(0);
            $table->enum('stock_status', ['in_stock', 'backorder', 'out_of_stock'])->default('in_stock');
            $table->boolean('backorder_allowed')->default(false);
            $table->integer('min_purchase_quantity')->default(1);
            $table->integer('max_purchase_quantity')->nullable();

            // Dimensions and weight
            $table->decimal('weight', 8, 2)->nullable();
            $table->decimal('height', 8, 2)->nullable();
            $table->decimal('width', 8, 2)->nullable();
            $table->decimal('length', 8, 2)->nullable();

            // Shipping
            $table->decimal('shipping_weight', 8, 2)->nullable();
            $table->string('warehouse_location')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_inventories');
    }
};
