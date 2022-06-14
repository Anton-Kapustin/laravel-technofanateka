<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SsdRequest extends FormRequest
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
            'memory_type' => 'required|string|min:2',
            'size' => 'required|string|min:2',
        ];
    }
}
