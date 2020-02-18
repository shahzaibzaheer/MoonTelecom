<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
    {

        $this->middleware('admin');
    }

    public function index(Request $request)
    {
        $users = User::latest()->get();

//        return $users;
        return view('users.index', [
            "users"=>$users,
        ]);

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
        // do  authorization
        $request->validate([
            'name'=> "required",
            'email'=> 'required|email',
            'role'=> 'required',
            'Password' => 'required',
        ]);


//        dd( $request->all());

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->isAdmin = $request->input('role');
        $user->password = bcrypt($request->input('Password')); 

        $isSuccess= $user->save();

        if($isSuccess){
            // model created successfully
//            return response("user created");
            session()->flash('success', 'User Created');
            return redirect()->route('users.index');
        }else{
            dd($isSuccess);
            return "Saving Fails";
        }

    }


    public function show($id)
    {
        //
    }


    public function edit(User $user)
    {
//        dd($user->name);

        $current_user_id = auth()->id();
        return view('users.edit', ['user'=>$user, 'current_user_id'=>$current_user_id]);

        // show edit user form
//        return
    }


    public function update(Request $request, User $user)
    {
        // do  authorization
        $request->validate([
            'name'=> "required",
            'email'=> 'required|email',
            'role'=> 'required',
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if($request->has('Password')){
            if( $request->input('Password') === $request->input('ConfirmPassword')){
                $user->password = bcrypt($request->input('Password'));
            }
        }

        // admin can't update his own role
        $auth_user_id = auth()->id();
        if($user->id !== $auth_user_id ){ // current authenticated admin can't update his own role  // check 1
            if($request->has('role')){ // check 2, optional
                $user->isAdmin = $request->input('role');
            }else{
                return "You can't change your role";
            }
        }

        $isUpdated = $user->update();
        if($isUpdated){
            return redirect()->route('users.index');
        }else{
            return "There some problem while updating";
        }

    }


    public function blockConfirm(User $user){
        return view('users.block', ['user'=>$user]);
    }


    public function unblock(User $user)
    {
        $user->isBlocked = false;
        $isUpdate = $user->update();
        if($isUpdate){
            return redirect()->route("users.index");
        }else{
            return "Some problem occur while updating user";
        }
    }

    public function destroy(Request $request, User $user)
    {
        // here we handle user blocking and unblocking
        // don't let current admin to block himself


        if( $request->has('block')){

                if($user->id === auth()->id()){
                    return "You can't block your self";
                }
                $user->isBlocked = (bool) $request->input('block');  // block / unblock user
                $isUpdated = $user->update();
                if($isUpdated){
                    return redirect()->route('users.index');
                }
                else{
                    return "Some problem occur while updating user";
                }

        }else{
            return redirect()->route('users.index');
        }

    }
}
