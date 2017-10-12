<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    // 后台首页
    public function index()
    {
        // dd($_SERVER);
    	return view('Admin.Index.index');
    }

    // 清除缓存图片
    public function clear()
    {
        delDirAll('./Tmp/');
        delDirAll('../storage/framework/views/');
        return back()->with('info', '清理缓存成功');
    }

    // 导航标题
    public function title()
    {
        $res = \DB::table('title')->get();
        return view('Admin.Title.index', ['data' => $res]);
    }

    public function upTitle(Request $request, $id)
    {
        $data = $request->except('_token');
        $res = \DB::table('title')->where('id', $id)->update($data);
        if($res)
        {
            return back()->with('info', '修改成功');
        }else
        {
            return back()->with('info', '修改失败');
        }
    }

    // 登录页
    public function login()
    {
    	//是否记住我
        $remember_token = \Cookie::get('remember_master');
        if($remember_token)
        {
            $master = \DB::table('master')->where('master', $remember_token)->first();
        }else
        {
            $master = null;
        }
    	return view('Admin.Index.login', ['master' => $master]);
    }

    // 执行登录
    public function doLogin(Request $request)
    {
    	$this->validate($request, [
             'master' => 'required',
             'password' => 'required',
        ],[
            'master.required' => '请输入账号',
            'password.required' => '请输入密码',
        ]);
    	$data = $request->except('_token');

    	//查询管理员是否已注册
        $master = \DB::table('master')->where('master', $data['master'])->first();
        if(!$master)
        {
            return back()->with(['info'=>'账号或者密码错误'])->withInput();
        }
        if($master->password != $data['password'])
        {
            return back()->with(['info'=>'账号或者密码错误'])->withInput();
        }
        if($master->status != 1)
        {
            return back()->with(['info'=>'账号被禁用，请联系管理员'])->withInput();
        }

        session(['master'=>$master]);

        //写入cookie
        if($request->has('remember_me')) {
            \Cookie::queue('remember_master', $master->master, 60*24*7); // 一周
        }

        //跳转后台主页
        return redirect('/Admin')->with(['info'=>'登录成功']);
    }

    public function logout(Request $request)
    {
    	$request->session()->forget('master');
        return redirect('/login')->with(['info'=>'退出成功']);
    }



    // 管理员列表
    public function master()
    {
    	$master = \DB::table('master')->get();
    	return view('Admin.Index.master', ['data' => $master]);
    }


    // 添加
    public function add()
    {
    	return view('Admin.Index.add');
    }

    // 执行添加
    public function insert(Request $request)
    {
    	$this->validate($request, [
             'master' => 'required|max:16|min:3',
             'password' => 'required|max:16|min:6',
             'phone' => 'required|numeric|digits:11',
        ],[
            'master.required' => '账号不能为空',
            'master.max' => '账号最多十六位',
            'master.min' => '账号最少三位',
            'password.required' => '密码不能为空',
            'password.max' => '密码最多十六位',
            'password.min' => '密码最少六位',
            'phone.required' => '手机号不能为空',
            'phone.numeric' => '手机号只能输入数字',
            'phone.digits' => '手机号位数不正确',
        ]);

    	$data = $request->except('_token');
    	$res = \DB::table('master')->insert($data);

    	if($res)
    	{
    		return redirect('/Admin/master')->with('info', '添加成功');
    	}else
    	{
    		return back()->with('info', '添加失败');
    	}

    }

    // 修改
    public function edit($id)
    {
    	$master = \DB::table('master')->where('id', $id)->first();
    	return view('Admin.Index.edit', ['data' => $master]);
    }

    // 管理员信息修改
    public function update(Request $request)
    {
    	$this->validate($request, [
             'master' => 'required|max:16|min:3',
             'password' => 'required|max:16|min:6',
             'phone' => 'required|numeric|digits:11',
        ],[
            'master.required' => '账号不能为空',
            'master.max' => '账号最多十六位',
            'master.min' => '账号最少三位',
            'password.required' => '密码不能为空',
            'password.max' => '密码最多十六位',
            'password.min' => '密码最少六位',
            'phone.required' => '手机号不能为空',
            'phone.numeric' => '手机号只能输入数字',
            'phone.digits' => '手机号位数不正确',
        ]);

        $id = $request->input('id');
        $data = $request->except('id', '_token', 'master');

        $res = \DB::table('master')->where('id', $id)->update($data);

    	if($res)
    	{
    		return redirect('/Admin/master')->with('info', '修改成功');
    	}else
    	{
    		return back()->with('info', '修改失败');
    	}
    }


    // 禁用启用
    public function status($id, $status)
    {
    	$status = $status?0:1;
    	$res = \DB::table('master')->where(['id' => $id])->update(['status' => $status]);
    	if($res)
    	{
        	return back()->with('info', '修改成功');
    	}else
        {
        	return back()->with('info', '修改失败');
        }
    }


    // 删除管理员
    public function delete($id)
    {
    	$res = \DB::table('master')->where('id', $id)->delete();
    	if($res)
    	{
    		return back()->with('info', '删除成功');
    	}else
    	{
    		return back()->with('info', '删除成功');
    	}
    }
}
