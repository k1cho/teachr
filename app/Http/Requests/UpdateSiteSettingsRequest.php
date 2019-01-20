<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Setting;

class UpdateSiteSettingsRequest extends FormRequest
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
            'site_name' => 'required|max:30',
            'address' => 'required',
            'contact_number' => 'required',
            'contact_email' => 'required|email'
        ];
    }

    public function updateSiteSettings() {
        Setting::first()->update([
                'site_name' => $this->site_name,
                'address' => $this->address,
                'contact_number' => $this->contact_number,
                'contact_email' => $this->contact_email
            ]);
    }
}
