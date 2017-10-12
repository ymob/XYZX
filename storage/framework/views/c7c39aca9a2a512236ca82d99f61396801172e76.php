<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>学院之星-后台管理</title>
    <link href="<?php echo e(asset('/Aaddmin/bower_components/bootstrap/dist/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('/Aaddmin/bower_components/metisMenu/dist/metisMenu.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('/Aaddmin/dist/css/timeline.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('/Aaddmin/dist/css/sb-admin-2.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('/Aaddmin/bower_components/morrisjs/morris.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('/Aaddmin/bower_components/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('/css/admin.css')); ?>" rel="stylesheet" type="text/css">
    <script type="text/javascript" charset="utf-8" src="<?php echo e(asset('/BD-editer/ueditor.config.js')); ?>"></script>
    <script type="text/javascript" charset="utf-8" src="<?php echo e(asset('/BD-editer/ueditor.all.min.js')); ?>"> </script>
    <script type="text/javascript" charset="utf-8" src="<?php echo e(asset('/BD-editer/lang/zh-cn/zh-cn.js')); ?>"></script>
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
                <a class="navbar-brand" href="<?php echo e(url('/Admin')); ?>">学院之星1.0</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <a href="<?php echo e(url('/')); ?>" target="_blank">
                        <button class="btn btn-success btn-md">前台首页</button>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(url('/Admin/clear')); ?>">
                        <button class="btn btn-warning btn-md">清理缓存</button>
                    </a>
                </li>
                <li></li>
                <li class="text-info"> 管理员：<?php echo e(session('master')->master); ?></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo e(url('/logout')); ?>"><i class="fa fa-sign-out fa-fw"></i> 退出</a>
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
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> 平台管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo e(url('/Admin/master')); ?>">管理员</a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('/Admin/title')); ?>">导航标题</a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('/Admin/banner')); ?>">首页轮播</a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('/Admin/link')); ?>">友情链接</a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('/Admin/cover')); ?>">广告&页面头图</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> 关于我们<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo e(url('/Admin/about')); ?>">关于我们&联系我们</a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('/Admin/about/map')); ?>">地图</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> 活动管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo e(url('/Admin/activity')); ?>">活动列表</a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('/Admin/activity/add')); ?>">发布新活动</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> 艺术家<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo e(url('/Admin/artist')); ?>">艺术家列表</a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('/Admin/artist/add')); ?>">艺术家入驻</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> 展览<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo e(url('/Admin/show')); ?>">展览列表</a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('/Admin/show/add')); ?>">增加展览</a>
                                </li>
                            </ul>
                        </li>



                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> 媒体与出版<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo e(url('/Admin/news')); ?>">媒体新闻</a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('/Admin/publish')); ?>">出版</a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>

        <?php echo $__env->yieldContent('content'); ?> 
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo e(asset('/Aaddmin/bower_components/jquery/dist/jquery.min.js')); ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo e(asset('/Aaddmin/bower_components/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo e(asset('/Aaddmin/bower_components/metisMenu/dist/metisMenu.min.js')); ?>"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo e(asset('/Aaddmin/bower_components/raphael/raphael-min.js')); ?>"></script>

    

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo e(asset('/Aaddmin/dist/js/sb-admin-2.js')); ?>"></script>
    <script type="text/javascript">
       
    </script>
    <?php echo $__env->yieldContent('script'); ?>
</body>
</html>
