<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\DianujHashidsTrait;

class Memberskill extends Model
{
    use HasFactory;
    protected $fillable = [
        'memb_id',  // Add this line
        'skill',
    ];

    public function Member()
    {
        return $this->belongsTo(Member::class, 'memb_id');
    }
}
