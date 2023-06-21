<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ScheduleController extends Controller
{
    public function allSchedules()
    {
        try {
            $users = User::with('role')
                ->whereNot('role_id', 999)
                ->whereNot('role_id', 9999)
                ->get();

            $operators = $users->where('role_id', 889);
            $fieldAdmin = $users->where('role_id', 779);
            $fieldWorker = $users->where('role_id', 777);

            return view('admin.all_schedules', compact(['operators', 'fieldAdmin', 'fieldWorker', 'users']));
        } catch (\Exception $exception) {
            logger('All Schedule Error ' . $exception->getMessage());
        }
    }
}
