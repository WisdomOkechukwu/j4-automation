<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Helper\EmailHelper;
use App\Models\PasswordResetToken;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;

class ForgotPasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }
    public function index()
    {
        return view('forget');
    }

    public function search($id)
    {
        $user = User::select('id_number', 'email')
            ->where('id_number', $id)
            ->first();

        if (!$user) {
            return response()->json(
                [
                    'success' => false,
                ],
                200,
            );
        }

        $email = $user->email;
        $splitEmail = explode('@', $email);
        $name = Str::mask($splitEmail[0], '*', 4);

        $splitEmailProviderData = explode('.', $splitEmail[1]);
        $providerName = Str::mask($splitEmailProviderData[0], '*', 2);
        $providerDomain = Str::mask($splitEmailProviderData[1], '*', 1);

        $user->masked = "$name@$providerName.$providerDomain";

        return response()->json(
            [
                'success' => true,
                'user' => $user,
            ],
            200,
        );
    }

    public function sendToken(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        $token = Str::random(50);

        $passwordReset = new PasswordResetToken();
        $passwordReset->email = $request->email;
        $passwordReset->token = $token;
        $passwordReset->status = 'active';
        $passwordReset->save();

        $url = url('/reset/' . $token);

        $body = "Click the url $url to reset your password or copy this link into your browser. This link expires in 15 minutes";
        $subject = 'Reset Password';
        EmailHelper::send($user, $subject, $body, false, '', '');

        return back()->with('success', 'Check your mail for rest link');
    }

    public function resetPage($token)
    {
        $passwordRestToken = PasswordResetToken::where('token', $token)
            ->orderBy('id', 'DESC')
            ->first();
        if($passwordRestToken->status === 'in-active'){
            return redirect()
                ->route('forgot')
                ->with('error', 'Reset link expired');
        }
            // dd($passwordRestToken->created_at->diffInMinutes(now()));
        if ($passwordRestToken->created_at->diffInMinutes(now()) >= 15) {
            return redirect()
                ->route('forgot')
                ->with('error', 'Reset link expired');
        }

        $email = $passwordRestToken->email;
        return view('reset', compact(['email']));
    }

    public function resetPassword(Request $request)
    {
        $this->validate($request, [
            'password' => ['required', 'confirmed', Password::min(8)],
        ]);

        $user = User::where('email',$request->email)->first();
        if(!$user){
            return back()->with('error', 'User not found');
        }
        $user->password = Hash::make(trim($request->password));
        $user->save();

        if(!Auth::attempt(['id_number' => $user->id_number, 'password' => $request->password])){
            return redirect()->back()->with('error','Invalid login details');
        }

        $passwordReset = PasswordResetToken::where('email', $request->email)->where('status','active')->get();
        foreach ($passwordReset as $pr) {
            $pr->status = 'in-active';
            $pr->save();
        }

        $is_redirect = 1;
        $url = url('/home');
        return view('reset-complete',compact(['is_redirect','url']));
    }
}
