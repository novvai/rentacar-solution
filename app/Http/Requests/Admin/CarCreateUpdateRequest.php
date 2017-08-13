<?php

namespace App\Http\Requests\Admin;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class CarCreateUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'car_brand_model_id' => 'required',
            'release_date' => 'required',
            'car_color_id' => 'required',
            'doors' => 'required|min:1',
            'car_transmission_id' => 'required',
        ];
    }
}
