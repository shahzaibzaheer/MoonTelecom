<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{


    public static function defaultPackages(){
        return self::where('isCustom',false)->get();
    }
//    public static function defaultPackagesNames(){
//        return self::where('isCustom',false)->pluck('name');
//    }

    public function connections(){
        return $this->hasMany(connection::class,'package_id','id');
    }


}
