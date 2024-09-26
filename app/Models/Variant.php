<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'color',
        'size',
        'price',
        'quantity',
    ];

    // A variant belongs to a product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
