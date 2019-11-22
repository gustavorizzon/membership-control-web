<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'email' => 'email|required|unique:users',
            'locale' => 'required|min:2|max:5',
            'password' => 'confirmed|min:8',
            'password_confirmation' => 'required_with:password'
        ];

        // Ignore unique constraints for current record on update
        if ($this->method() === 'PUT') {
            $rules['email'] .= ',email,' . $this->id;
            $rules['password'] .= '|nullable';
        } else {
            $rules['password'] .= '|required';
        }

        return $rules;
    }
}
