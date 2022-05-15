<?php

namespace App\Http\Requests\Api\v1;

use Illuminate\Foundation\Http\FormRequest;

class MultiAnswerTestControllerStore extends FormRequest
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
            'multiply_test' => 'present|array',
            'multiply_test.*.title' => 'required|string',
            'multiply_test.*.status_id' => 'required|integer',
            'multiply_test.*.subject_id' => 'required|integer',
            'multiply_test_answer' => 'present|array',
            'multiply_test_answer.*.multiple_answer_test_id' => 'required|integer',
            'multiply_test_answer.*.answer_body' => 'required|string',
            'multiply_test_answer.*.is_true' => 'required|integer',
        ];
    }
}
