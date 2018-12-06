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
            'description' => 'required|regex:/^[A-Za-z0-9\s\.]+$/|max:150',
            'size' => 'required|regex:/^[A-Za-z0-9\s\.]+$/|max:20',
            'department' => 'required|regex:/^[A-Za-z\&\-\_\s]+$/|max:30',
            'cost' => 'required|regex:/^\$?\d{1,3}(,\d{3})*(\.\d{2})?$/|max:15',
            'retail' => 'required|regex:/^\$?\d{1,3}(,\d{3})*(\.\d{2})?$/|max:15',
            'vendorId' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'description.regex' => 'The description must contain only letters, numbers, periods, and spaces.',
            'size.regex' => 'The size must contain only letters, numbers, periods, and spaces.',
            'department.regex' => 'The department must contain only letters, numbers, ampersands, and hyphens.',
            'cost.regex' => 'The cost must be a valid monetary value (thousands seperators are required).',
            'retail.regex' => 'The retail must be a valid monetary value (thousands seperators are required).'
        ];
    }
}
