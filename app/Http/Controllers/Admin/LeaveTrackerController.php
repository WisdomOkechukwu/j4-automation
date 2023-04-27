<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\NotificationMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LeaveTrackerController extends Controller
{
    public function leaveTracker()
    {
        $user = New User();
        $user->first_name = 'Wisdom';
        $user->last_name = 'Okechukwu';
        $user->email = 'realwizi7@gmail.com';

        $subject = 'testing';
        $body = 'test';
        Mail::to($user->email)->send(new NotificationMail($subject, $body, $user));
        dd('done');
        $users = User::with(['role', 'leave_tracker'])->get();

        $admins = $users->where('role_id', 999);
        $operators = $users->where('role_id', 889);
        $fieldAdmin = $users->where('role_id', 779);
        $fieldWorker = $users->where('role_id', 777);

        return view('admin.leave_tracker', compact(['operators', 'fieldAdmin', 'fieldWorker', 'users', 'admins']));
    }
}
