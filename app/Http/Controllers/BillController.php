<?php

namespace App\Http\Controllers;

use App\Bill;
use App\connection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BillController extends Controller
{

    public function showBillRecoveries(Bill $bill){
        // show recovereies of this specific bill

        $recoveries = $bill->recoveries()->with('user')->latest()->get();
//        return $recoveries;
        return view('bills.recoveries',['recoveries'=>$recoveries]);

    }


    public function generateBills(){
        // show confirmation box to confirm bill generation

        $last_bill_timestamp = Bill::latest()->first()->billingMonth;


//        session()->flash("success", "Testing");


        return view('bills.generate', [
            'last_bill_timestamp' => $last_bill_timestamp,
            ]
        );
    }

    public function generate(Request $request){
        // generate bill here
//        dd("Generate bills");


        $request->validate([
            'confirm'=> ['required','regex:(confirm)'],
        ]);





        /* ********** Generation bills
         *
         * goto each connection's current bill
         * grab remaining amount    Remaining amount = (due + bill amount ) - amount paid
         * create new bill
         *      add remaining amount in Due column
         *      calculate current bill and add into month bill column
         *      add other details
         * save new bill id to connection's current bill
         * go to next connection and do same
         * */

        $connections = Connection::with('currentBill')->where('isBlocked',false)->get();

        DB::transaction(function () use ($connections){

            foreach ($connections as $connection){
                $due = $connection->currentBill->due;
                $prevMonthBill = $connection->currentBill->billAmount;
                $amountPaid = $connection->currentBill->amountPaid;
                $remaining = ($due + $prevMonthBill) - $amountPaid;


                $bill = new Bill();
                $bill->due = $remaining;

                // generate current month bill
                $bill->billingMonth = now();  // because i'm sure this code will run once a month
                $bill->connection_id = $connection->id;
                $bill->bandwidth = $connection->package->bandwidth;
                $bill->billAmount = $connection->package->fees;
                $isNewBillCreated = $bill->save();
                if($isNewBillCreated){
                    // save new bill id to connection's current bill id
                    // point this new bill to connection's current bill
                    $connection->current_bill_id = $bill->id;
                    $connection->save();

                }

            }
        });

        session()->flash('success', 'Bill Generate :-)');
//        session()->set('success','Bill Generated :-)');
        return redirect()->back();
    }
}
