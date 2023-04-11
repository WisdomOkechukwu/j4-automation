<?php

namespace App\Http\Controllers\Helper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;

class ImageResize extends Controller
{
    public static function resize($image, $width, $height, $fileName){

        $path = public_path('storage/dp');

        $imgFile = Image::make($image->getRealPath());
        $imgFile->resize($height, $width, function ($constraint) {
		    $constraint->aspectRatio();
		})->save($path.'/'.$fileName);
    }
}
