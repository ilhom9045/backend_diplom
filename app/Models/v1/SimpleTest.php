<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SimpleTest extends Model
{
    use HasFactory;

    protected $fillable = [
        ''
    ];

    function answers()
    {
        return $this->hasMany(SimpleTestAnswer::class);
    }
}
