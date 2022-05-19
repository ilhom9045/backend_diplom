<?php

namespace App\Http\Requests\Api\v1;

use Illuminate\Foundation\Http\FormRequest;

class SubjectsControllerStore extends FormRequest
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
            'language' => 'present|array',
            'language.*.id' => 'required|integer',
            'language.*.language_name' => 'required|string',
            'test_types' => 'present|array',
            'test_types.*.id' => 'required|integer',
            'test_types.*.type_name' => 'required|string',
            'subjects' => 'present|array',
            'subjects.*.name' => 'required|string',
            'subjects.*.language_id' => 'required|integer',
            'subjects.*.test_types_id' => 'required|integer',
        ];
    }
}
