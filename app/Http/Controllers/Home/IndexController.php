<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{

	// 首页
	public function index()
	{
		$data = \DB::table('banner')->get();
		return view('Home.index', ['data' => $data]);
	}


	// 活动列表(往届回顾)
	public function previous()
	{
		$res = \DB::table('activity')->orderBy('time', 'desc')->orderBy('id', 'desc')->where(['status' => 1])->get();
		unset($res[0]);
		return view('Home.Activity.index', ['data' => $res]);
	}


	// 活动详情
	public function activity($id)
	{
		$activity = \DB::table('activity')->where('id', $id)->first();
		$details = \DB::table('ac_pic')->where('aid', $id)->get();
		return view('Home.Activity.details', ['details' => $details, 'activity' => $activity]);
	}

	// 艺术家列表
	public function artist()
	{
		$res = \DB::table('artist')->orderBy('id', 'desc')->where(['status' => 1])->get();
		return view('Home.Artist.index', ['data' => $res]);
	}

	// 艺术家详情
	public function artistDetail($id)
	{
		$artist = \DB::table('artist')->where('id', $id)->first();
		$details = \DB::table('ac_pic')->where('aid', $id)->get();
		return view('Home.Artist.details', ['details' => $details, 'activity' => $artist]);
	}

	// 展览
	public function show()
	{
		$res = \DB::table('show')->where('status', 1)->get();
		// dd($res);
		foreach ($res as $key => $val)
		{
			$pic = \DB::table('sh_pic')->select('pic')->where('sid', $val->id)->first();
			if(!$pic)
			{
				unset($res[$key]);
				continue;
			}
			$val->pic = $pic->pic;
		}
		return view('Home.Show.index', ['data' => $res ]);
	}

	// 展览详情
	public function showDetail($id)
	{
		$res = \DB::table('show')->where('id', $id)->first();
		$res->pic = \DB::table('sh_pic')->where('sid', $id)->get();
		// dd($res);
		return view('Home.Show.details', ['data' => $res]);
	}

}
