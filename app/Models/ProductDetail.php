<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'task_id',
        'product_id',
        'count',
        'subtotal',
    ];
    public function task()//
    {
        return $this->belongsTo(Task::class, 'task_id')->with('branch', 'coordinator', 'client', 'priority', 'status', 'employee');
    }
    public function cost()
    {
        return $this->belongsTo(Cost::class, 'product_id');
    }

}
