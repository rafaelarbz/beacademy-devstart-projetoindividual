<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProductFormRequest extends FormRequest
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
        $id = $this->id ?? '';

        $rules = [
            'name' => [
                'required',
                'string',
                'max:100',
                'min:3'
            ],
            'category' => [
                'required',
                'string',
                'max:50',
                'min:3'
            ],
            'image' => [
                'required',
                'file'
            ],
            'brand' => [
                'required',
                'string',
                'max:50',
                'min:3'
            ],
            'cost' => [
                'required',
            ],
            'price' => [
                'required',
            ],
            'quantity' => [
                'required',
                'integer'
            ],
            'description' => [
                'required',
                'string',
                'max:255',
                'min:3'
            ],
            
        ];

        // if($this->method('PUT')) {
        //     $rules['password'] = [
        //         'nullable',
        //         'min:4',
        //         'max:12'
        //     ];
        // }

        return $rules;
    }
}
