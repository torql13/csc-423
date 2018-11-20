<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomer extends FormRequest
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
            'name' => 'required|regex:/^[A-Za-z]([\s\-]?[A-Za-z])*$/',
            'address' => 'required|regex:/^\d+[A-Za-z\s]+$/',
            'city' => 'required|regex:/^[A-Za-z]+([\s\-]?[A-Za-z]+)*$/',
            'state' => 'required|alpha|size:2',
            'zip' => 'required|numeric|digits:5',
            'phone' => 'required|regex:/^\d{3}\-\d{3}\-\d{4}$/',
            'email' => 'required|email'
        ];
    }

    public function messages()
    {
        return [
            'name.regex' => 'The customer name must contain only letters, hyphens, and spaces.',
            'address.regex' => 'The customer address must be in a valid address format.',
            'city.regex' => 'The customer city must contain only letters, spaces, and hyphens.',
            'phone.regex' => 'The customer phone must be in the format XXX-XXX-XXXX, containing only numbers and hyphens.',
        ];
    }
}
