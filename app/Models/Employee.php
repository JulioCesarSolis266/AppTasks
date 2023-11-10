<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'DNI',
        'nacionality',
        'cellphone',
        'bank_account',
        'birthdate',
        'genre_id',
        'address',
        'position_id',
        'title_id',
        'salary',
        'hire_date',
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function title()
    {
        return $this->belongsTo(Title::class);
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}
