<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::get('/Admin', function(){
	return view('Admin.Index.index');
});



Route::post('/Admin/Test/upload', "TestController@upload");

// 后台

// 轮播图
Route::get("/Admin/banner", "Admin\BannerController@index");						// 列表
Route::get("/Admin/banner/add", "Admin\BannerController@add");						// 添加页
Route::post('/Admin/banner/upload', "Admin\BannerController@upload");				// 图片上传
Route::post('/Admin/banner/insert', "Admin\BannerController@insert");				// 写入数据库
Route::get("/Admin/banner/edit/{id}", "Admin\BannerController@edit");				// 添加页
Route::post("/Admin/banner/update", "Admin\BannerController@update");				// 添加页
Route::get("/Admin/banner/delete/{id}/{pic}", "Admin\BannerController@delete");		// 删除


// 艺术家
Route::get("/Admin/artist", "Admin\ArtistController@index");						        // 列表
Route::get("/Admin/artist/add", "Admin\ArtistController@add");						        // 添加页
Route::post('/Admin/artist/upload', "Admin\ArtistController@upload");				        // 图片上传
Route::post('/Admin/artist/insert', "Admin\ArtistController@insert");				        // 写入数据库
Route::get("/Admin/artist/edit/{id}", "Admin\ArtistController@edit");				        // 添加页
Route::post("/Admin/artist/update", "Admin\ArtistController@update");				        // 添加页
Route::get("/Admin/artist/status/{id}/{pic}", "Admin\ArtistController@status");		        // 删除	
Route::get("/Admin/artist/{id}", "Admin\ArtistController@detail");                          // 详情列表
Route::post("/Admin/artist/detail/add", "Admin\ArtistController@detailAdd");                // 详情添加页
Route::get("/Admin/artist/detail/delete/{id}", "Admin\ArtistController@detailDelete");      // 详情列表

// 活动
Route::get("/Admin/activity", "Admin\ActivityController@index");							// 列表
Route::get("/Admin/activity/add", "Admin\ActivityController@add");							// 添加页
Route::post('/Admin/activity/upload', "Admin\ActivityController@upload");					// 图片上传
Route::post('/Admin/activity/insert', "Admin\ActivityController@insert");					// 写入数据库
Route::get("/Admin/activity/edit/{id}", "Admin\ActivityController@edit");					// 添加页
Route::post("/Admin/activity/update", "Admin\ActivityController@update");					// 添加页
Route::get("/Admin/activity/status/{id}/{status}", "Admin\ActivityController@status");		// 删除	
Route::get("/Admin/activity/{id}", "Admin\ActivityController@detail");						// 详情列表
Route::post("/Admin/activity/detail/add", "Admin\ActivityController@detailAdd");			// 详情添加页
Route::get("/Admin/activity/detail/delete/{id}", "Admin\ActivityController@detailDelete");	// 详情列表
	

// ========================================= 【 前台 】 ======================================
$arr = ['about', 'artist', 'artists', 'showing', 'show-event', 'media-publish', 'contactUs', 'show-event-info', 'media-publish-info', 'media-publish-list'];

foreach($arr as $key => $val) 
{
	Route::get('/'.$val, function () use ($val) {
	    return view('Home.'.$val);
	});
}

Route::get("/", "Home\IndexController@index");                  // 首页
Route::get("/previous", "Home\IndexController@previous");       // 往届回顾
Route::get('/Activity/{id}', "Home\IndexController@activity");  // 活动详情