<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItem extends FormRequest
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
            'description' => 'required|alpha_num|max:150',
            'size' => 'required|alpha_num|max:20',
            'division' => 'required|regex:/^[A-Za-z\&\-\_\s]+$/|max:30',
            'department' => 'required|regex:/^[A-Za-z\&\-\_\s]+$/|max:30',
            'category' => 'required|regex:/^[A-Za-z\&\-\_\s]+$/|max:30',
            'cost' => 'required|regex:/^\d+(\.\d{2})?$/|max:15',
            'retail' => 'required|regex:/^\d+(\.\d{2})?$/|max:15',
            'imgFileName' => 'nullable|image',
            'vendorId' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'division.regex' => 'The division must contain only letters, numbers, ampersands, and hyphens.',
            'department.regex' => 'The department must contain only letters, numbers, ampersands, and hyphens.',
            'category.regex' => 'The division must contain only letters, numbers, ampersands, and hyphens.',
            'cost.regex' => 'The cost must be a valid monetary value.',
            'retail.regex' => 'The retail must be a valid monetary value.'
        ];
    }
}
