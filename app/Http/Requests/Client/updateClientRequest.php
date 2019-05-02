<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class updateClientRequest extends FormRequest
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
            'name'      => 'required|max:255',
            'email' =>'required',
            'phone'  => 'required|regex:/(01)[0-9]{9}/',
        ];
    }
}
