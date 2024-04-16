<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'role',
        'descripction'
     ];

    public function users(){
        return $this->hasMany('App\Model\User');//hasMany se utiliza para las relaciones de uno a muchos. En este caso un rol tiene muchos usuarios.
    }

}
