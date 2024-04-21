<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\DianujHashidsTrait;

class Employe extends Model
{
    use HasFactory, DianujHashidsTrait;
    protected $fillable = [
        'dept_id',  // Add this line
        'name',
        'email',
        'phone',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'dept_id');
    }


    public function skill()
    {
        return $this->hasMany(Skill::class,'emp_id');
    }
}
