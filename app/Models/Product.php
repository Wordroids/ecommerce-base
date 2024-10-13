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
        'product_number',
        'sku',
        'description',
        'short_description',
        'category_id',
        'brand_id',
        'condition',
        'status',
    ];

    // A product belongs to a category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Product has one Price
    public function price()
    {
        return $this->hasOne(ProductPrices::class);
    }

     // Product has one Inventory
     public function inventory()
     {
         return $this->hasOne(ProductInventory::class);
     }
    // Product has many Media (e.g., images and videos)
    public function media()
    {
        return $this->hasMany(ProductMedia::class);
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
