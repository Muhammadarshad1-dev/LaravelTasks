<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\DianujHashidsTrait;

class Tag extends Model
{
    use HasFactory, DianujHashidsTrait;
    protected $fillable = [
        'name',  // Add this line
    ];



}
