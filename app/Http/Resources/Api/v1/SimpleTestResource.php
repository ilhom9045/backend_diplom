<?php

namespace App\Http\Resources\Api\v1;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\v1\helpers\WrongAnswer;

class SimpleTestResource extends JsonResource
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
        $answers = SimpleTestAnswerResource::collection($this->answers)->collection->push((new WrongAnswer())->getWrongAnswer(self::$subject_id));
        return [
            'id' => $this->id,
            'title' => $this->title,
            'answers' => $answers
        ];
    }
}
