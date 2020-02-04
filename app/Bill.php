<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{


    public function connection(){
        return $this->hasOne(connection::class,'id');
    }

    public function recoveries(){
        return $this->hasMany(Recovery::class,'bill_id','id');
    }

    public function getBillingMonth(){
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->billingMonth)->monthName;
    }

    public function connections(){
        return $this->belongsTo(connection::class);
    }
}
