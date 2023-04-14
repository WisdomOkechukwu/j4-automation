<?php

namespace App\Http\Controllers;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Artisan;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function deleteFilSystems(){
        $file = new Filesystem;
        $file->cleanDirectory('storage/uploads');  
        $file->cleanDirectory('storage/dp');  

        return redirect()->back()->with("success", "Storage Formatted");
    }
}
