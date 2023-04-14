<?php

namespace App\Http\Controllers\FieldAdmin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Operator\MessagesController;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function messages()
    {
        return (new MessagesController())->messages();
    }
}
