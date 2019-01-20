<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\User;

class PermissionUserRequest extends FormRequest
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
            //
        ];
    }

    public function makeAdmin($id) {
        User::where('id', $id)->update(['isAdmin' => 1]);
    }

    public function makeNotAdmin($id) {
        User::where('id', $id)->update(['isAdmin' => 0]);
    }
}
