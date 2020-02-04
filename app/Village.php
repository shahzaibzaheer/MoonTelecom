<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Village extends Model
{


    public function connections(){
        return $this->hasMany(connection::class,'village_id','id');
    }
}
