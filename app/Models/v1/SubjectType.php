<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectType extends Model
{
    use HasFactory;

    private $text = "";

    public function testCount($subject_id, $test_type_id)
    {
        $count = 0;
        switch ($test_type_id) {
            case 1:
                $this->text = "Simple test";
                $count = SimpleTest::all()->where('subject_id', '=', $subject_id)->count();
                break;
            case 2:
                $this->text = "Open test";
                $count = OpenTest::all()->where('subject_id', '=', $subject_id)->count();
                break;
            case 3:
                $this->text = "Multyple test";
                $count = MultipleAnswerTest::all()->where('subject_id', '=', $subject_id)->count();
                break;
            case 4:
                $this->text = "Comparison test";
                $count = ComparisonTest::all()->where('subject_id', '=', $subject_id)->count();
                break;
        }
        return $this->setTestCount($count);
    }

    private function setTestCount($count): array
    {
        $arr = [];
        if ($count > 0) {
            for ($i = 5; $i <= $count; $i += 5) {
                $arr[] = [
                    'id' => $i,
                    'title' => $this->text . " $i"
                ];
            }
        }
        return $arr;
    }
}
