<?php

namespace App\Http\Requests;

class LotRequest extends Request
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
            'title' => 'required',
            'description' => 'required',
            'start_price' => 'required|numeric',
            'step' => 'required|numeric',
            'blitz' => 'numeric'
        ];
    }
}