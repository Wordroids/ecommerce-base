<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    // Many-to-many relationship between tags and products
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
