<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helper\EmailHelper;
use App\Http\Controllers\Helper\ImageResize;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserProfileController extends Controller
{
    public function userProfile()
    {
        try {
            $user = Auth::user();
            $role = Role::whereNot('id', $user->role_id)->get();
            return view('admin.user_profile', compact(['user', 'role']));
        } catch (\Exception $exception) {
            logger('Profile Error ' . $exception->getMessage());
        }
    }

    public function staffProfile($user)
    {
        try {
            $user = User::with('role')
                ->where('id', $user)
                ->first();

            $role = Role::whereNot('id', $user->role_id)->get();
            return view('admin.user_profile', compact(['user', 'role']));
        } catch (\Exception $exception) {
            logger('Staff Profile Error ' . $exception->getMessage());
        }
    }

    public function uploadDp(Request $request)
    {
        try {
            $user = User::find($request->user_id);

            $image = $request->file('dp_image');
            $extension = $image->getClientOriginalName();
            $fileName = $user->email . uniqid() . '.' . $extension;

            // ImageResize::resize($image, 2160,2160 , $fileName);
            $image->move(public_path('storage/upload'), $fileName);
            $user->dp = $fileName;
            $user->save();

            return response()->json([
                'success' => true,
                'dp' => asset('storage/upload/' . $fileName),
            ]);
        } catch (\Exception $exception) {
            logger('Upload DP Error ' . $exception->getMessage());
        }
    }

    public function updateStaffProfile(Request $request)
    {
        try {
            if ($request->password === null) {
                $this->validate($request, [
                    'firstName' => 'required',
                    'lastName' => 'required',
                    'id_number' => 'required',
                ]);
            } else {
                $this->validate($request, [
                    'firstName' => 'required',
                    'lastName' => 'required',
                    'id_number' => 'required',
                    'password' => ['required', 'confirmed', Password::min(8)],
                ]);
            }

            $user = User::find($request->user_id);
            $user->first_name = $request->firstName;
            $user->last_name = $request->lastName;
            $user->role_id = $request->role;
            $user->gender = $request->gender;
            $user->address = $request->address;
            $user->marital_status = $request->marital_status;
            $user->id_number = $request->id_number;
            $user->leave_status = $request->leave_status;
            $user->hmo = $request->hmo;
            $user->loan_eligibility = $request->loan_eligibility;

            if ($request->password !== null) {
                $user->password = Hash::make(trim($request->password));
            }

            $user->save();

            $body = 'Your profile has been updated. Click the button below to check your profile to see changes';
            $subject = 'Profile Update Notification';

            if ($user->role_id == 777) {
                $route = route('field.worker.profile');
            } elseif ($user->role_id == 779) {
                $route = route('field.admin.profile');
            } elseif ($user->role_id == 889) {
                $route = route('operator.profile');
            } elseif ($user->role_id == 999) {
                $route = route('admin.user-profile');
            }

            EmailHelper::send($user, $subject, $body, true, 'Show Profile', $route);

            return back()->with('success', 'User Information Updated');
        } catch (\Exception $exception) {
            logger('Update Staff Profile Error ' . $exception->getMessage());
        }
    }

    public function deleteStaffProfile(Request $request)
    {
        try {
            User::find($request->user)->delete();
            return redirect()
                ->route('admin.users')
                ->with('success', 'User Deleted Successfully');
        } catch (\Exception $exception) {
            logger('Delete Staff Profile Error ' . $exception->getMessage());
        }
    }
}
