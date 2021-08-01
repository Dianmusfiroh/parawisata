<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class wisataCreateRequest extends FormRequest
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
            'name',
            'address',
            'deskripsi',
            'jarak',
            'pic1',
            'pic2',
            'pic3',
            'pic4'
        ];
    }
}
