<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'title',
    ];

    public function employees(){
        return $this->hasMany('App\Model\Employee');//hasMany se utiliza para las relaciones de uno a muchos. En este caso un rol tiene muchos usuarios.
    }
}
