<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\DianujHashidsTrait;

class BlogTag extends Model
{
    use HasFactory, DianujHashidsTrait;
    protected $table='blog_tags';

    public function tag()
    {
        return $this->belongsTo(Tag::class,'tag_id','id');
    }



}
