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
		$cover = \DB::table('cover')->whereIn('id', [1, 2, 3, 4, 5, 6])->get();
		return view('Home.index', ['data' => $data, 'cover' => $cover]);
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
		$cover = \DB::table('cover')->where('id', 7)->first();
		return view('Home.About.index', ['data' => $arr, 'cover' => $cover]);
	}


	// 活动列表(往届回顾)
	public function previous()
	{
		$res = \DB::table('activity')->orderBy('time', 'desc')->orderBy('id', 'desc')->where(['status' => 1])->get();
		unset($res[0]);
		$cover = \DB::table('cover')->where('id', 8)->first();
		return view('Home.Activity.index', ['data' => $res, 'cover' => $cover]);
	}


	// 活动详情
	public function activity($id)
	{
		$activity = \DB::table('activity')->where('id', $id)->first();
		$details = \DB::table('ac_pic')->where('aid', $id)->get();
		$cover = \DB::table('cover')->where('id', 9)->first();
		return view('Home.Activity.details', ['details' => $details, 'activity' => $activity, 'cover' => $cover]);
	}

	// 艺术家列表
	public function artist()
	{
		$kw = isset($_GET['kw'])?$_GET['kw']:'';
		$res = \DB::table('artist')->orderBy('id', 'desc')->where(['status' => 1])->where('name', 'like', '%'.$kw.'%')->get();
		$cover = \DB::table('cover')->where('id', 10)->first();
		return view('Home.Artist.index', ['data' => $res, 'cover' => $cover]);
	}

	// 艺术家详情
	public function artistDetail($id)
	{
		$artist = \DB::table('artist')->where('id', $id)->first();
		$details = \DB::table('ac_pic')->where('aid', $id)->get();
		$cover = \DB::table('cover')->where('id', 11)->first();
		return view('Home.Artist.details', ['details' => $details, 'activity' => $artist, 'cover' => $cover]);
	}

	// 展览
	public function show()
	{
		$res = \DB::table('show')->where('status', 1)->get();
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
		$cover = \DB::table('cover')->where('id', 12)->first();
		return view('Home.Show.index', ['data' => $res, 'cover' => $cover]);
	}

	// 展览详情
	public function showDetail($id)
	{
		$res = \DB::table('show')->where('id', $id)->first();
		$res->pic = \DB::table('sh_pic')->where('sid', $id)->get();
		$cover = \DB::table('cover')->where('id', 13)->first();
		return view('Home.Show.details', ['data' => $res, 'cover' => $cover]);
	}

	// 新闻出版
	public function news_publish()
	{
		$cover = \DB::table('cover')->whereIn('id', [14, 19, 20])->get();
		return view('Home.News_Publish.index', ['cover' => $cover]);
	}

	// 出版
	public function publish()
	{
		$data = \DB::table('publish')->get();
		$cover = \DB::table('cover')->where('id', 15)->first();
		return view('Home.News_Publish.publish', ['data' => $data, 'cover' => $cover]);
	}

	// 新闻列表
	public function news()
	{
		$news = \DB::table('news')->select(['id', 'title', 'time'])->where('status', 1)->get();
		$data = [];
		foreach ($news as $key => $val)
		{
			$data[date('Y', $val->time)][] = $val;
		}
		arsort($data);
		$cover = \DB::table('cover')->where('id', 16)->first();
		return view('Home.News_Publish.news', ['data' => $data, 'cover' => $cover]);
	}

	// 新闻详情
	public function newsDetail($id)
	{
		$new = \DB::table('news')->where('id', $id)->first();
		$cover = \DB::table('cover')->where('id', 17)->first();
		return view('Home.News_Publish.newsDetail', ['data' => $new, 'cover' => $cover]);
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
		$cover = \DB::table('cover')->where('id', 18)->first();
		return view('Home.Contact.index', ['data' => $arr, 'cover' => $cover]);
	}
}
	