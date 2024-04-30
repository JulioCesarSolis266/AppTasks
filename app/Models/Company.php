<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['name'];

    public function branch(){
        //cambie de branches a branch
        return $this->hasMany('App\Models\Branch');
    }
}
