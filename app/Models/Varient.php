<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Varient extends Model
{
    protected $fillable = ['name', 'model_id'];
    use HasFactory;
    public function model()
    {
        return $this->belongsTo(Model::class);
    }
}
