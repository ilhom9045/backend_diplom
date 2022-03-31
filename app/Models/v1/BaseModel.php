<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

abstract class BaseModel extends Model
{
    public function getElementById($id)
    {
        return DB::select('select * from ' . $this->getTable() . ' where id = ' . $id);
    }

    public function getElementByTableName($table, $find)
    {
        $query = 'select * from ' . $this->getTable() . ' where ' . $table . ' = ' . $find;
        return DB::select($query);
    }
}
