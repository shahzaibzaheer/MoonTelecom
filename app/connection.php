<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class connection extends Model
{





    public function billingAddress(){
        if($this->billingAddress == null){
            return $this->installationAddress;
        }else{
            return $this->billingAddress;
        }
    }


    public function currentBill(){
        return $this->belongsTo(Bill::class,'current_bill_id','id');
    }


    public function package()
    {
        return $this->belongsTo(Package::class);
    }
    public function village()
    {
        return $this->belongsTo(Village::class);
    }
    public function bills()
    {
        return $this->hasMany(Bill::class);
    }
}
