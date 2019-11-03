<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExpensesRequest extends FormRequest
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
            'description' => 'required',
            'cost' => 'required|numeric|gte:0',
        ];
    }

    public function messages()
    {
        return [
            'description.required' => 'You must enter description',
            'cost.required' => 'Cost must not be empty',
            'cost.numeric'=>'You must enter a number',
            'cost.gte'=>'Cost must be greater than 0'
        ];
    }
}
