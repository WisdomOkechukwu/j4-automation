<?php

namespace App\Http\Controllers\FieldAdmin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Operator\ProfileController as OperatorProfileController;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile()
    {
        return (new OperatorProfileController())->profile();
    }

    public function update(Request $request)
    {
        return (new OperatorProfileController())->update($request);
    }
}
