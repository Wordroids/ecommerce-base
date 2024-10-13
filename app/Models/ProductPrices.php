<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPrices extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'price',
        'discount_price',
        'cost_price',
        'currency',
    ];

    // ProductPrice belongs to a Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
