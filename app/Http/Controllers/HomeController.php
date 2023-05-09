<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Helper\EmailHelper;
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

        $body = 'We noticed you logged in on ' . now()->format('Y M d h:ia') . ' WAT. if this wasn\'t you, kindly contact the admin or if you can login please change your password';
        $subject = 'Login Confirmation';
        EmailHelper::send(Auth::user(), $subject, $body, true, 'Login', 'login');

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
