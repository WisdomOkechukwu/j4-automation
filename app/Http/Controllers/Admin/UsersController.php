<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function allUsers()
    {
        $users = User::with('role')
            ->whereNot('id', Auth::user()->id)
            ->get();

        $admins = $users->where('role_id', 999);
        $operators = $users->where('role_id', 889);
        $fieldAdmin = $users->where('role_id', 779);
        $fieldWorker = $users->where('role_id', 777);

        return view('admin.users', compact(['operators', 'fieldAdmin', 'fieldWorker', 'users', 'admins']));
    }
}
