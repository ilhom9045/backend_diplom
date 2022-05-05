<?php

namespace App\Http\Resources\Api\v1;

use App\Models\v1\TestType;
use Illuminate\Http\Resources\Json\JsonResource;

class SubjectTestTypeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $type_id = $this->test_type_id;
        $name = TestType::findOrFail($type_id);

        return [
            'id' => $this->test_type_id,
            'name' => $name->type_name,
            'text_count' => $this->testCount($this->subject_id, $type_id)
        ];
    }
}
