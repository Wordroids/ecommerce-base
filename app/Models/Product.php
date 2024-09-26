<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

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
        'created_by',
        'updated_by',
    ];

    // A product belongs to a category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // A product belongs to a brand
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    // A product can have many variants
    public function variants()
    {
        return $this->hasMany(Variant::class);
    }

    // A product can have many reviews
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // Many-to-many relationship between products and tags
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    // A product is created by a user
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // A product is updated by a user
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
