<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    //
    public function index()
    {
    	$data = \DB::table('news')->get();

    	return view('Admin.News.index', ['data' => $data]);
    }


    public function add()
    {
    	return view('Admin.News.add');
    }

    public function insert(Request $request)
    {
    	$this->validate($request, [
             'title' => 'required',
             'content' => 'required',
        ],[
            'title.required' => '请输入新闻标题',
            'content.required' => '请输入新闻内容',
        ]);
    	$data = $request->except('_token');
    	$data['time'] = time();
    	$res = \DB::table('news')->insert($data);
    	if($res)
    	{
    		return redirect('/Admin/news')->with('info', '发布成功');
    	}else
    	{
    		return back()->with('info', '发布失败');
    	}
    }

    public function edit($id)
    {
    	$data = \DB::table('news')->where('id', $id)->first();
    	return view('Admin.News.edit', ['data' => $data]);
    }

    public function update(Request $request)
    {
    	$this->validate($request, [
             'title' => 'required',
             'content' => 'required',
        ],[
            'title.required' => '请输入新闻标题',
            'content.required' => '请输入新闻内容',
        ]);
        $id = $request->input('id');
    	$data = $request->except('_token', 'id');
    	$res = \DB::table('news')->where('id', $id)->update($data);
    	if($res)
    	{
    		return redirect('/Admin/news')->with('info', '修改成功');
    	}else
    	{
    		return back()->with('info', '修改失败');
    	}
    }


    // 展示隐藏
    public function status($id, $status)
    {
    	$status = $status?0:1;
    	$res = \DB::table('news')->where(['id' => $id])->update(['status' => $status]);
    	if($res)
    	{
        	return back()->with('info', '修改成功');
    	}else
        {
        	return back()->with('info', '修改失败');
        }
    }
}
