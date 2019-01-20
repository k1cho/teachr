<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\User;

class CreateUserRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email',
        ];
    }

    public function storeUser() {
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt('password'),
        ]);
        
        $user->profile()->create([
            'avatar' => 'avatar.png',
            'about' => 'About me',
            'facebook' => 'facebook.com',
            'youtube' => 'youtube.com'
        ]);
    }
}
