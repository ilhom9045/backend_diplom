<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectLanguage extends Model
{
    use HasFactory;

    public function subjects()
    {
        return $this->belongsTo(Subjects::class);
    }
}
