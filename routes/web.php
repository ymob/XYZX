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
Route::get("/Admin/banner", "Admin\BannerController@index");						       // 列表
Route::get("/Admin/banner/add", "Admin\BannerController@add");						       // 添加页
Route::post('/Admin/banner/upload', "Admin\BannerController@upload");				       // 图片上传
Route::post('/Admin/banner/insert', "Admin\BannerController@insert");				       // 写入数据库
Route::get("/Admin/banner/edit/{id}", "Admin\BannerController@edit");				       // 添加页
Route::post("/Admin/banner/update", "Admin\BannerController@update");				       // 添加页
Route::get("/Admin/banner/delete/{id}/{pic}", "Admin\BannerController@delete");		       // 删除


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
	
// 展览
Route::get("/Admin/show", "Admin\ShowController@index");                                    // 列表
Route::get("/Admin/show/add", "Admin\ShowController@add");                                  // 添加页
Route::post('/Admin/show/insert', "Admin\ShowController@insert");                           // 写入数据库
Route::get("/Admin/show/edit/{id}", "Admin\ShowController@edit");                           // 添加页
Route::post("/Admin/show/update", "Admin\ShowController@update");                           // 添加页
Route::get("/Admin/show/status/{id}/{status}", "Admin\ShowController@status");              // 删除   
Route::get("/Admin/show/detail/{id}", "Admin\ShowController@detail");                       // 详情列表
Route::post("/Admin/show/detail/add", "Admin\ShowController@detailAdd");                    // 详情添加页
Route::get("/Admin/show/detail/delete/{id}", "Admin\ShowController@detailDelete");          // 详情列表
Route::post('/Admin/show/upload', "Admin\ShowController@upload");                           // 图片上传

// 友情链接
Route::get("/Admin/link", "Admin\LinkController@index");                                    // 列表
Route::post("/Admin/link/{id}", "Admin\LinkController@update");                             // 修改
Route::get("/Admin/link/status/{id}/{status}", "Admin\LinkController@status");              // 删除


// 关于我们&联系我们
Route::get("/Admin/about", "Admin\AboutController@index");                                  // 列表
Route::post('/Admin/about/update', "Admin\AboutController@update");                         // 图片上传
Route::post('/Admin/about/upload', "Admin\AboutController@upload");                         // 图片上传
Route::get('/Admin/about/map', "Admin\AboutController@map");                                // 地图
Route::post('/Admin/about/map', "Admin\AboutController@updateMap");                         // 地图

// 媒体新闻
Route::get("/Admin/news", "Admin\NewsController@index");                                    // 列表
Route::get("/Admin/news/add", "Admin\NewsController@add");                                  // 列表
Route::post('/Admin/news/insert', "Admin\NewsController@insert");                           // 写入数据库
Route::get("/Admin/news/edit/{id}", "Admin\NewsController@edit");                           // 列表
Route::post('/Admin/news/update', "Admin\NewsController@update");                           // 写入数据库
Route::get("/Admin/news/status/{id}/{status}", "Admin\NewsController@status");              // 删除   


// ========================================= 【 前台 】 ======================================
$arr = ['about', 'artist', 'artists', 'showing', 'show-event', 'media-publish', 'contactUs', 'show-event-info', 'media-publish-info', 'media-publish-list'];

foreach($arr as $key => $val) 
{
	Route::get('/'.$val, function () use ($val) {
	    return view('Home.'.$val);
	});
}

Route::get("/", "Home\IndexController@index");                      // 首页
Route::get("/Previous", "Home\IndexController@previous");           // 往届活动回顾
Route::get('/Activity/{id}', "Home\IndexController@activity");      // 活动详情
Route::get("/Artist", "Home\IndexController@artist");               // 艺术家列表
Route::get('/Artist/{id}', "Home\IndexController@artistDetail");    // 艺术家详情
Route::get('/Show', "Home\IndexController@show");                   // 展览列表
Route::get('/Show/{id}', "Home\IndexController@showDetail");        // 展览详情
Route::get('/About', "Home\IndexController@about");                 // 关于我们
Route::get('/Contact', "Home\IndexController@contact");             // 联系我们
Route::get('/News-Publish', "Home\IndexController@news_publish");   // 新闻和出版
Route::get('/News', "Home\IndexController@news");                  // 新闻列表
Route::get('/News/{id}', "Home\IndexController@newsDetail");        // 新闻详情
