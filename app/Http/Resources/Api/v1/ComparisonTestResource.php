<?php

namespace App\Http\Resources\Api\v1;

use App\Models\v1\helpers\WrongAnswer;
use Illuminate\Http\Resources\Json\JsonResource;

class ComparisonTestResource extends JsonResource
{
    static $subject_id = 0;
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $answers = ComparisonOptionAnswerResource::collection($this->option_answers)
            ->collection
            ->push((new WrongAnswer())->getWrongAnswer(self::$subject_id));
        return [
            'id' => $this->id,
            'title' => $this->title,
            'option_question' => ComparisonOptionQuestionResource::collection($this->option_question),
            'option_answers' => $answers,
        ];
    }
}
