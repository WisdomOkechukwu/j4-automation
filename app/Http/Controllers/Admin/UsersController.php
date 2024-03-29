<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\UsersImport;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class UsersController extends Controller
{
    public function allUsers()
    {
        try {
            $users = User::with('role')
                ->whereNot('id', Auth::user()->id)
                ->orderBy('updated_at', 'DESC')
                ->get();

            $admins = $users->where('role_id', 999);
            $operators = $users->where('role_id', 889);
            $fieldAdmin = $users->where('role_id', 779);
            $fieldWorker = $users->where('role_id', 777);

            $roles = Role::all();

            return view('admin.users', compact(['operators', 'fieldAdmin', 'fieldWorker', 'users', 'admins', 'roles']));
        } catch (\Exception $exception) {
            Log::alert('Users Error ' . $exception->getMessage());
        }
    }

    public function addUser(Request $request)
    {
        try {
            $this->validate($request, [
                'firstName' => 'required',
                'lastName' => 'required',
                'role' => 'required',
                'address' => 'required',
                'id_number' => 'required',
                'password' => 'required',
            ]);

            $user = new User();
            $user->first_name = $request->firstName;
            $user->last_name = $request->lastName;
            $user->role_id = $request->role;
            $user->gender = $request->gender;
            $user->marital_status = $request->marital_status;
            $user->id_number = $request->id_number;
            $user->email = $request->address;
            $user->password = Hash::make(trim($request->password));
            $user->save();

            return back()->with('success', 'Added User Successfully');
        } catch (\Exception $exception) {
            Log::alert('add User Error ' . $exception->getMessage());
        }
    }

    public function uploadCSV(Request $request)
    {
        try {
            $image = $request->file('csv');
            Excel::import(new UsersImport(), $request->file('csv'));

            return response()->json([
                'success' => true,
            ]);

        } catch (\Exception $exception) {
            Log::alert('Error upload csv' . $exception->getMessage());
            return response()->json([
                'success' => $exception->getMessage(),
            ]);
        }
    }
}
