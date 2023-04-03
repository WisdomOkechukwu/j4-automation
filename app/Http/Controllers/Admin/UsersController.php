<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function allUsers(){
        return view('admin.users');
    }

    public function userProfile(){
        return view('admin.user_profile');
    }

    public function userMessage(){
        return view('admin.user_message');
    }
}
