<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Recovery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecoveryController extends Controller
{
    public function store(Request $request){
//        dd($request->all());

        /*
         * update the bill
         * jf bill successfully update, then save recovery into recoveries table
         * */

        $PAID = 2;
        $NOT_PAID = 1;
        $NOT_RECOVERED = 0;

        $bill_id = $request->input('bill_id');
        $user_id = Auth::id();
        $amount = $request->input('amount');
        $comments = $request->input('comment');
        $connection_id = $request->input('connection_id');

        $bill = Bill::findOrFail($bill_id);
        $bill->amountPaid = $bill->amountPaid + $amount;
        // status 0 = not recovered,  1 = not paid (0 amount), 2 = paid
        if($amount > 0){
            $bill->status = $PAID;
        }elseif($amount == 0) {
            $bill->status = $NOT_PAID;
        }else{
            // if amount is less then 0


        }

        $isBillUpdated = $bill->save();

        if($isBillUpdated){
            // save the recovery
            $recovery = new Recovery();
            $recovery->bill_id = $bill_id;
            $recovery->user_id = $user_id;
            $recovery->amount = $amount;
            $recovery->comments = $comments;
            $isSaved = $recovery->save();
            if($isSaved){
                return redirect()->route('connections.invoice',$connection_id);
            }else{
                return response("Error occur while saving the recovery");
            }
        }else{

            $bill->status = $NOT_RECOVERED;
            $bill->amountPaid = 0;
            $bill->save();

        }
    }
}
