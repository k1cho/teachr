<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{   
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['title', 'slug', 'content', 'category_id', 'image', 'user_id'];

    protected $with = ['category', 'tags', 'user'];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function getImagePathAttribute() {
        return asset('storage/posts/' . $this->image);
    }

    public function deleteForever($id) {
        $this->onlyTrashed()->where('id', $id)->first();
        return $this->forceDelete();
    }

    public function last() {
        return $this->orderBy('created_at', 'desc')->first();
    }

    public function skipFirstPost() {
        return $this->orderBy('created_at', 'desc')->skip(1)->take(1)->first();
    }

    public function skipSecondPost() {
        return $this->orderBy('created_at', 'desc')->skip(2)->take(1)->first();
    }

    public function lastTwo() {
        return $this->orderBy('created_at', 'desc')->skip(1)->take(2)->get();
    }

    public function nextButton() {
        return $this->where('id', '>', $this->id)->min('id');
    }

    public function prevButton() {
        return $this->where('id', '<', $this->id)->max('id');
    }
}