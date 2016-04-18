<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Aaulyp\Tools\DateHelper;

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

    protected function getValidatorInstance()
    {
        $dateHelper = new DateHelper();
        $data = $this->all();
        $data['name'] = $data['event-name'];
        $data['slug'] = str_slug($data['event-name']);
        $data['description'] = strip_tags($data['event-description'], '<br>');
        $data['description_plain'] = strip_tags($data['event-description'], '<br>');
        $data['street'] = $data['event-street'];
        $data['city'] = $data['event-city'];
        $data['state'] = $data['event-state'];
        $data['zip'] = $data['event-zip'];
        $data['date_start'] = $dateHelper->getStartTimeFromRange($data['daterangepicker']);

        if ($data['daterangepicker']) {
            $data['date_end'] = $dateHelper->getEndTimeFromRange($data['daterangepicker']);
        } else {
            $data['date_end'] = $data['daterangepicker'];
        }
        $this->getInputSource()->replace($data);

        /*modify data before send to validator*/

        return parent::getValidatorInstance();
    }
}
