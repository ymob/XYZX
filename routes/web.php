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


$arr = ['index', 'about', 'artist', 'previous', 'showing', 'show-event', 'media-publish', 'contactUs'];

foreach($arr as $key => $val) 
{
	Route::get('/'.$val, function () use ($val) {
	    return view('Home.'.$val);
	});
}

Route::get('/Admin', function(){
	return view('Admin.Index.index');
});


Route::get('/', function(){
	return view('Home.index');
});

Route::post('/Admin/Test/upload', "TestController@upload");
