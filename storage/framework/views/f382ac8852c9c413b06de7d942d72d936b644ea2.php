<?php $__env->startSection('content'); ?>

    <div id="about">
        <div class="headerPic">
            <img src="<?php echo e(asset('/Uploads/'.$cover->pic)); ?>">
        </div>
        <div class="container">
            <div class="col-xs-3">
                <img src="<?php echo e(asset('/Uploads/'.$data['logo'])); ?>" style="width: 80%;">
            </div>
            <div class="col-xs-7">
                <h2>关于我们</h2>
                <div>
                    <?php echo $data['content']; ?>

                </div>
            </div>
        </div>
    </div>
   

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Home.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>