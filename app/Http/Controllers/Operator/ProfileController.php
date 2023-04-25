<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        $role = Role::whereNot('id', $user->role_id)->get();
        //rework on this view
        return view('user', compact(['user', 'role']));
    }

    public function update(Request $request)
    {
        if($request->password === NULL){
            $this->validate($request,[
                'firstName'=> 'required',
                'lastName'=> 'required',
                'id_number'=>'required',
            ]);
        } else {
            $this->validate($request,[
                'firstName'=> 'required',
                'lastName'=> 'required',
                'id_number'=>'required',
                'password'=>['required','confirmed',Password::min(8)]
            ]);
        }

        $user = User::find($request->user_id);
        $user->first_name = $request->firstName;
        $user->last_name = $request->lastName;
        $user->gender = $request->gender;
        $user->address = $request->address; 
        $user->marital_status = $request->marital_status;
        if($request->password !== NULL){
            $user->password = Hash::make($request->password);
        }

        $user->save();
        return back()->with('success', 'Profile Updated');
    }
}
