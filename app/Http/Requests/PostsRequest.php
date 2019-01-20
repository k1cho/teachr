<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Post;
use Carbon\Carbon;

class PostsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'description' => 'required',
            'category_id' => 'required',
            'image' => 'required|image',
        ];
    }

    public function storePost()
    {
        $post = new Post();
        $post->title = $this->title;
        $post->slug = str_slug($this->title);
        $post->description = $this->description;
        $post->category_id = $this->category_id;
        $post->image = $this->fileName;
        $post->user_id = auth()->id();
        $post->save();

        $post->tags()->attach($this->tags);
    }

    public function uploadImage()
    {
        $uploadedImage = $this->file('image');
        $this->fileName = rand(100,200) . '-'. str_slug($this->title) . '.' . $uploadedImage->getClientOriginalExtension();
        $uploadedImage->storePubliclyAs('public/posts/', $this->fileName);

        return $this;
    }
}
