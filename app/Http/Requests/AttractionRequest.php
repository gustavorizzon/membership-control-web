<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttractionRequest extends FormRequest
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
            'name' => 'required|unique:attractions,name',
            'description' => 'required|min:10',
            'attraction_type_id' => 'required|exists:attraction_types,id',
        ];

        if ($this->method() === self::METHOD_PUT) {
            $rules['name'] .= ',' . $this->id;
        }

        return $rules;
    }
}
