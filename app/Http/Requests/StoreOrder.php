<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrder extends FormRequest
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
        $rules =  [
            'vendorId' => 'required|numeric',
            'storeId' => 'required|numeric',
            'orderId' => 'numeric'
        ];

        $count = $this->numItems;

        for ($i = 0; $i < $count; $i++)
        {
            
            $rules['itemId' . $i] = 'required_with:orderId|numeric';
            $rules['quantity' . $i] = 'required|integer|min:1';
        }

        return $rules;
    }

    public function messages()
    {
        $messages = [];

        $count = $this->numItems;

        for ($i = 0; $i < $count; $i++)
        {
            $id = $this['itemId'.$i];
            $messages['itemId' . $i . '.required_with'] = 'The item id is required.';
            $messages['itemId' . $i . '.numeric'] = 'The item id must contain only numbers.';
            $messages['quantity' . $i . '.required'] = 'The quantity of the item with id "' . $id . '" is required.';
            $messages['quantity' . $i . '.integer'] = 'The quantity of the item with id "' . $id . '" must be an integer.';
            $messages['quantity' . $i . '.min'] = 'The quantity of the item with id "' . $id . '" must be at least 1.';
        }
        
        return $messages;
    }
}
