<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfume extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'brand', 'size', 'price', 'description', 'available'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
