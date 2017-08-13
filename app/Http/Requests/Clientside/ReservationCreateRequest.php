<?php

namespace App\Http\Requests\Clientside;

use Illuminate\Foundation\Http\FormRequest;

class ReservationCreateRequest extends FormRequest
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
            'car_id'       => 'required',
            'first_name'   => 'required',
            'last_name'    => 'required',
            'phone'        => 'required',
            'email'        => 'required',
            'reserve_from' => 'required',
            'reserve_to'   => 'required',
            'work_days'    => 'required',
            'fee'          => 'required',
        ];
    }
}
