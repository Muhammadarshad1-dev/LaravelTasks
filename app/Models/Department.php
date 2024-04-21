<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\DianujHashidsTrait;


class Department extends Model
{
    use HasFactory;
    public function employes()
    {
        return $this->hasMany(Employe::class, 'dept_id');
    }

    public function student()
    {
        return $this->hasMany(Student::class, 'dept_id');
    }
}
