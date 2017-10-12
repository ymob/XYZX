<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>学院之星</title>
    <link rel="stylesheet" href="<?php echo e(asset('/css/bootstrap.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/css/index.css')); ?>">
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
                    <a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset('/images/logo.png')); ?>"></a>
                </div>
                <div id="search" class="col-xs-3 col-xs-offset-6">
                    <div class="col-xs-10">
                        <input type="search" class="form-control" placeholder="艺术家名称" id="kw" size=>
                    </div>
                    <div class="col-xs-2">
                        <a href="<?php echo e(url('/Artist')); ?>?kw=" id="search_btn"><span class="glyphicon glyphicon-search"></span></a>
                    </div>
                </div>
            </div>
            <div id="nav">
                <ol class="nav nav-pills">
                    <?php $title = \DB::table('title')->get(); ?>
                    <li><span class="glyphicon glyphicon-align-justify"></span></li>
                    <li><a href="<?php echo e(url('/')); ?>"><?php echo e($title[0]->title); ?></a></li>
                    <li><a href="<?php echo e(url('/About')); ?>"><?php echo e($title[1]->title); ?></a></li>
                    <li><a href="<?php echo e(url('/Previous')); ?>"><?php echo e($title[2]->title); ?></a></li>
                    <?php $activityId = \DB::table('activity')->select('id')->orderBy('time', 'desc')->where(['status' => 1])->first(); ?>
                    <li><a href="<?php echo e(url('/Activity/'.$activityId->id)); ?>"><?php echo e($title[3]->title); ?></a></li>
                    <li><a href="<?php echo e(url('/Artist')); ?>"><?php echo e($title[4]->title); ?></a></li>
                    <li><a href="<?php echo e(url('/Show')); ?>"><?php echo e($title[5]->title); ?></a></li>
                    <li><a href="<?php echo e(url('/News-Publish')); ?>"><?php echo e($title[6]->title); ?></a></li>
                    <li><a href="<?php echo e(url('/Contact')); ?>"><?php echo e($title[7]->title); ?></a></li>
                </ol>
            </div>
        </div>
    </div>
    
    <?php echo $__env->yieldContent('content'); ?>

    <div id="footer">
        <div class="container" style="padding: 0;">
            <div class="col-md-5">
                <ul class="row">
                    <?php $link = \DB::table('link')->where('status', 1)->get(); ?>
                    <?php $__currentLoopData = $link; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="col-xs-6"><a href="<?php echo e($val->url); ?>" class="f_link" target="_blank"><?php echo e($val->link); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <div class="col-md-6 col-md-offset-1">
                <p>学院之星</p>
                <p>COPYRIGHT © <?php echo e(date('Y') == 2012 ? 2017 : '2017  -- '.date('Y')); ?> ALL RIGHTS RESERVED 学院之星 版权所有</p>
                <p>备案号:<?php $res = \DB::table('title')->where('id', 9)->first(); echo $res->title ?></p>
                <p style="color: #aaa">技术支持：孙大炮&Ymob</p>
            </div>
        </div>
    </div>

    <script src="<?php echo e(asset('/js/jq.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/js/bannerOne.js')); ?>"></script>
    <script src="<?php echo e(asset('/js/bannerTwo.js')); ?>"></script>
    <script src="<?php echo e(asset('/js/bannerThree.js')); ?>"></script>
    <?php echo $__env->yieldContent('script'); ?>

    <script>
        $('#search_btn').on('click', function(){
            var kw = $('#kw').val();
            var url = $(this).attr('href');
            $(this).attr('href', url+kw);
        });
    </script>
</body>
</html>