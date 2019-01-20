<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    //protected $with = ['lastThree'];

    public function posts() {
        return $this->hasMany(Post::class);
    }

    public function lastThree() {
        return $this->posts()->orderBy('created_at', 'desc')->take(3)->get();
    }
}
