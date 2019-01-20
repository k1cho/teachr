<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'about' => 'required',
            // 'facebook' => 'url',
            // 'youtube' => 'url'
        ];
    }

    public function updateProfile() {
        $user = auth()->user();

        if($this->hasFile('avatar')) {
            $user->profile->avatar = $this->uploadImage()->fileName;
            $user->profile->save();
        }

        $user->name = $this->name;
        $user->email = $this->email;
        $user->profile->facebook = $this->facebook;
        $user->profile->youtube = $this->youtube;
        $user->profile->about = $this->about;
        
        $user->save();
        $user->profile->save();

        if($this->has('password')) {
            $user->password = bcrypt($this->password);
            $user->save();
        }
    }

    public function uploadImage()
    {
        $uploadedImage = $this->file('avatar');
        $this->fileName = rand(100,200) . '-'. str_slug($this->avatar) . '.' . $uploadedImage->getClientOriginalExtension();
        $uploadedImage->storePubliclyAs('public/avatars/', $this->fileName);

        return $this;
    }
}
