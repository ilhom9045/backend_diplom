<?php

namespace App\Http\Resources\Api\v1;

use App\Models\v1\Subjects;
use App\Models\v1\SubjectType;
use Illuminate\Http\Resources\Json\JsonResource;

class SubjectLanguageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $subjectId = $this->subject_id;
        $title = (Subjects::findOrFail($subjectId))->name;
        $subjects = SubjectType::all()->where('subject_id', '=', $subjectId);
        $category = SubjectTestTypeResource::collection($subjects);
        return [
            'id' => $this->subject_id,
            'title' => $title,
            'category' => $category,
        ];
    }
}
