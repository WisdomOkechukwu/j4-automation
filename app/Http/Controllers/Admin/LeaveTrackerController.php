<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class LeaveTrackerController extends Controller
{
    public function leaveTracker()
    {
        $users = User::with(['role', 'leave_tracker'])->get();

        $admins = $users->where('role_id', 999);
        $operators = $users->where('role_id', 889);
        $fieldAdmin = $users->where('role_id', 779);
        $fieldWorker = $users->where('role_id', 777);

        return view('admin.leave_tracker', compact(['operators', 'fieldAdmin', 'fieldWorker', 'users', 'admins']));
    }
}
