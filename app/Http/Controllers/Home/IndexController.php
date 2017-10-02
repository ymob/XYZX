<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
	public function index()
	{
		$data = \DB::table('banner')->get();
		return view('Home.index', ['data' => $data]);
	}

	public function previous()
	{
		$res = \DB::table('activity')->orderBy('time', 'desc')->orderBy('id', 'desc')->where(['status' => 1])->get();
		unset($res[0]);
		return view('Home.Activity.previous', ['data' => $res]);
	}

	public function activity($id)
	{
		$activity = \DB::table('activity')->where('id', $id)->first();

		$details = \DB::table('ac_pic')->where('aid', $id)->get();

		return view('Home.Activity.details', ['details' => $details, 'activity' => $activity]);
	}

}
