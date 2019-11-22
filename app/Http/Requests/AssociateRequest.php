<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssociateRequest extends FormRequest
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
        $rules = [
            'name' => 'required|min:5',
            'email' => 'email|nullable|unique:associates',
            'phone_number' => 'required|min:10',
            'birth_date' => 'required|date|before:now',

            'address' => 'required|min:10',
            'city' => 'required|min:3',
            'state' => 'required|min:5',
            'country' => 'required|min:5',
            
            'drivers_license' => 'numeric|nullable|unique:associates',
            'social_security_number' => 'required|unique:associates',
        ];

        // Ignore unique constraints for current record on update
        if ($this->method() === 'PUT') {
            $rules['email'] .= ',email,' . $this->id;
            $rules['drivers_license'] .= ',drivers_license,' . $this->id;
            $rules['social_security_number'] .= ',social_security_number,' . $this->id;
        }

        return $rules;
    }
}
