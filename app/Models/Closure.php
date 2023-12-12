<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Closure extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'task_id',
        'visits',
        'visit_date',
        'entry_time',
        'exit_time',
        'workers_count',
        'tasks_done',
        'hour_cost',
        'hours_count',
        'total_hours',
        'km_cost',
        'roundtrip_kms',
        'total_kms',
        'extra_expenses',
        'extra_expenses_cost',
        'worker_materials',
        'worker_materials_cost',
        'eco_materials',
        'eco_materials_cost',
        'total_cost',
    ];

    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id');
    }
}
