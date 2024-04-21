<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\DianujHashidsTrait;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'blog_id',
        'image_name',
    ];


}
