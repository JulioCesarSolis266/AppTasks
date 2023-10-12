<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Closure extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'number_visits',
        'visit_date',
        'entry_time',
        'exit_time',
        'workers_number',
        'tasks_details',
        'hour_cost',
        'hours_number',
        'total',
        'kilometers_cost',
        'roundtrip_kilometers',
        'total_cost',
        'other_expenses',
        'expenses_cost',
        'material_provided',
        'material_details',
        'quantity',
        'material_sent',
        'task_id'
    ];

    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id');
    }
}
