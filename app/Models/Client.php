<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [

            'user_id',
            'position_id',
            'branch_id',
            'cellphone',
        ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function Position()
    {
        return $this->belongsTo(Position::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
