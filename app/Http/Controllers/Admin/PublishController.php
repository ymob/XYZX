<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Libs\Myclass\ImageUpload;


class PublishController extends Controller
{
    //
	public function index()
	{
		$data = \DB::table('publish')->get();
		return view('Admin.Publish.index', ['data' => $data]);
	}


	public function add()
	{
		return view('Admin.Publish.add');
	}

	public function upload()
    {
        $pic = $_FILES['pic'];
        $content = $_POST['content'];
        $ImageUpload = new ImageUpload('./Tmp');
        $res = $ImageUpload->upload($pic);
        if($res['error']) return back()->with('info', $res['info']);
        $arr['content'] = $content;
        $arr['fileName'] = $res['fileName'];
        return back()->with('data', $arr);
    }

    public function insert(Request $request)
    {
        $data = $request->except('_token');

        movePic($data['pic']);
        $res = \DB::table('publish')->insert($data);

        return redirect('/Admin/publish')->with('info', '添加成功');;
    }

    public function edit($id)
    {
    	$data = \DB::table('publish')->where('id', $id)->first();
		return view('Admin.Publish.edit', ['data' => $data]);
    }

    // 执行修改
    public function update(Request $request)
    {
        $id = $request->id;
        $data = $request->except('id', '_token');

        $pic = \DB::table('publish')->where(['id' => $id])->first();

        if($pic->pic != $data['pic'])
        {
            movePic($data['pic']);
            removePic($pic->pic);
        }

        $res = \DB::table('publish')->where('id', $id)->update($data);
        return redirect('/Admin/publish/edit/'.$id)->with('info', '修改成功');
    }

    // 删除
    public function delete($id, $pic)
    {
        $res = \DB::table('publish')->delete($id);
        if($res)
        {
            removePic($pic);
            return back()->with('info', '删除成功');
        }else
        {
            return back()->with('info', '删除失败');
        }
    }
}
