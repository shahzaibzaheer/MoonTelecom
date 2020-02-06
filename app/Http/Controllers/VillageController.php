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
        //
    }

   
    public function update(Request $request, Village $village)
    {
        //
    }

   
    public function destroy(Village $village)
    {
        //
    }
}
