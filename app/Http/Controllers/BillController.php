<?php

namespace App\Http\Controllers;

use App\Bill;
use Illuminate\Http\Request;

class BillController extends Controller
{

    public function showBillRecoveries(Bill $bill){
        // show recovereies of this specific bill

        $recoveries = $bill->recoveries()->with('user')->latest()->get();
//        return $recoveries;
        return view('bills.recoveries',['recoveries'=>$recoveries]);


    }
}
