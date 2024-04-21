<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\DianujHashidsTrait;

class Blog extends Model
{
    use HasFactory, DianujHashidsTrait;
    protected $fillable = [
        'cate_id',
        'title',  // Add this line
        'description',
    ];

    public function tags()
    {
        return $this->belongsToMany(BlogTag::class,'blog_tags','blog_id','tag_id');
    }



    public function blog_tags()
    {
        return $this->hasMany(BlogTag::class,'blog_id','id');
    }



    public function blog_images()
    {
        return $this->hasMany(Image::class,'blog_id','id');
    }



    public function blog_categorys()
    {
        return $this->belongsTo(Category::class,'cate_id');
    }
}
