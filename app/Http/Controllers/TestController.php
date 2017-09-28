<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\libs\Myclass\ImageUpload;
use App\libs\Myclass\ImageZoom;

class TestController extends Controller
{
    //
	public function upload()
	{
     
        $a = new ImageUpload("./Uploads/");
        $res = $a->upload($_FILES['pic']);
        dd($res);
	}

    public function thumb()
    {
        $a = new ImageZoom("./Uploads/");
        $res = $a->thumb("15066068167906.jpg", 900, 890,$qz="xs_");
        dd($res);
    }
}
