<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\NotificationMail;
use App\Models\LeaveTracker;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LeaveTrackerController extends Controller
{
    public function leaveTracker()
    {
        $users = User::with(['role', 'leave_tracker'])->get();

        $admins = $users->where('role_id', 999);
        $operators = $users->where('role_id', 889);
        $fieldAdmin = $users->where('role_id', 779);
        $fieldWorker = $users->where('role_id', 777);

        // dd($admins);

        return view('admin.leave_tracker', compact(['operators', 'fieldAdmin', 'fieldWorker', 'users', 'admins']));
    }

    public function bulkAssignLeave(Request $request)
    {
        $users = null;
        switch ($request->type) {
            case 'All':
                $users = User::with('leave_tracker')->get();
                break;

            case 'Admin':
                $users = User::with('leave_tracker')
                    ->where('role_id', 999)
                    ->get();
                break;

            case 'Operator':
                $users = User::with('leave_tracker')
                    ->where('role_id', 889)
                    ->get();
                break;

            case 'FieldAdmin':
                $users = User::with('leave_tracker')
                    ->where('role_id', 779)
                    ->get();
                break;

            case 'FieldWorker':
                $users = User::with('leave_tracker')
                    ->where('role_id', 777)
                    ->get();
                break;

            default:
                return back()->with('error', 'Error assigning data try again');
                break;
        }

        foreach ($users as $user) {
            if ($user->leave_tracker) {
                $leaveTracker = $user->leave_tracker;
                $leaveTracker->annual_leave = $request->annual_leave;
                $leaveTracker->casual_leave = $request->casual_leave;
                $leaveTracker->remaining = $request->annual_leave + $request->casual_leave - $leaveTracker->leave_taken;
                $leaveTracker->save();
            } else {
                $leaveTracker = new LeaveTracker();
                $leaveTracker->user_id = $user->id;
                $leaveTracker->annual_leave = $request->annual_leave;
                $leaveTracker->casual_leave = $request->casual_leave;
                $leaveTracker->remaining = $request->annual_leave + $request->casual_leave;
                $leaveTracker->leave_taken = 0;
                $leaveTracker->year = now()->year;
                $leaveTracker->save();
            }
        }
        return back()->with('success', 'Bulk Assign Leave Successful');
    }

    public function singleLeaveAssign($user, $annual, $casual, $taken)
    {
        $leaveTracker = LeaveTracker::where('user_id', $user)
            ->where('year', now()->year)
            ->first();

            if ($leaveTracker) {
                $leaveTracker->annual_leave = $annual;
                $leaveTracker->casual_leave = $casual;
                $leaveTracker->leave_taken = $taken;
                $leaveTracker->remaining = $annual + $casual - $taken;
                $leaveTracker->save();
            } else {
                $leaveTracker = new LeaveTracker();
                $leaveTracker->user_id = $user->id;
                $leaveTracker->annual_leave = $annual;
                $leaveTracker->casual_leave = $casual;
                $leaveTracker->remaining = $annual + $casual - $taken;
                $leaveTracker->leave_taken = $taken;
                $leaveTracker->year = now()->year;
                $leaveTracker->save();
            }
        
        return response()->json([
            'success' => true,
        ]);
    }
}
