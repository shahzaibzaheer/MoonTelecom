<?php

namespace App\Http\Controllers;

use App\Village;
use Illuminate\Http\Request;

class VillageController extends Controller
{
    public function index()
    {
        $villages = Village::latest()->withCount('connections')->get();
        return view('villages.index', [ "villages"=>$villages]);
    }

   
    public function create()
    {
        //show form to create village
        return view('villages.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $village = new Village();
        $village->name = $request->input('name');
        $isSuccess= $village->save();
        if($isSuccess){
            // model created successfully
            return redirect()->route('villages.index');
        }else{
            dd($isSuccess);
            return "Saving Fails";
        }


    }

    
    public function show(Village $village)
    {
        //
    }

   
    public function edit(Village $village)
    {
        return view('villages.edit', ['village'=> $village]);
    }

   
    public function update(Request $request, Village $village)
    {
        $village->name = $request->input('name');
        $isSuccess= $village->save();
        if($isSuccess){
            // model created successfully
            return redirect()->route('villages.index');
        }else{
            dd($isSuccess);
            return "Updating Fails";
        }
    }

    public function delete(Village $village){
        // show delete form
        return view('villages.delete',['village'=>$village]);
    }

   
    public function destroy(Request $request, Village $village)
    {


        if($request->input('delete') === 'yes'){

            $connectionsCount =  $village->connections()->count();
            if( $connectionsCount === 0 ){
                $isDeleteConfirmed = true;
            }else{
                return "Can't delete because ".$connectionsCount." connections is in this Village";
            }
        }else{
            $isDeleteConfirmed = false;
        }

        if($isDeleteConfirmed){
            try {

                $village->delete();
                return redirect()->route('villages.index');

            } catch (\Exception $e) {
                return "can't delete due to exception: ".$e->getMessage();
            }
        }else{
            return redirect()->route('villages.index');
        }

    }
}
