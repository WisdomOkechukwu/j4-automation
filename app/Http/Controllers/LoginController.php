<?php

namespace App\Http\Controllers;

use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }
    public function login(Request $request){
        if($request->method() == 'POST'):
            return $this->authenticate($request);
        endif;

        return view('login');
    }

    public function authenticate(Request $request){

        $this->validate($request, [
            'id_number' => 'required',
            'password' => 'required',
        ]);

        if(!Auth::attempt($request->only('id_number','password'))){
            return redirect()->back()->with('error','Invalid login details');
        }

        return redirect()->intended();
        // return redirect()->route('home');
    }
}
