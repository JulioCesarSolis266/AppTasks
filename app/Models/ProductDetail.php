<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'closure_id',
        'product_id',
        'count',
    ];
    public function closure()
    {
        return $this->belongsTo(Closure::class, 'closure_id');
    }
    public function cost()
    {
        return $this->belongsTo(Cost::class, 'product_id');
    }
}
