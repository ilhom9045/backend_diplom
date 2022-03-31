<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subjects extends BaseModel
{
    use HasFactory;

    public function category()
    {
        return $this->hasMany(TestType::class);
    }

    public function textCount()
    {
        $textCount = [];
        $j = 0;
        $all = self::all();
        for ($i = 10; $i <= count($all); $i += 10) {
            $textCount[$j] = [
                'id' => $i,
                'title' => "$i"
            ];
            $j++;
        }
        return $textCount;
    }
}
