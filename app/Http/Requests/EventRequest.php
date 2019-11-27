<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'description' => 'required|min:10',
            'attraction_id' => 'required|exists:attractions,id',
            'reservation_id' => 'required|exists:reservations,id|unique:events,reservation_id'
        ];

        if ($this->method() === self::METHOD_PUT) {
            $rules['reservation_id'] .= ',' . $this->id;
        }

        return $rules;
    }
}
