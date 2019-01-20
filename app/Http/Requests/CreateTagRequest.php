<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Tag;

class CreateTagRequest extends FormRequest
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
            'tag' => 'required'
        ];
    }

    public function storeTag() {
        Tag::create(['tag' => $this->tag]);
    }

    public function updateTag($tag) {
        $tag->update(['tag' => $this->tag]);
    }
}
