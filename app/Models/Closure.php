<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Closure extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'task_id',
        'visits',
        'visit_date',
        'entry_time',
        'exit_time',
        'workers_count',
        'tasks_completed',
        'total',
    ];

    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id');
    }

}
