<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public static function redirectPersonnel(){
        $role = Auth::user()->role_id;

        switch ($role) {
            case 999:
                return redirect()->route('admin.index');
                break;

            case 889:
                return redirect()->route('operator.index');
                break;
            
            case 779:
                return redirect()->route('field.admin.index');
                break;

            case 777:
                return redirect()->route('field.worker.index');
                break;
                
            default:
                abort(500);
                break;
        }
    }
}
