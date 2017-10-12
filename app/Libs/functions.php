<?php

use \App\Libs\Myclass\ImageZoom ;

function movePic($pic)
{
	if(file_exists('./Tmp/'.$pic))
	{
		copy('./Tmp/'.$pic, './Uploads/'.$pic);
	    unlink('./Tmp/'.$pic);
	    $ImageZoom = new ImageZoom('./Uploads');
	    $ImageZoom->thumb($pic, 200, 0, $qz="s_");
	}
}

function removePic($pic)
{
	if(file_exists('./Uploads/'.$pic)) unlink('./Uploads/'.$pic);
	if(file_exists('./Uploads/s_'.$pic)) unlink('./Uploads/s_'.$pic);
}


function delDirAll($dir)
{
	$res = scandir($dir);
    foreach ($res as $key => $val)
    {
        if($val == '.' || $val == '..') unset($res[$key]);
    }
    foreach ($res as $val)
    {
        if(file_exists($dir.$val)) unlink($dir.$val);
    }
}