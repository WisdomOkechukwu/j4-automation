<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Models\Messages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
    public function messages()
    {
        try {
            $messages = Messages::with(['sender'])
                ->where('receiver_id', Auth::user()->id)
                ->orderBy('created_at', 'DESC')
                ->get();

            //rework on this view
            return view('messages', compact(['messages']));
        } catch (\Exception $exception) {
            logger('Messages Error ' . $exception->getMessage());
        }
    }
}
