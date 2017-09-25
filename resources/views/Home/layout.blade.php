<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <style type="text/css">
        
    </style>
</head>
<body>
    <!-- 头 -->
    <div class="container">
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
                    <img src="./images/logo.jpg">
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
                    <li><a href="{{ url('/index') }}">首页</a></li>
                    <li><a href="{{ url('/about') }}">关于我们</a></li>
                    <li><a href="{{ url('/previous') }}">往届回顾</a></li>
                    <li><a href="{{ url('/showing') }}">2017进行时</a></li>
                    <li><a href="{{ url('/artist') }}">2017精选艺术家</a></li>
                    <li><a href="{{ url('/show-event') }}">展览与活动</a></li>
                    <li><a href="{{ url('/media-publish') }}">媒体与出版</a></li>
                    <li><a href="{{ url('/contactUs') }}">联系我们</a></li>
                </ol>
            </div>
        </div>
    </div>

    @yield('content')

    <div id="footer">
        <div class="container">
            <div class="col col-md-5">
                <ul class="col col-xs-6">
                    <li><a href="">Our Team</a></li>
                    <li><a href="">Contact Us</a></li>
                    <li><a href="">Support</a></li>
                    <li><a href="">Blog</a></li>
                </ul>
                <ul class="col col-xs-6">
                    <li><a href="">Exckusive Offers</a></li>
                    <li><a href="">Licencing</a></li>
                    <li><a href="">Privacy Policy</a></li>
                    <li><a href="">Refund Policy</a></li>
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

    <script src="./js/jq.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/bannerOne.js"></script>
    <script src="./js/bannerTwo.js"></script>
    <script src="./js/bannerThree.js"></script>
</body>
</html>