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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('product_number')->unique();
            $table->string('sku')->unique();
            $table->text('description')->nullable();
            $table->text('short_description')->nullable();

            // Foreign key relationships
            $table->foreignId('category_id')->constrained()->onDelete('cascade');

            // Status and condition
            $table->enum('condition', ['new', 'used', 'refurbished'])->default('new');
            $table->enum('status', ['available', 'out_of_stock', 'discontinued'])->default('available');

            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('updated_by')->nullable()->constrained('users')->onDelete('set null');

            //add - Price ,Discouted Price , Available Quantity .
            $table->decimal('price', 10, 2)->default(0);
            $table->decimal('discounted_price', 10, 2)->default(0);
            $table->integer('available_quantity')->default(0);

            // Soft deletes and timestamps
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
