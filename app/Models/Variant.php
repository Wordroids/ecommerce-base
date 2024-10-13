<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
   
    use HasFactory;
    protected $fillable = ['name', 'model_id'];
    public function model()
    {
        return $this->belongsTo(Models::class);
    }
}
