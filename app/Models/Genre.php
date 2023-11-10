<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['genre'];

    public function employees()
    {
        return $this->hasMany('App\Models\Employee');
    }
}
