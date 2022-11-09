<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_id',
        'employee_id',
        'task_name',
        'details',
        'status',
    ];

    public function project()
    {
        return $this->belongsTo(project::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class,'employee_id');
    }
}
