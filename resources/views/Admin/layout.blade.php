<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>学院之星-后台管理</title>
    <link href="{{ asset('/Aaddmin/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/Aaddmin/bower_components/metisMenu/dist/metisMenu.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/Aaddmin/dist/css/timeline.css') }}" rel="stylesheet">
    <link href="{{ asset('/Aaddmin/dist/css/sb-admin-2.css') }}" rel="stylesheet">
    <link href="{{ asset('/Aaddmin/bower_components/morrisjs/morris.css') }}" rel="stylesheet">
    <link href="{{ asset('/Aaddmin/bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/css/admin.css') }}" rel="stylesheet" type="text/css">
    <script type="text/javascript" charset="utf-8" src="{{ asset('/BD-editer/ueditor.config.js') }}"></script>
    <script type="text/javascript" charset="utf-8" src="{{ asset('/BD-editer/ueditor.all.min.js') }}"> </script>
    <script type="text/javascript" charset="utf-8" src="{{ asset('/BD-editer/lang/zh-cn/zh-cn.js') }}"></script>
    <script type="text/javascript" src="http://api.map.baidu.com/api?key=&v=1.1&services=true"></script>
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js') }}"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js') }}"></script>
    <![endif]-->
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ url('Admin') }}">学院之星1.0</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> 个人信息</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out fa-fw"></i> 退出</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                        </li>
                        

                        <li>
                            <a href="{{ url('/') }}" target="_blank"><i class="fa fa-dashboard fa-fw"></i> 前台首页</a>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> 平台管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ url('/Admin/master') }}">管理员</a>
                                </li>
                                <li>
                                    <a href="{{ url('/Admin/banner') }}">首页轮播</a>
                                </li>
                                <li>
                                    <a href="{{ url('/Admin/link') }}">友情链接</a>
                                </li>
                                <li>
                                    <a href="{{ url('/Admin/cover') }}">广告</a>
                                </li>
                                <li>
                                    <a href="{{ url('/Admin/about/map') }}">地图</a>
                                </li>
                                <li>
                                    <a href="{{ url('/Admin/about') }}">关于我们&联系我们</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> 活动管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ url('/Admin/activity') }}">活动列表</a>
                                </li>
                                <li>
                                    <a href="{{ url('/Admin/activity/add') }}">发布新活动</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> 艺术家<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ url('/Admin/artist') }}">艺术家列表</a>
                                </li>
                                <li>
                                    <a href="{{ url('/Admin/artist/add') }}">艺术家入驻</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> 展览<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ url('/Admin/show') }}">展览列表</a>
                                </li>
                                <li>
                                    <a href="{{ url('/Admin/show/add') }}">增加展览</a>
                                </li>
                            </ul>
                        </li>



                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> 媒体与出版<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ url('/Admin/news') }}">媒体新闻</a>
                                </li>
                                <li>
                                    <a href="{{ url('/Admin/publish') }}">出版</a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>

        @yield('content') 
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('/Aaddmin/bower_components/jquery/dist/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('/Aaddmin/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ asset('/Aaddmin/bower_components/metisMenu/dist/metisMenu.min.js') }}"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{{ asset('/Aaddmin/bower_components/raphael/raphael-min.js') }}"></script>

    {{-- <script src="{{ asset('/Aaddmin/bower_components/morrisjs/morris.min.js') }}"></script>
    <script src="{{ asset('/Aaddmin/js/morris-data.js') }}"></script> --}}

    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('/Aaddmin/dist/js/sb-admin-2.js') }}"></script>
    <script type="text/javascript">
       
    </script>
    @yield('script')
</body>
</html>
