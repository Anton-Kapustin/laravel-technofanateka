<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CpuRequest extends FormRequest
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
            'model' => 'required|string|min:2', 
            'family' => 'required|string|min:2', 
            'frequency' => 'required|integer',
            'socket' => 'required|string|min:2', 
        ];
    }
}
