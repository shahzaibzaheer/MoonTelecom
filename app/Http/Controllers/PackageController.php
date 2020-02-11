<?php

namespace App\Http\Controllers;

use App\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Package::defaultPackages();
//        return $packages;
        return view('packages.index', [ "packages"=>$packages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('packages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $package = new Package();
        $package->name = $request->input('name');
        $package->bandwidth = $request->input('bandwidth');
        $package->fees = $request->input('fees');
        $package->isCustom= false;      // this is default package
        $isSuccess= $package->save();
        if($isSuccess){
            // model created successfully
            return redirect()->route('packages.index');
        }else{
            dd($isSuccess);
            return "Saving Fails";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit(Package $package)
    {
        return view('packages.edit',['package'=>$package]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Package $package)
    {
        $connectionsCount =  $package->connections()->count();
        if( $connectionsCount === 0 ){

        $package->name = $request->input('name');
        $package->bandwidth = $request->input('bandwidth');
        $package->fees = $request->input('fees');
        $isUpdated = $package->update();

            if($isUpdated) {
                return redirect()->route('packages.index');
            }else{
                return "Can't update, some error occur";
            }

        }else{
            return "Can't update because ".$connectionsCount." connections using this Package";
        }



//        dd($request->all());
    }



    public function delete(Request $request, Package $package){
    // show delete form
        return view('packages.delete',['package'=>$package]);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Package $package)
    {
        if($request->input('delete') === 'yes'){
            $connectionsCount =  $package->connections()->count();
            if( $connectionsCount === 0 ){
                $isDeleteConfirmed = true;
            }else{
                return "Can't update because ".$connectionsCount." connections using this Package";
            }
        }else{
            $isDeleteConfirmed = false;
        }

        if($isDeleteConfirmed){
            try {

                $package->delete();
                return redirect()->route('packages.index');

            } catch (\Exception $e) {
                return "can't delete due to exception: ".$e->getMessage();
            }
        }else{
            return redirect()->route('packages.index');
        }
    }
}
