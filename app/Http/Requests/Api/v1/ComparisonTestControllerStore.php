<?php

namespace App\Http\Requests\Api\v1;

use Illuminate\Foundation\Http\FormRequest;

class ComparisonTestControllerStore extends FormRequest
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
            'comparison_test' => 'present|array',
            'comparison_test.*.title' => 'required|string',
            'comparison_test.*.status_id' => 'required|integer',
            'comparison_test.*.subject_id' => 'required|integer',
            'comparison_test_answer' => 'present|array',
            'comparison_test_answer.*.comparison_test_id' => 'required|integer',
            'comparison_test_answer.*.answer_body' => 'required|string',
            'comparison_test_answer.*.is_true' => 'required|integer',
            'comparison_test_query.*.comparison_test_id' => 'required|integer',
            'comparison_test_query.*.question_body' => 'required|string',
            'comparison_test_query.*.comparison_option_answer_id' => 'required|integer',
        ];
    }
}
