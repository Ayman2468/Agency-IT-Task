<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_name',
    ];

    public function tasks()
    {
        return $this->hasMany(task::class);
    }
}
