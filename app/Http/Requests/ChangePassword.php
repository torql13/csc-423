<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePassword extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if((session('VendorId') == $this->vendorId) || !session('VendorId'))
            return true;
        else
            return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'oldPass' => 'required',
            'newPass' => 'required|min:5|max:40'
        ];
    }

    public function messages()
    {
        return [
            'oldPass.required' => 'The Old Password field is required.',
            'newPass.required' => 'The New Password field is required.',
            'newPass.min' => 'The new password must be at least 5 characters.',
            'newPass.max' => 'The new password may not be greater than 40 characters.',
        ];
    }
}
