<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];


    // one to one polymorphic relationship
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }


    //one to many polymorphic relationship
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }


    // many to many polymorphic relationship
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
