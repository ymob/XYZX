<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Libs\Myclass\ImageUpload;

class LianxiController extends Controller
{
    // Index
    public function index()
    {
    	$res = \DB::table('our')->get();
    	$count = count($res);

    	return view('Admin.Lianxi.index', ['data' => $res, 'count' => $count]);
    }

    // 展览作品
    public function upload()
    {
        $pic = $_FILES['wechatpic'];
        $ImageUpload = new ImageUpload('./Tmp');
        $res = $ImageUpload->upload($pic);
        if($res['error']) return back()->with('info', $res['info']);
        $arr['title'] = $_POST['title'];
        $arr['content'] = $_POST['content'];
        $arr['fileName'] = $res['fileName'];
        return back()->with('data', $arr);
    }

    // 修改
    public function edit($id)
    {
        $data = \DB::table('our')->where(['id' => $id])->first();
        return view('Admin.lianxi.edit', ['data' => $data]);
    }

    // 执行修改
    public function update(Request $request)
    {
        $id = $request->id;
        $data = $request->except('id', '_token');
        $pic = \DB::table('our')->where(['id' => $id])->first();
        $res = \DB::table('our')->where('id', $id)->update($data);
        if($res)
        {
            if($pic->wechatpic != $data['wechatpic'])
            {
                movePic($data['wechatpic']);
                removePic($pic->wechatpic);
            }
            return back()->with('info', '修改成功');
        }else
        {
            return back()->with('info', '修改失败');
        }
    }
}
