<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Libs\Myclass\ImageUpload;

class ShowController extends Controller
{

	// 展览列表
    public function index()
    {
    	$res = \DB::table('show')->get();
    	return view('Admin.Show.index', ['data' => $res]);
    }

	// 添加展览
	public function add()
	{
		return view("Admin.Show.add");
	}

    // 写入数据库
    public function insert(Request $request)
    {
    	$this->validate($request, [
             'author' => 'required',
             'content' => 'required',
             'startime' => 'required',
             'endtime' => 'required'
        ],[
            'author.required' => '请输入艺术家姓名',
            'content.required' => '请输入展览描述',
            'startime.required' => '请输入选择时间',
            'endtime.required' => '请选择结束'
        ]);

        $data = $request->except('_token');
        $data['startime'] = strtotime($data['startime']);
        $data['endtime'] = strtotime($data['endtime']);
        $res = \DB::table('show')->insert($data);
        if($res)
        {
        	return redirect('/Admin/show')->with('info', '添加成功');
        }else
        {
            return redirect('/Admin/show')->with('info', '添加失败');
        }
    }


    // 修改展览
    public function edit($id)
    {
        $data = \DB::table('show')->where(['id' => $id])->first();
        return view('Admin.Show.edit', ['data' => $data, 'id' => $id]);
    }

    // 执行修改
    public function update(Request $request)
    {
        $this->validate($request, [
             'author' => 'required',
             'content' => 'required',
             'startime' => 'required',
             'endtime' => 'required'
        ],[
            'author.required' => '请输入艺术家姓名',
            'content.required' => '请输入展览描述',
            'startime.required' => '请输入选择时间',
            'endtime.required' => '请选择结束'
        ]);

        $data = $request->except('_token', 'id');
        $id = $request->input('id');
        $data['startime'] = strtotime($data['startime']);
        $data['endtime'] = strtotime($data['endtime']);
        $res = \DB::table('show')->where('id', $id)->update($data);
        if($res)
        {
            return redirect('/Admin/show')->with('info', '修改成功');
        }else
        {
            return redirect('/Admin/show')->with('info', '修改失败');
        }
    }


    // 展示隐藏
    public function status($id, $status)
    {
    	$status = $status?0:1;
    	$res = \DB::table('show')->where(['id' => $id])->update(['status' => $status]);
    	if($res)
    	{
        	return back()->with('info', '修改成功');
    	}else
        {
        	return back()->with('info', '修改失败');
        }
    }

    // 详情
    public function detail($id)
    {
        $res = \DB::table('sh_pic')->where('sid', $id)->get();
        return view('Admin.Show.detail', ['data' => $res, 'id' => $id]);
    }


    // 添加
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
            $oldPic = \DB::table('sh_pic')->select('pic')->where('id', $oldPicId)->first();
            $bool = \DB::table('sh_pic')->where('id', $oldPicId)->update(['pic' => $res['fileName']]);
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
                $fileName[$key]['sid'] = $id;
            }
            $bool = \DB::table('sh_pic')->insert($fileName);
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
        $data = \DB::table('sh_pic')->where('id', $id)->first();
        $res = \DB::table('sh_pic')->delete($id);
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
