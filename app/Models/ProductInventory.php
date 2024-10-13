<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductInventory extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'quantity',
        'stock_status',
        'backorder_allowed',
        'min_purchase_quantity',
        'max_purchase_quantity',
        'weight',
        'height',
        'width',
        'length',
        'shipping_weight',
        'warehouse_location',
    ];

    // ProductInventory belongs to a Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
