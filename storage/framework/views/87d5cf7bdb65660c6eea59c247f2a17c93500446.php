<?php $__env->startSection('content'); ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">友情链接</h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <?php if(session('info')): ?>
                        <div class="alert alert-success">
                            <ul>
                                <li><?php echo e(session('info')); ?></li>
                            </ul>
                        </div>
                        <?php endif; ?>
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-hover table-bordered">
                                    <tr>
                                        <th class="text-center" width="15%">编号</th>
                                        <th class="text-center" width="50%">标题</th>
                                        <th class="text-center" width="35%">操作</th>
                                    </tr>
                                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <form action="<?php echo e(url('/Admin/title/'.$val->id)); ?>" method="post">
                                    <?php echo e(csrf_field()); ?>

                                    <tr class="text-center">
                                        <td style="line-height: 35px;"><?php echo e($val->id!=9?$val->id:'备案号'); ?></td>
                                        <td style="line-height: 35px;">
                                            <input type="text" name="title" value="<?php echo e($val->title); ?>" class="form-control">
                                        </td>
                                        <td style="line-height: 35px;">
                                            <a href="<?php echo e(url('/Admin/title/edit/'.$val->id)); ?>">
                                                <button class="btn btn-primary">修改</button>
                                            </a>
                                        </td>
                                    </tr>
                                    </form>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>