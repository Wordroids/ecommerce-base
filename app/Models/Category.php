<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'parent_id'];

    /**
     * Get the parent category of this category.
     */
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    /**
     * Get the child categories for this category.
     */
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    // A category has many products
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
