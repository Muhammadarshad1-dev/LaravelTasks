<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\DianujHashidsTrait;

class Category extends Model
{
    use HasFactory, DianujHashidsTrait;
    protected $fillable = [
        'category_name',
    ];


}
