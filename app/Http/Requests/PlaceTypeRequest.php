<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlaceTypeRequest extends FormRequest
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
            'name' => 'required|unique:place_types,name',
            'description' => 'required|min:10',
        ];

        if ($this->method() === self::METHOD_PUT) {
            $rules['name'] .= ',' . $this->id;
        }

        return $rules;
    }
}
