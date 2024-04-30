<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskPriority extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
       'task_priority',
       'color',
    ];

    public function tasks(){
        return $this->hasMany('App\Models\Task');
    }
}
