<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'address',
        'city_country',
        'company_id'
    ];
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function coordinator(){
        return $this->hasMany('App\Models\Coordinator');
    }
}
