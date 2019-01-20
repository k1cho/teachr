<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
        ];
    }

    public function updatePost($post)
    {
        if($this->hasFile('image')) {
            $post->image = $this->uploadImage()->fileName;
        }

        $post->title = $this->title;
        $post->slug = str_slug($this->title);
        $post->description = $this->description;
        $post->category_id = $this->category_id;
        $post->save();

        $post->tags()->sync($this->tags);
    }

    public function uploadImage()
    {
        $uploadedImage = $this->file('image');
        $this->fileName = rand(100,200) . '-'. str_slug($this->title) . '.' . $uploadedImage->getClientOriginalExtension();
        $uploadedImage->storePubliclyAs('public/posts/', $this->fileName);

        return $this;
    }
}
