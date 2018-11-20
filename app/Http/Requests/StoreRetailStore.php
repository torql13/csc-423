<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRetailStore extends FormRequest
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
            'storeCode' => 'required_without:storeId|numeric|digits_between:1,10',
            'storeName' => 'required|regex:/^[A-Za-z0-9\',\s\.\-\(\)\?]+$/',
            'storeAddress' => 'required|regex:/^\d+[A-Za-z\s]+$/',
            'storeCity' => 'required|regex:/^[A-Za-z]+([\s\-]?[A-Za-z]+)*$/',
            'storeState' => 'required|alpha|size:2',
            'storeZip' => 'required|numeric|digits:5',
            'storePhone' => 'required|regex:/^\d{3}\-\d{3}\-\d{4}$/',
            'manager' => 'required|regex:/^[A-Za-z]([\s\-]?[A-Za-z])*$/'
        ];
    }

    public function messages()
    {
        return [
            'storeCode.required_without' => 'The store code is required.',
            'storeName.regex' => 'The store name must contain only letters, numbers, apostrophes, periods, hyphens, parentheses, and question marks.',
            'storeAddress.regex' => 'The store address must be in a valid address format.',
            'storeCity.regex' => 'The store city must contain only letters, spaces, and hyphens.',
            'storePhone.regex' => 'The store phone must be in the format XXX-XXX-XXXX, containing only numbers and hyphens.',
            'manager.regex' => 'The store manager must contain only letters, hyphens, and spaces.'
        ];
    }
}
