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
		$kw = isset($_GET['kw'])?$_GET['kw']:'';
		$res = \DB::table('artist')->orderBy('id', 'desc')->where(['status' => 1])->where('name', 'like', '%'.$kw.'%')->get();
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

	// 关于我们
	public function about()
	{
		$data = \DB::table('system')->where('key', 'content')->orWhere('key', 'logo')->get();
		$arr = [];
		foreach ($data as $key => $val)
		{
			$arr[$val->key] = $val->value;
		}
		return view('Home.About.index', ['data' => $arr]);
	}

	// 联系我们
	public function contact()
	{
		$data = \DB::table('system')->get();
		$arr = [];
		foreach ($data as $key => $val)
		{
			$arr[$val->key] = $val->value;
		}
		return view('Home.Contact.index', ['data' => $arr]);
	}

	// 新闻出版
	public function news_publish()
	{
		return view('Home.News_Publish.index');
	}

	public function news()
	{
		$news = \DB::table('news')->select(['id', 'title', 'time'])->where('status', 1)->get();
		$data = [];
		foreach ($news as $key => $val)
		{
			$data[date('Y', $val->time)][] = $val;
		}
		arsort($data);
		return view('Home.News_Publish.news', ['data' => $data]);
	}


	public function newsDetail($id)
	{
		$new = \DB::table('news')->where('id', $id)->first();
		return view('Home.News_Publish.newsDetail', ['data' => $new]);
	}

	public function publish()
	{
		$data = \DB::table('publish')->get();
		return view('Home.News_Publish.publish', ['data' => $data]);
	}

}
	