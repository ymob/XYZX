<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Libs\Myclass\ImageUpload;

class ArtistController extends Controller
{

	// 艺术家列表
    public function index()
    {
    	$res = \DB::table('artist')->get();
    	return view('Admin.Artist.index', ['data' => $res]);
    }

	// 添加艺术家
	public function add()
	{
		return view("Admin.Artist.add");
	}

    // 艺术家头像
    public function upload()
    {
        $pic = $_FILES['pic'];
        $ImageUpload = new ImageUpload('./Tmp');
        $res = $ImageUpload->upload($pic);
        if($res['error']) return back()->with('info', $res['info']);
        $arr['name'] = $_POST['name'];
        $arr['introduce'] = $_POST['introduce'];
        $arr['fileName'] = $res['fileName'];
        return back()->with('data', $arr);
    }

    // 写入数据库
    public function insert(Request $request)
    {
    	$this->validate($request, [
             'name' => 'required',
             'introduce' => 'required'
        ],[
            'name.required' => '请输入艺术家姓名',
            'introduce.required' => '请输入艺术家简介'
        ]);
        $data = $request->except('_token');
        
        $data['time'] = time();
        $res = \DB::table('artist')->insert($data);
        if($res)
        {
        	movePic($data['pic']);
        	return redirect('/Admin/artist')->with('info', '添加成功');
        }else
        {
            return redirect('/Admin/artist')->with('info', '添加失败');
        }
    }


    // 修改艺术家
    public function edit($id)
    {
        $data = \DB::table('artist')->where(['id' => $id])->first();
        return view('Admin.Artist.edit', ['data' => $data]);
    }

    // 执行修改
    public function update(Request $request)
    {
        $id = $request->id;
        $data = $request->except('id', '_token');
        $pic = \DB::table('artist')->where(['id' => $id])->first();
        $res = \DB::table('artist')->where('id', $id)->update($data);
        if($res)
        {
        	if($pic->pic != $data['pic'])
	        {
	            movePic($data['pic']);
	            removePic($pic->pic);
	        }
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
    	$res = \DB::table('artist')->where(['id' => $id])->update(['status' => $status]);
    	if($res)
    	{
        	return back()->with('info', '修改成功');
    	}else
        {
        	return back()->with('info', '修改失败');
        }
    }


    // 艺术家详情
    public function detail($id)
    {
        $data = \DB::table('ar_pic')->where('aid', $id)->get();
		return view('Admin.Artist.detail', ['data' => $data, 'id' => $id]);
    }

    // 艺术家图片添加
    public function detailAdd()
    {
        $file = $_FILES['pic'];
        $picArr = [];
        foreach ($file as $key => $val)
        {
            foreach ($val as $k => $v) {
                $picArr[$k][$key] = $v;
            }
        }
    	$id = $_POST['id'];
    	$oldPicId = $_POST['oldPic'];
        $ImageUpload = new ImageUpload('./Tmp');
        if($oldPicId)
        {
            $res = $ImageUpload->upload($picArr[0]);
            if($res['error']) return back()->with('info', $res['info']);
            $oldPic = \DB::table('ar_pic')->select('pic')->where('id', $oldPicId)->first();
        	$bool = \DB::table('ar_pic')->where('id', $oldPicId)->update(['pic' => $res['fileName']]);
        	if($bool)
        	{
                removePic($oldPic->pic);
        		movePic($res['fileName']);
        		return back()->with('info', '修改成功');
        	}else
        	{
        		return back()->with('info', '修改失败');
        	}
        }else
        {
            $fileName = [];
            foreach ($picArr as $key => $val)
            {
                $res = $ImageUpload->upload($val);
                if($res['error']) return back()->with('info', $res['info']);
                $fileName[$key]['pic'] = $res['fileName'];
                $fileName[$key]['aid'] = $id;
            }
        	$bool = \DB::table('ar_pic')->insert($fileName);
            if($bool)
            {
                foreach ($fileName as $val)
                {
                    movePic($val['pic']);
                }
                return back()->with('info', '添加成功');
            }else
            {
                return back()->with('info', '添加失败');
            }
        }
    }

    // 详情删除
    public function detailDelete($id)
    {
        $data = \DB::table('ar_pic')->where('id', $id)->first();
        $res = \DB::table('ar_pic')->delete($id);
        if($res)
        {
            removePic($data->pic);
            return back()->with('info', '删除成功');
        }else
        {
            return back()->with('info', '删除失败');
        }
    }

}
