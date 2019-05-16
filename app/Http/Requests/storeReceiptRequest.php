<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeReceiptRequest extends FormRequest
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
            'client_id'      => 'required',
            'medicine_id' =>'required',
            'form_of_use'  => 'required',
            'quantity' => 'required',
            'period' => 'required',
            'collaborator_id' => 'required'
        ];
    }
}
