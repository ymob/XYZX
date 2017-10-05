<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Libs\Myclass\ImageUpload;

class AboutController extends Controller
{
    // Index
    public function index()
    {
    	$res = \DB::table('system')->get();
        $data = [];
        foreach($res as $val)
        {
            $data[$val->key] = $val->value;
        }
    	return view('Admin.About.index', ['data' => $data]);
    }


    // 执行修改
    public function update(Request $request)
    {
        $data = $request->except('_token');

        $oldDataObj = \DB::table('system')->get();

        $oldData = [];
        foreach($oldDataObj as $val)
        {
            $oldData[$val->key] = $val->value;
        }
        $edit = [];
        foreach ($data as $key => $val)
        {
            if($val != $oldData[$key])
            {
                $edit[$key] = $val;
            }
        }
        foreach ($edit as $key => $val)
        {
            $res = \DB::table('system')->where('key', $key)->update(['value' => $val]);
            if(!$res) return back()->with('info', '修改失败');
            if($key == 'qrcode1' || $key == 'qrcode2' || $key == 'logo')
            {
                movePic($val);
            }
        }
        return back()->with('info', '修改成功');
    }


    public function upload()
    {
        $pic = $_FILES['pic'];
        $ImageUpload = new ImageUpload('./Tmp');
        $res = $ImageUpload->upload($pic);
        if($res['error']) return back()->with('data', ['info' => $res['info']]);
        $data = $_POST;
        $arr = ['qrcode1', 'qrcode2', 'logo'];
        foreach ($arr as $key => $val)
        {
            if(!file_exists('./Tmp/'.$data[$val]))
            {
                unset($data[$val]);
            }
        }
        $data[$data['field']] = $res['fileName'];
        return back()->with('data', $data);
    }  

    public function map()
    {
        $map = \DB::table('system')->where('key', 'map')->first();
        return view('Admin.About.map', ['map' => $map->value]);
    }

    public function updateMap()
    {
        $map = $_POST['map'];
        $res = \DB::table('system')->where('key', 'map')->update(['value' => $map]);
        if($res)
        {
            return back()->with('info', '修改成功');
        }else
        {
            return back()->with('info', '修改失败');
        }
    }

}
