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
        'product_number',
        'sku',
        'description',
        'short_description',
        'category_id',
        'condition',
        'status',
        'price',
        'discounted_price',
        'available_quantity',
        'created_by',
        'updated_by',

    ];

    // A product belongs to a category
    public function category()
    {
        return $this->belongsTo(Category::class);
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

    // Polymorphic relationship to assets
    public function assets()
    {
        return $this->morphMany(Assets::class, 'assetable');
    }

    // To retrieve the featured asset (image)
    public function featuredImage()
    {
        return $this->morphOne(Assets::class, 'assetable')->where('is_featured', true);
    }
}
