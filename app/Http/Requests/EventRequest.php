<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EventRequest extends Request
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
            "event-name" => "required",
            "event-description" => "required",
            "event-street" => "required",
            "event-city" => "required",
            "event-state" => "required",
            "event-zip" => "required|integer|min:5",
            "daterangepicker" => "required",
        ];
    }
}
