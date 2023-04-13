<?php

namespace App\Http\Controllers\FieldWorker;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Operator\MessagesController;
use App\Models\Messages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function messages()
    {
        return (new MessagesController())->messages();
    }
}
