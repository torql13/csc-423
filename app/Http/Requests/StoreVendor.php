<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVendor extends FormRequest
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
            'vendorCode' => 'required_without:vendorId|unique:vendor,VendorCode,' . $this->vendorId . ',VendorId|numeric|digits_between:1,10',
            'vendorName' => 'required|regex:/^[A-Za-z0-9\',\s\.\-\(\)\?]+$/',
            'vendorAddress' => 'required|regex:/^\d+[A-Za-z\s]+$/',
            'vendorCity' => 'required|regex:/^[A-Za-z]+([\s\-]?[A-Za-z]+)*$/',
            'vendorState' => 'required|alpha|size:2',
            'vendorZip' => 'required|numeric|digits:5',
            'vendorPhone' => 'required|regex:/^\d{3}\-\d{3}\-\d{4}$/',
            'contactPerson' => 'required|regex:/^[A-Za-z]([\s\-]?[A-Za-z])*$/',
            'password' => 'required|min:5|max:40'
        ];
    }

    public function messages()
    {
        return[
            'vendorCode.required_without' => 'The vendor code is required.',
            'vendorName.regex' => 'The vendor name must contain only letters, numbers, apostrophes, periods, hyphens, parentheses, and question marks.',
            'vendorAddress.regex' => 'The vendor address must be in a valid address format.',
            'vendorCity.regex' => 'The vendor city must contain only letters, spaces, and hyphens.',
            'vendorPhone.regex' => 'The vendor phone must be in the format XXX-XXX-XXXX, containing only numbers and hyphens.',
            'contactPerson.regex' => 'The vendor contact must contain only letters, hyphens, and spaces.'
        ];
    }
}
