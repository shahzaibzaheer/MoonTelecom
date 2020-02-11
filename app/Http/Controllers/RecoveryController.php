<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Recovery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RecoveryController extends Controller
{

    public function index(){

        $recentRecoveries =  Recovery::recentRecoveries();
//        return $recentRecoveries;
        return view('recoveries.index', ['recentRecoveries'=>$recentRecoveries]);
    }

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
            $recovery->connection_id = $connection_id;
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



    public function deleteConfirm(Recovery $recovery){
        // show delete recovery confirmation box
//        dd($recovery);
        return view('recoveries.delete', ['recovery'=>$recovery]);
    }


    public function delete(Request $request, Recovery $recovery){
        // ******* delete the recovery steps
        // * subtract the recovery's amount from connection's current bill's amount paid
        // * set current bill status to NOT RECOVERED
        // * if bill updated, then delete that recovery


//        dd($request->input('delete'));

        $isDeleteConfirmed = (bool) $request->input('delete');

        if($isDeleteConfirmed){

            DB::transaction(function () use ($recovery) {
                $PAID = 2;
                $NOT_PAID = 1;
                $NOT_RECOVERED = 0;


                $current_bill_id = $recovery->connection->current_bill_id;
                $current_bill = Bill::findOrFail($current_bill_id);

                $current_bill->amountPaid = $current_bill->amountPaid - $recovery->amount;
                $current_bill->status = $NOT_RECOVERED;
                $isUpdated = $current_bill->update();
                if($isUpdated){
                    // delete the recovery and redirect to all recoveries
                    $isRecoveryDeleted = $recovery->delete();

                    if(!$isRecoveryDeleted){
                        return "There's some problem while deleteing the recovery";
                    }
                }else{
                    return "There's some problem while deleteing the recovery";
                }

            });

        }


        return redirect()->route('recoveries.index');



    }

}
