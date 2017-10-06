<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/index.css') }}">
    <script type="text/javascript" src="http://api.map.baidu.com/api?key=&v=1.1&services=true"></script>
    <style type="text/css">
        
    </style>
</head>
<body>
    <!-- 头 -->
    <div class="container bg-efefef">
        <div id="header">
            <div id="h_top" class="row">
                <div id="search" class="col-md-3">
                    <div class="col-xs-10">
                        <input type="text" class="form-control" placeholder="search" size=2>
                    </div>
                    <div class="col-xs-2">
                        <a href="#"><span class="glyphicon glyphicon-search"></span></a>
                    </div>
                </div>
                <div class="col-md-6 col-xs-1">
                    <img src="{{ asset('/images/logo.png') }}">
                </div>
                <div id="login" class="col-md-3">
                    <div class="col-xs-3 col-xs-offset-2">
                        <!-- <button class="btn btn-default">login</button> -->
                    </div>
                    <div class="col-xs-6">
                        <select class="form-control">
                            <option>汉语</option>
                            <option>English</option>
                        </select>
                    </div>
                </div>
            </div>
            <div id="nav">
                
                <ol class="nav nav-pills">
                    <li><span class="glyphicon glyphicon-align-justify"></span></li>
                    <li><a href="{{ url('/') }}">首页</a></li>
                    <li><a href="{{ url('/About') }}">关于我们</a></li>
                    <li><a href="{{ url('/Previous') }}">往届回顾</a></li>
                    <?php $activityId = \DB::table('activity')->select('id')->orderBy('time', 'desc')->where(['status' => 1])->first(); ?>
                    <li><a href="{{ url('/Activity/'.$activityId->id) }}">2017进行时</a></li>
                    <li><a href="{{ url('/Artist') }}">2017精选艺术家</a></li>
                    <li><a href="{{ url('/Show') }}">展览</a></li>
                    <li><a href="{{ url('/News-Publish') }}">媒体与出版</a></li>
                    <li><a href="{{ url('/Contact') }}">联系我们</a></li>
                </ol>
            </div>
        </div>
    </div>

    @yield('content')

    <div id="footer">
        <div class="container">
            <div class="col col-md-5">
                <ul class="row">
                    <?php $link = \DB::table('link')->where('status', 1)->get(); ?>
                    @foreach($link as $val)
                    <li class="col-xs-6"><a href="{{ $val->url }}" target="_blank">{{ $val->link }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col col-md-2">
            </div>
            <div class="col col-md-5">
                <p>JOIN OUR NEWSLETTER</p>
                <p>Join up and get notified about new products, updates and special offers.</p>
                <a href=""><p>Enter your E-mail !</p></a>
            </div>
        </div>
    </div>

    <script src="{{ asset('/js/jq.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/js/bannerOne.js') }}"></script>
    <script src="{{ asset('/js/bannerTwo.js') }}"></script>
    <script src="{{ asset('/js/bannerThree.js') }}"></script>
    @yield('script')
</body>
</html>