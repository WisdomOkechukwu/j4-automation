<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public static function redirectPersonnel(){
        $role = Auth::user()->role_id;

        switch ($role) {
            case 999:
                dd('Admin');
                return redirect()->route('admin.index');
                break;

            case 889:
                dd('Operator');
                break;
            
            case 779:
                dd('Field Admin');
                break;

            case 777:
                dd('Field Worker');
                break;
                
            default:
                abort(500);
                break;
        }
    }
}
