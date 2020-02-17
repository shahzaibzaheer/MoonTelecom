<?php

namespace App\Http\Controllers;

use App\connection;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {



        $activeConnections =  connection::activeConnectionsCount();
        $connectionsBillNotRecovered = connection::connectionsBillNotRecovered();
        $connectionsBillRecovered = connection::connectionsBillRecovered();
        $netRecovery = connection::netRecovery();  // this month

        return view('dashboard',[
            'activeConnections' => $activeConnections,
            'connectionsBillNotRecovered' => $connectionsBillNotRecovered,
            'connectionsBillRecovered' => $connectionsBillRecovered,
            'netRecovery' => $netRecovery,
        ]);
    }

    public function blocked(){

        if(!auth()->user()->isBlocked){
            return redirect()->route('home');
        }
        return view('blocked');
    }

}
