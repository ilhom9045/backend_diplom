<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComparisonTest extends Model
{
    use HasFactory;

    public function option_question()
    {
        return $this->hasMany(ComparisonOptionQuestion::class);
    }

    public function option_answers()
    {
        return $this->hasMany(ComparisonOptionAnswer::class);
    }
}
