<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlaceRequest extends FormRequest
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
            'name' => 'required|unique:places,name',
            'description' => 'required|min:10',
            'capacity' => 'required|numeric',
            'latitude' => 'required',
            'longitude' => 'required',
            'place_type_id' => 'required|exists:place_types,id'
        ];

        if ($this->method() === self::METHOD_PUT) {
            $rules['name'] .= ',' . $this->id;
        }

        return $rules;
    }
}
