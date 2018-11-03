<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TravelFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return new RolesPolicy;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'GET':
            case 'DELETE':
                {
                    return [];
                }
            case 'POST':
                {
                    return [
                        'activity' => 'required|string|max:190|unique:travels,activity',
                        'venue' => 'required|string|max:190',
                        'startdate' => 'required|date',
                        'enddate' => 'required|date'
                    ];
                }
            case 'PUT':
                {
                    return [
                        'activity' => 'required|string|max:190|unique:travels,activity',
                        'venue' => 'required|string|max:190',
                        'startdate' => 'required|date',
                        'enddate' => 'required|date'
                    ];
                }
            case 'PATCH':
            default:
                break;
        }
    }
}
