<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recovery extends Model
{

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function bill(){
        return $this->belongsTo(Bill::class,'bill_id');
    }
    public function connection(){
        return $this->belongsTo(Connection::class,'connection_id');
    }

    public static function recentRecoveries(){
        // select all recoveries whose bill_id is equal to connection's current bill id
        //          // this way we will select recoveries of only current month
        // from recovery access bill and from bill access connection detail

        // grab the current bill ids
        $current_bill_ids = connection::where('isBlocked',false)->pluck('current_bill_id');
        // grab all the recoveries whose bill id is equal to  current bill id   latest first

//        $recentRecoveries = Recovery::whereIn('bill_id',$current_bill_ids)->latest()->get();
        $recentRecoveries = Recovery::whereIn('bill_id',$current_bill_ids)->latest()
            ->with('user')
//            ->with('bill')
            ->with('connection')
            ->get();

        return $recentRecoveries;

    }


}
