<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assets extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_path',
        'file_type',
        'is_featured',
        'assetable_id',
        'assetable_type',
    ];

    public function assetable()
    {
        return $this->morphTo();
    }
}
