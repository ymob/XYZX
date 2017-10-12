<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>学院之星</title>
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/index.css') }}">
    <script type="text/javascript" src="http://api.map.baidu.com/api?key=&v=1.1&services=true"></script>
    <style type="text/css">
        
    </style>
</head>
<body>
    <!-- 头 -->
    <div class="container ">
        <div id="header">
            <div id="h_top" class="row">
                <div id="login" class="col-xs-3">
                    <a href="{{ url('/') }}"><img src="{{ asset('/images/logo.png') }}"></a>
                </div>
                <div id="search" class="col-xs-3 col-xs-offset-6">
                    <div class="col-xs-10">
                        <input type="search" class="form-control" placeholder="艺术家名称" id="kw" size=>
                    </div>
                    <div class="col-xs-2">
                        <a href="{{ url('/Artist') }}?kw=" id="search_btn"><span class="glyphicon glyphicon-search"></span></a>
                    </div>
                </div>
            </div>
            <div id="nav">
                <ol class="nav nav-pills">
                    <?php $title = \DB::table('title')->get(); ?>
                    <li><span class="glyphicon glyphicon-align-justify"></span></li>
                    <li><a href="{{ url('/') }}">{{ $title[0]->title }}</a></li>
                    <li><a href="{{ url('/About') }}">{{ $title[1]->title }}</a></li>
                    <li><a href="{{ url('/Previous') }}">{{ $title[2]->title }}</a></li>
                    <?php $activityId = \DB::table('activity')->select('id')->orderBy('time', 'desc')->where(['status' => 1])->first(); ?>
                    <li><a href="{{ url('/Activity/'.$activityId->id) }}">{{ $title[3]->title }}</a></li>
                    <li><a href="{{ url('/Artist') }}">{{ $title[4]->title }}</a></li>
                    <li><a href="{{ url('/Show') }}">{{ $title[5]->title }}</a></li>
                    <li><a href="{{ url('/News-Publish') }}">{{ $title[6]->title }}</a></li>
                    <li><a href="{{ url('/Contact') }}">{{ $title[7]->title }}</a></li>
                </ol>
            </div>
        </div>
    </div>
    
    @yield('content')

    <div id="footer">
        <div class="container" style="padding: 0;">
            <div class="col-md-5">
                <ul class="row">
                    <?php $link = \DB::table('link')->where('status', 1)->get(); ?>
                    @foreach($link as $val)
                    <li class="col-xs-6"><a href="{{ $val->url }}" class="f_link" target="_blank">{{ $val->link }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-6 col-md-offset-1">
                <p>学院之星</p>
                <p>COPYRIGHT © {{ date('Y') == 2012 ? 2017 : '2017  -- '.date('Y') }} ALL RIGHTS RESERVED 学院之星 版权所有</p>
                <p>备案号:<?php $res = \DB::table('title')->where('id', 9)->first(); echo $res->title ?></p>
                <p style="color: #aaa">技术支持：孙大炮&Ymob</p>
            </div>
        </div>
    </div>

    <script src="{{ asset('/js/jq.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/js/bannerOne.js') }}"></script>
    <script src="{{ asset('/js/bannerTwo.js') }}"></script>
    <script src="{{ asset('/js/bannerThree.js') }}"></script>
    @yield('script')

    <script>
        $('#search_btn').on('click', function(){
            var kw = $('#kw').val();
            var url = $(this).attr('href');
            $(this).attr('href', url+kw);
        });
    </script>
</body>
</html>