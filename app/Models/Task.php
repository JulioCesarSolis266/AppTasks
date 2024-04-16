<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
       'title',
       'branch_id',
       'coordinator_id',
       'client_id',
       'incident_id',
       'visit_date',
       'task_details',
       'priority_id',
       'status_id',
       'other_data',
       'employee_id'
    ];

    public function user()//
    {
        return $this->belongsTo(User::class);
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class) -> with('user');//
    }

    public function company()//relacion de la tabla task con la tabla company
    {
        return $this->belongsTo(Company::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class) ->with('company');
    }

    public function coordinator()
    {
        return $this->belongsTo(Coordinator::class);
    }

    public function status()
    {
        return $this->belongsTo(TaskStatus::class);
    }

    public function priority()
    {
        return $this->belongsTo(TaskPriority::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class)-> with('user');
    }

    public function closure()
    {
        return $this->hasOne(Closure::class);
    }


}
