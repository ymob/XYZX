<?php

namespace App\Libs\Myclass;

/**
* file: updown.class.php 文件上传类file
* time：2017-08-13
*/
class ImageUpload
{
	public $path ;
	public $fileType = ['image/jpeg', 'image/png', 'image/gif', 'image/bmp'];
	public $fileSize ;

	/**
	  * @param $path sting 文件保存路径
	  * @param $fileType array 文件类型
	  * @param $fileSize int 文件大小限制
	  */
	public function __construct($path, $fileSize = 0)
	{
		$this->path = $path;
		$this->fileSize = $fileSize;
	}

	/**
	  * @param $file resource 上传之后的文件
	  * @return $res array [error => 上传是否出错, inof => 提示信息]
	  */
	public function upload($file)
	{
		$res['error'] = 0;
		$res['info'] = null;

		$path = $this->path;
		$fileType = $this->fileType;
		$fileSize = $this->fileSize;

		if(!file_exists($path))
		{
			mkdir($path);
		}
		$path = trim($path, '/').'/';

		if($file['error'] != 0)
		{
			switch ($file['error']) {
				case 1:
					$info = "表示上传文件的大小超出了约定值";
				break;
				case 2:
					$info = "表示上传文件大小超出了HTML表单隐藏域属性的MAX＿FILE＿SIZE元素所指定的最大值";
				break;
				case 3:
					$info = "表示文件只被部分上传";
				break;
				case 4:
					$info = "表示没有上传任何文件";
				break;
				case 6:
					$info = "表示找不到临时文件夹";
				break;
				case 7:
					$info = "表示文件写入失败";
				break;
			}
			$res['info'] = $info;
			$res['error'] = 1;
			return $res;
		}

		if($fileType && count($fileType) > 0)
		{
			if(!in_array($file['type'], $fileType))
			{
				$res['info'] = '不支持该文件类型上传';
				$res['error'] = 1;
				return $res;
			}
		}else
		{
			$res['info'] = '未设置正确的文件类型';
			$res['error'] = 1;
			return $res;
		}

		$ext = explode('.', $file['name'])[count(explode('.', $file['name'])) - 1];
		if($fileSize > 0 && $file['size'] > $fileSize)
		{
			$res['info'] = '表示上传文件的大小超出了约定值';
			$res['error'] = 1;
			return $res;
		}

		do
		{
			$newName = time().rand(1000, 9999).'.'.$ext;
		}while(file_exists($path.$newName) || file_exists('./Uploads/'.$newName));

		if(is_uploaded_file($file['tmp_name']))
		{
			if(move_uploaded_file($file['tmp_name'], $path.$newName))
			{
				$res['info'] = '上传成功';
				$res['fileName'] = $newName;
				return $res;
			}else
			{
				$res['info'] = '文件上传失败，请重试';
				$res['error'] = 1;
				return $res;
			}
		}else
		{
			$res['info'] = '非法的文件';
			$res['error'] = 1;
			return $res;
		}
	}

	/**
	  * @param $file string 文件名
	  * @return $res array [error => 上传是否出错, inof => 提示信息]
	  */
	static public function download($file)	
	{
		$ext = explode('.', $file)[count(explode('.', $file)) - 1];
		$filename = time().rand(1000,9999).'.'.$ext;
		Header("Content-type: application/octet-stream");
		Header("Accept-Length: ".filesize($file));
		Header("Content-Disposition: attachment;filename=".$filename);
		readfile($file);
	}

}