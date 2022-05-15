<?php

namespace App\Http\Requests\Api\v1;

use Illuminate\Foundation\Http\FormRequest;

class SimpleTestStoreRequest extends FormRequest
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
            'simple_test' => 'present|array',
            'simple_test.*.title' => 'required|string',
            'simple_test.*.status_id' => 'required|integer',
            'simple_test.*.subject_id' => 'required|integer',
            'simple_test_answer' => 'present|array',
            'simple_test_answer.*.simple_test_id' => 'required|integer',
            'simple_test_answer.*.answer_body' => 'required|string',
            'simple_test_answer.*.is_true' => 'required|integer',
        ];
    }
}
