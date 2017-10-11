<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Libs\Myclass\ImageUpload;

class CoverController extends Controller
{
    //
    public function index()
    {
    	$data = \DB::table('cover')->orderBy('id')->get();
    	return view('Admin.Cover.index', ['data' => $data]);
    }

    public function edit($id)
    {
    	$data = \DB::table('cover')->where('id', $id)->first();
    	return view('Admin.Cover.edit', ['data' => $data]);
    }

    public function update(Request $request)
    {
    	$id = $request->id;
        $data = $request->except('id', '_token');

        $pic = \DB::table('cover')->where(['id' => $id])->first();

        if($pic->pic != $data['pic'])
        {
            movePic($data['pic']);
            removePic($pic->pic);
        }

        $res = \DB::table('cover')->where('id', $id)->update($data);
        return back()->with('info', '修改成功');
    }

    public function upload()
    {
    	$pic = $_FILES['pic'];
        $url = $_POST['url'];
        $ImageUpload = new ImageUpload('./Tmp');
        $res = $ImageUpload->upload($pic);
        if($res['error']) return back()->with('info', $res['info']);
        $arr['url'] = $url;
        $arr['fileName'] = $res['fileName'];
        return back()->with('data', $arr);

    }
}
