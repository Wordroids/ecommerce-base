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
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->text('short_description')->nullable();
            $table->string('sku')->unique();
            $table->string('barcode')->nullable();
            $table->decimal('price', 8, 2);
            $table->decimal('discount_price', 8, 2)->nullable();
            $table->decimal('cost_price', 8, 2)->nullable();
            $table->string('currency', 3)->default('USD'); // Default currency
            $table->integer('quantity')->default(0);
            $table->boolean('is_active')->default(true);
            $table->enum('status', ['available', 'out_of_stock', 'discontinued'])->default('available');
            $table->decimal('weight', 8, 2)->nullable();
            $table->string('dimensions')->nullable();
        
            // Foreign keys
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->foreignId('brand_id')->nullable()->constrained()->onDelete('set null');
        
            // Product media
            $table->string('image_url')->nullable();
            $table->json('gallery')->nullable(); // For additional images
            $table->string('video_url')->nullable();
        
            // Variant-related fields
            $table->boolean('has_variants')->default(false);
        
            // SEO fields
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->json('tags')->nullable(); // For tags
            
            // Inventory and shipping
            $table->enum('stock_status', ['in_stock', 'backorder', 'out_of_stock'])->default('in_stock');
            $table->integer('min_purchase_quantity')->default(1);
            $table->integer('max_purchase_quantity')->nullable();
            $table->decimal('shipping_weight', 8, 2)->nullable();
            $table->string('warehouse_location')->nullable();
            $table->boolean('backorder_allowed')->default(false);
        
            // Related products
            $table->json('related_products')->nullable();
        
            // Audit fields
            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('updated_by')->nullable()->constrained('users')->onDelete('set null');
        
            $table->softDeletes(); // Soft deletes
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
