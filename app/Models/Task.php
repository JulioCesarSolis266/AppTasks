<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
       'branch_id',
       'coordinator_id',
       'visit_date',
       'task_details',
       'other_data',
       'user_id'
    ];
}
