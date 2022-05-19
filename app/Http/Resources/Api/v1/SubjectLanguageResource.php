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
        $subjects = SubjectType::all()->where('subject_id', '=', $this->id);
        $category = SubjectTestTypeResource::collection($subjects);
        return [
            'id' => $this->id,
            'title' => $this->name,
            'category' => $category,
        ];
    }
}
