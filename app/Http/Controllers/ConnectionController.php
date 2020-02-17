<?php

namespace App\Http\Controllers;

use App\Bill;
use App\connection;
use App\Package;
use App\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ConnectionController extends Controller
{

    /*
     * ** Connection Create
     * **
     *
     * */
    /**
     * ConnectionController constructor.
     */
    public function __construct()
    {
        $this->middleware('admin')->except('index','showBillsHistory','invoice','showRecoveries','show');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $connections = Connection::with('currentBill')->with('village')->with('package')->get();
        $villageNames = Village::pluck('name') ;
        $packageNames = Package::distinct()->pluck('name');

//        return $connections;

//        return $packageNames;
//        return $villages;
//        return $connections;
//        dd(json_encode($connections));

        return view('connections.index', [
            'connections'=>$connections,
            'villageNames'=>$villageNames,
            'packageNames'=> $packageNames
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $packages = Package::defaultPackages();
        $villages = Village::all();
//        dd($packages,$villages);
        return view('connections.create', ['packages'=>$packages, 'villages'=>$villages]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // create connection
        // generate bill for the connection and save that bill id into conenction's current_bill_id
        // show the invoice   (save recoveries into recovery table)

//        dd($request->all());

        /*************** Create connection
        ***********************************************/
        $connection = new Connection();

        // contact info
        $connection->username  = $request->input('username');
        $connection->name  = $request->input('name');
        $connection->fathername  = $request->input('fathername');
        $connection->phone  = $request->input('phone');
        $connection->email  = $request->input('email');
        $connection->cnic  = $request->input('cnic');
        $connection->user_id = Auth::id();

        // address info
        $connection->village_id  = $request->input('village_id');
        $connection->installationAddress  = $request->input('installationAddress');
        $billingAddressCheckbox = $request->input('billingAddressCheckbox',false);
        if($billingAddressCheckbox != true){  // if billing address is not same, set billing address also
            $connection->billingAddress = $request->input('billingAddress');
        }

        // package info
        $hasPackageId = $request->has('package_id');
        if($hasPackageId){
            $connection->package_id = $request->input('package_id');
        }else{
            // create custom package and assign with our connection
//            $connection->package()->create([]);
            $custom_package_id = DB::table('packages')->insertGetId([
                'name' => "CUSTOM",
                'bandwidth' => $request->input('bandwidth'),
                'fees' => $request->input('monthPrice'),
                'isCustom' => true
            ]);
            $connection->package_id = $custom_package_id;
        }

        $isConnectionCreated = $connection->save();












        /*************** Generate bill for connection
         ***********************************************/
        if($isConnectionCreated){
            // generate bill for the connection from inatallation fess
            // also save bill id to connection current_bill_id

            $installationFess  =  $request->input('installationFees');

            $bill_id =  DB::table('bills')->insertGetId([
                'billingMonth'=> now(),
                'connection_id' => $connection->id,
                'bandwidth'=> $connection->package->bandwidth,
                'due'=>0,
                'billAmount'=> $installationFess,
            ]);



            $connection->current_bill_id = $bill_id;
            $isConnectionUpdated = $connection->save();

            /*************** Redirect to invoice
             ***********************************************/
            if($isConnectionUpdated){
                return redirect()->route('connections.invoice',$connection->id);
            }
        }


        return response("Error occur while creating new connection");

    }



    public function showBillsHistory(connection $connection){
        // bill & invoice is the same thing

        $bills = $connection->bills()->latest()->get();
//        return $bills;
        return view('connections.bills',['bills'=>$bills]);
    }



    public function invoice(connection $connection){
//        dd($connection);
        $bill = $connection->currentBill;
        return view('connections.invoice',[
            'connection'=>$connection,
            'bill'=>$bill
        ]);
    }

    public function showRecoveries(connection $connection){

        return $connection;
        return view('connections.recoveries');
    }





    /**
     * Display the specified resource.
     *
     * @param  \App\connection  $connection
     * @return \Illuminate\Http\Response
     */
    public function show(connection $connection)
    {
        return view('connections.detail',['connection'=>$connection]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\connection  $connection
     * @return \Illuminate\Http\Response
     */
    public function edit(connection $connection)
    {

        $packages = Package::defaultPackages();
        $villages = Village::all();
        return view('connections.edit', ['connection'=>$connection,'packages'=>$packages, 'villages'=>$villages]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\connection  $connection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, connection $connection)
    {
//        dd($connection);
//          dd($request);


            $connection->username = $request->input('username');
            $connection->name = $request->input('name');
            $connection->fathername = $request->input('fathername');
            $connection->phone = $request->input('phone');
            $connection->email = $request->input('email');
            $connection->cnic = $request->input('cnic');
            $connection->cnic = $request->input('cnic');
            $connection->village_id = $request->input('village_id');
            $connection->installationAddress = $request->input('installationAddress');
            if($request->has('billingAddress')){
                $connection->billingAddress = $request->input('billingAddress');
            }


            $isChangePackageBoxChecked = $request->has('changePackageCheckbox');

            if($isChangePackageBoxChecked){
                // change the package or create custom
                // note:  only change package when data changes otherwise not

                { // if package data changed, previous data is not matched with new

                    $hasPackageId = $request->has('package_id');

                    if($hasPackageId){  // if has package id, then change use that id
                        $connection->package_id = $request->input('package_id');
                    }
                    else
                    { // grab the bandwidth and monthly fees and create new custom package
                        // create custom package and assign with our connection

                        // only create new custom package if package data is changed.
                        if(
                            $connection->package->bandwidth !== $request->input('bandwidth') ||
                            $connection->package->fees !== $request->input('monthPrice')
                        ){

                            $custom_package_id = DB::table('packages')->insertGetId([
                                'name' => "CUSTOM",
                                'bandwidth' => $request->input('bandwidth'),
                                'fees' => $request->input('monthPrice'),
                                'isCustom' => true
                            ]);
                            $connection->package_id = $custom_package_id;
                        }


                    }


                }

            }



            $isUpdated = $connection->update();
            if($isUpdated){
                return redirect()->route('connections.show',$connection->id);
            }else{
                return "Some error happen while updating";
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\connection  $connection
     * @return \Illuminate\Http\Response
     */
    public function destroy(connection $connection)
    {
        //
    }






    public function generateBills(){

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

//        return now()->monthName;
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



        return "Bill generated :-)";



    }




    public function blockConfirm(Connection $connection){
        return view('connections.block', ['connection'=>$connection]);
    }

    public function block(Request $request, Connection $connection){
        // here we handle user blocking and unblocking
//        dd($request->all());

        if( $request->has('block')){

            $connection->isBlocked = (bool) $request->input('block');  // block / unblock user
            $isUpdated = $connection->update();
            if($isUpdated){
                return redirect()->route('connections.show', $connection->id);
            }
            else{
                return "Some problem occur while updating user";
            }

        }else{
            return redirect()->route('connections.show', $connection->id);
        }


    }




}
