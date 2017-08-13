<?php

namespace App\Http\Requests\Admin;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class BrandModelCreateUpdateRequest extends FormRequest
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
            'title' => 'required|min:2|max:191',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'Model name field is required',
            'title.min'      => 'Model name field must be atleas :min characters',
            'title.max'      => 'Model name field should not exceed :max characters',
        ];
    }
}
