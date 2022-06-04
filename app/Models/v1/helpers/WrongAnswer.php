<?php

namespace App\Models\v1\helpers;


use App\Models\v1\Subjects;

class WrongAnswer
{
    function getWrongAnswer($subject_id)
    {
        $arr = [];
        $arr['id'] = -1;
        $wrongAnswer = Subjects::query()->where('id', $subject_id)->first();
        switch ($wrongAnswer->language_id) {
            case 1:
                $arr["answer_body"] = "Хато";
                break;
            case 2:
                $arr["answer_body"] = "Неправилный";
                break;
            case 3:
                $arr["answer_body"] = "Incorrect answer";
                break;
        }
        return $arr;
    }
}
