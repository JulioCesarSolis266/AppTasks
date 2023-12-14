<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cost extends Model
{
    use HasFactory;


    protected $fillable = [
        'item',
        'cost',
    ];

    public function productDetails()
    {
        return $this->hasMany(ProductDetail::class);
    }

    public function closures()
    {
        return $this->belongsToMany(Closure::class, 'product_details');
    }
}
