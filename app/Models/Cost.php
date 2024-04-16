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

    public function productDetails()//Esto es para la relacion de uno a muchos con la tabla product_details. osea que un servicio puede tener muchos detalles de producto
    {
        return $this->hasMany(ProductDetail::class);
    }

    public function closures()//Esto es para la relacion de muchos a muchos con la tabla closures. osea que un servicio puede tener muchos cierres
    {
        return $this->belongsToMany(Closure::class, 'product_details');
    }
}
