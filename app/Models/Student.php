<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\DianujHashidsTrait;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'dept_id',
        'name',
        'email',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'dept_id');
    }
}
