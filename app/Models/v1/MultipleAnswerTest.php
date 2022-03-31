<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MultipleAnswerTest extends Model
{
    use HasFactory;

    function answers()
    {
        return $this->hasMany(MultipleAnswerTestAnswer::class);
    }
}
