<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'parent_id'];

    public function children()
    {
        return $this->hasMany(Attribute::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Attribute::class, 'parent_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'attribute_product');
    }
}
