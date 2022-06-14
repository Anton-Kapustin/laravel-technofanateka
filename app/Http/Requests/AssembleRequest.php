<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssembleRequest extends FormRequest
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
            // 'preview_image' => 'required|string|min:2', 
            'type' => 'required|string|min:1',
            'price' => 'required|integer|min:1',
            'cpu' => 'required|string|min:1',
            'motherboard' => 'required|string|min:1',
            'video_card' => 'required|string|min:1',
            'ram' => 'required|string|min:1',
            'ssd' => 'required|string|min:1',
            'power_supply' => 'required|string|min:1',
            'cooller' => 'required|string|min:1',
            'pc_case' => 'required|string|min:1',
            'hdd' => 'required|string|min:1',
        ];
    }
}
