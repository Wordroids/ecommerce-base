<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductMedia extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'image_url',
        'gallery',
        'video_url',
        'is_featured',
    ];

    // ProductMedia belongs to a Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
