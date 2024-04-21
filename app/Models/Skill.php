<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\DianujHashidsTrait;

class Skill extends Model
{
    use HasFactory;
    public function employes()
    {
        return $this->hasMany(Employe::class,'emp_id');
    }
}
