<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Libs\Myclass\ImageUpload;

class ActivityController extends Controller
{
    // 活动列表
    public function index()
    {
    	$res = \DB::table('activity')->get();
    	return view('Admin.Activity.index', ['data' => $res]);
    }

	// 添加活动
	public function add()
	{
		return view("Admin.Activity.add");
	}

    // 活动头图
    public function upload()
    {
        $pic = $_FILES['pic'];
        $ImageUpload = new ImageUpload('./Tmp');
        $res = $ImageUpload->upload($pic);
        if($res['error']) return back()->with('info', $res['info']);
        $arr['title'] = $_POST['title'];
        $arr['content'] = $_POST['content'];
        $arr['fileName'] = $res['fileName'];
        return back()->with('data', $arr);
    }

    // 写入数据库
    public function insert(Request $request)
    {
    	$this->validate($request, [
             'title' => 'required',
             'content' => 'required'
        ],[
            'title.required' => '活动标题不能为空',
            'content.required' => '活动内容不能为空'
        ]);
        $data = $request->except('_token');
        
        $data['time'] = time();
        $res = \DB::table('activity')->insert($data);
        if($res)
        {
        	movePic($data['pic']);
        	return redirect('/Admin/activity')->with('info', '添加成功');
        }else
        {
            return redirect('/Admin/activity')->with('info', '添加失败');
        }
    }


    // 修改活动
    public function edit($id)
    {
        $data = \DB::table('activity')->where(['id' => $id])->first();
        return view('Admin.Activity.edit', ['data' => $data]);
    }

    // 执行修改
    public function update(Request $request)
    {
        $id = $request->id;
        $data = $request->except('id', '_token');
        $pic = \DB::table('activity')->where(['id' => $id])->first();
        $res = \DB::table('activity')->where('id', $id)->update($data);
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
    	$res = \DB::table('activity')->where(['id' => $id])->update(['status' => $status]);
    	if($res)
    	{
        	return back()->with('info', '修改成功');
    	}else
        {
        	return back()->with('info', '修改失败');
        }
    }


    // 活动详情
    public function detail($id)
    {
        $data = \DB::table('ac_pic')->where('aid', $id)->get();
		return view('Admin.Activity.detail', ['data' => $data, 'id' => $id]);
    }

    // 活动图片添加
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
            $oldPic = \DB::table('ac_pic')->select('pic')->where('id', $oldPicId)->first();
        	$bool = \DB::table('ac_pic')->where('id', $oldPicId)->update(['pic' => $res['fileName']]);
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
        	$bool = \DB::table('ac_pic')->insert($fileName);
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
        $data = \DB::table('ac_pic')->where('id', $id)->first();
        $res = \DB::table('ac_pic')->delete($id);
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
