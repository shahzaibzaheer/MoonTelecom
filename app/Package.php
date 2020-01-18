<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{


    public static function defaultPackages(){
        return self::where('isCustom',false)->get();
    }



}
