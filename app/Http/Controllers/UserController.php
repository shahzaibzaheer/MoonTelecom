<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(Request $request)
    {
        $users = User::latest()->get();
        return view('users.index', [
            "users"=>$users,
        ]);

//
//        $queryParams = $request->query;
//
//        if($queryParams->count() > 0 ){   // if has query params
//            $dbQuery = User::query();
//
//            if($queryParams->has('blocked')){
//                if($queryParams->get('blocked')=== "true"){
//                    // grab all the blocked users
//                    $dbQuery = $dbQuery->where('isBlocked','=',true);
//                }elseif($queryParams->get('blocked')=== "false"){
//                    // grab all the active users
//                    $dbQuery = $dbQuery->where('isBlocked','=',false);
//                }
//            }
//            if($queryParams->has('q')){
//                $search = $queryParams->get('q');
//                $dbQuery = $dbQuery->where(function($query) use ($search){
//                    $query->where('name','like','%'.$search.'%');
//                    $query->orWhere('email','like','%'.$search.'%');
//                });
//            }
//            $users = $dbQuery->get();
//
//        }else{
//            // get all users
//        }

//        dd($users);
        // show all users

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
