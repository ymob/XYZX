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