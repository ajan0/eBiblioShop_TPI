<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAddressRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'firstname' => 'required|alpha',
            'lastname' => 'required|alpha',
            'street' => 'required|alpha',
            'street_number' => 'required|integer',
            'city' => 'required|alpha',
            'postcode' => 'required|digits:4',
        ];
    }
}
