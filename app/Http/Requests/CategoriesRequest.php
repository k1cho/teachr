<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Category;

class CategoriesRequest extends FormRequest
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
            'name' => 'required|max:100'
        ];
    }

    public function storeCategory() {
        Category::create(['name' => $this->name]);
    }

    public function updateCategory($category) {
        $category->update(['name' => $this->name]);
    }
}
