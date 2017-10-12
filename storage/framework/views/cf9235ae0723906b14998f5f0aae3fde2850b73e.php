<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title></title>
   <link href="<?php echo e(asset('/Aaddmin/bower_components/bootstrap/dist/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('/Aaddmin/bower_components/metisMenu/dist/metisMenu.min.css')); ?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo e(asset('/Aaddmin/dist/css/sb-admin-2.css')); ?>" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="<?php echo e(asset('/Aaddmin/bower_components/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">请登录</h3>
                    </div>
                    <div class="panel-body">
                        <?php if(session('info')): ?>
                            <div class="text-danger">
                                <?php echo e(session('info')); ?>

                            </div>
                            <br>
                        <?php endif; ?>
                        <form role="form" action="<?php echo e(url('/login')); ?>" method="post">
                            <?php echo e(csrf_field()); ?>

                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="账号" name="master" value="<?php echo e(old('master')?old('master'):($master?$master->master:'')); ?>" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="密码" name="password" type="password" value="<?php echo e($master?$master->password:''); ?>">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember_me" type="checkbox" value="1"><span title="可以保存一周（七天）的账号密码，也可以手动清除（浏览器-设置-清除最近浏览记录）。">记住密码</span>
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button class="btn btn-lg btn-success btn-block">登录</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo e(asset('/Aaddmin/bower_components/jquery/dist/jquery.min.js')); ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo e(asset('/Aaddmin/bower_components/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo e(asset('/Aaddmin/bower_components/metisMenu/dist/metisMenu.min.js')); ?>"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo e(asset('/Aaddmin/dist/js/sb-admin-2.js')); ?>"></script>

</body>

</html>
