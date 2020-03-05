<?php

namespace App;

use http\Env\Response;
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

    public static function activeConnectionsCount(){
//        return self::where('isBlocked',false)->count();
        return  number_format(self::where('isBlocked',false)->count()) ;
    }

    public static function connectionsBillNotRecovered(){ // this month
        //         status 0 means not recovered, 1 means not paid, 2 means paid

        // get count of all active connections where current bill's status is 0 (Not Recovered)
        $current_bill_ids =  self::where('isBlocked',false)->get()->pluck('current_bill_id');
        return  Bill::whereIn('id',$current_bill_ids)->where('status','=',0)->get()->count();


    }
    public static function connectionsBillRecovered(){ // this month
        //         status 0 means not recovered, 1 means not paid, 2 means paid

        // get count of all active connections where current bill's status is not 0 (Not Recovered)
        $current_bill_ids =  self::where('isBlocked',false)->get()->pluck('current_bill_id');
        return  Bill::whereIn('id',$current_bill_ids)->where('status','!=',0)->get()->count();


    }
    public static function netRecovery(){ // this month
        //   status 0 means not recovered, 1 means not paid, 2 means paid

        // get sum of all active connection's current bill's amountPaid.
        $current_bill_ids =  self::where('isBlocked',false)->get()->pluck('current_bill_id');
        return  Bill::whereIn('id',$current_bill_ids)->sum('amountPaid');


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


    public function  billsHighestDuesFirst(){
        return $this->belongsTo(Bill::class,'current_bill_id','id')->orderBy('due','ASC');
    }


    public function delete()
    {

        return response("DELETE Connection");

    }


}
