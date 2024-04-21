<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\DianujHashidsTrait;

class Member extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
    ];

    public function memberskill()
    {
        return $this->hasMany(Memberskill::class, 'memb_id');
    }
}
