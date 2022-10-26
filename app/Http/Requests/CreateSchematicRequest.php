<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSchematicRequest extends FormRequest
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
            'schematic' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'schematic.required' =>'شماتیک حتما باید وارد شود :)',
            'schematic.string'=>'شماتیک باید به صورت متن باشد'
        ];
    }
}
