<?php

namespace App\Http\Controllers;

use App\connection;
use App\Package;
use App\Village;
use Illuminate\Http\Request;

class ConnectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conenctions = Connection::all();
        return view('connections.index', ['connections'=>$conenctions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $packages = Package::all();
        $villages = Village::all();
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

        //TODO: set state to new    $table->string('state')->default('new'); // new, active, block
        //      set user id


        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\connection  $connection
     * @return \Illuminate\Http\Response
     */
    public function show(connection $connection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\connection  $connection
     * @return \Illuminate\Http\Response
     */
    public function edit(connection $connection)
    {
        //
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
        //
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
}
