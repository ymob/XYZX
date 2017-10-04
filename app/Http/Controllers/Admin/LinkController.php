<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Libs\Myclass\ImageUpload;

class LinkController extends Controller
{
    // Index
    public function index()
    {
    	$res = \DB::table('link')->get();

    	return view('Admin.Link.index', ['data' => $res]);
    }
   

    // 执行修改
    public function update(Request $request, $id)
    {
        $data = $request->except('_token');
        $res = \DB::table('link')->where('id', $id)->update($data);
        if($res)
        {
            return back()->with('info', '修改成功');
        }else
        {
            return back()->with('info', '修改失败');
        }
    }


    // 展示隐藏
    public function status($id, $status)
    {
        $status = $status?0:1;
        $res = \DB::table('link')->where(['id' => $id])->update(['status' => $status]);
        if($res)
        {
            return back()->with('info', '修改成功');
        }else
        {
            return back()->with('info', '修改失败');
        }
    }

}
