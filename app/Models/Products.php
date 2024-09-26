<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use HasFactory, SoftDeletes;

    // Define the table if it's not the default 'products'
    protected $table = 'products';

    // Define the fillable fields to allow mass assignment
    protected $fillable = [
        'name',
        'slug',
        'description',
        'short_description',
        'sku',
        'barcode',
        'price',
        'discount_price',
        'cost_price',
        'currency',
        'quantity',
        'is_active',
        'status',
        'weight',
        'dimensions',
        'category_id',
        'brand_id',
        'image_url',
        'gallery',
        'video_url',
        'has_variants',
        'variant_id',
        'color',
        'size',
        'tax_class',
        'shipping_class',
        'shipping_cost',
        'on_sale',
        'sale_start_date',
        'sale_end_date',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'tags',
        'stock_status',
        'min_purchase_quantity',
        'max_purchase_quantity',
        'shipping_weight',
        'warehouse_location',
        'backorder_allowed',
        'related_products',
        'upsell_products',
        'cross_sell_products',
        'created_by',
        'updated_by',
    ];

    // Hidden fields (if you want to exclude them from JSON)
    protected $hidden = [
        'created_by',
        'updated_by',
        'deleted_at',
    ];

    // Define the dates for proper casting
    protected $dates = ['deleted_at', 'sale_start_date', 'sale_end_date'];

    // Cast fields to their appropriate types
    protected $casts = [
        'is_active' => 'boolean',
        'has_variants' => 'boolean',
        'on_sale' => 'boolean',
        'price' => 'decimal:2',
        'discount_price' => 'decimal:2',
        'cost_price' => 'decimal:2',
        'gallery' => 'array',
        'related_products' => 'array',
        'upsell_products' => 'array',
        'cross_sell_products' => 'array',
        'tags' => 'array',
        'backorder_allowed' => 'boolean',
    ];

    // Relationships

    /**
     * Product belongs to a category.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Product belongs to a brand.
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * Product has many variants (if applicable).
     */
    public function variants()
    {
        return $this->hasMany(Variant::class);
    }

    /**
     * Product has many reviews.
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Product can have multiple tags.
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * Get the user who created the product.
     */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the user who last updated the product.
     */
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
