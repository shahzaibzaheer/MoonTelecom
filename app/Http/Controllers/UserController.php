<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('users.index', [ "users"=>$users]);
    }

    public function create()
    {
        // show form to create user
        return view('users.create');
    }

    public function store(Request $request)
    {
        // do  authentication
//        dd( $request->all());

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->isAdmin = $request->input('role');
        $user->password = bcrypt($request->input('Password')); 

        $isSuccess= $user->save();
        if($isSuccess){
            // model created successfully
            return redirect()->route('user.index');
        }else{
            dd($isSuccess);
            return "Saving Fails";
        }

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
