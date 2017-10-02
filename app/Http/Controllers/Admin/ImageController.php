<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Libs\Myclass\ImageUpload;


class ImageController extends Controller
{
    // add
    public function upload()
    {
    	$pic = $_FILES['pic'];

    	$ImageUpload = new ImageUpload('./Tmp');

    	$res = $ImageUpload->upload($pic);
    	
    	return redirect(\URL::previous())->with(['data' => $res]);
    }
}
