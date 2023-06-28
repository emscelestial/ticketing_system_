<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.user.index' , compact('users'));
    }

    public function create()
    {
        return view ('admin.user.index');
    }

    public function edit($users)
    {
        $user = User::find($users);
        return view('admin.user.edit' , compact('user'));
    }


    public function update(Request $request , $user_id)
    {
        $user = User::find($user_id);
        if($user)
        {

            $user->role_as = $request->role_as;
            $user->update();
            return redirect('admin/users')->with('message','Updated Successfully ');
        }
        return redirect('admin/users')->with('message','User not Found');
    }

}

