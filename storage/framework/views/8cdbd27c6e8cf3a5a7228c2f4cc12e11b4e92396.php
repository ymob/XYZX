<?php $__env->startSection('content'); ?>
<!-- 轮播图 -->
    <div class="pictureSlider poster-main" data-setting='{"width":1200,"height":600,"posterWidth":900,"posterHeight":600,"scale":0.9,"autoPlay":true,"delay":200000,"speed":500}'>
        <div class="poster-btn poster-prev-btn">
            <span class="glyphicon glyphicon-menu-left"></span>
        </div>
        <ul class="poster-list">
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="poster-item"><img src="<?php echo e(asset('./Uploads/'.$val->pic)); ?>"><h3><?php echo e($val->content); ?></h3></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <div class="poster-btn poster-next-btn">
            <span class="glyphicon glyphicon-menu-right">
        </div>
    </div>

<div id="con" class="container pad-bot-150">
    <div class="row">
        <div style="width: 24%; height: 100%;">
            <a href="<?php echo e(empty($cover[0]->url)?'javascript:':$cover[0]->url); ?>" target="_blank">
                <img src="<?php echo e(asset('Uploads/'.$cover[0]->pic)); ?>">
            </a>
        </div>
        <div style="width: 52%; height: 100%;">
            <a href="<?php echo e(empty($cover[1]->url)?'javascript:':$cover[1]->url); ?>" target="_blank">
                <img src="<?php echo e(asset('Uploads/'.$cover[1]->pic)); ?>">
            </a>
        </div>
        <div style="width: 24%; height: 100%;">
            <a href="<?php echo e(empty($cover[2]->url)?'javascript:':$cover[2]->url); ?>" target="_blank">
                <img src="<?php echo e(asset('Uploads/'.$cover[2]->pic)); ?>">
            </a>
        </div>
    </div>
    <div class="row">
        <div style="width: 24%; height: 100%;">
            <a href="<?php echo e(empty($cover[3]->url)?'javascript:':$cover[3]->url); ?>" target="_blank">
                <img src="<?php echo e(asset('Uploads/'.$cover[3]->pic)); ?>">
            </a>
        </div>
        <div style="width: 38%; height: 100%;">
            <a href="<?php echo e(empty($cover[4]->url)?'javascript:':$cover[4]->url); ?>" target="_blank">
                <img src="<?php echo e(asset('Uploads/'.$cover[4]->pic)); ?>">
            </a>
        </div>
        <div style="width: 38%; height: 100%;">
            <a href="<?php echo e(empty($cover[5]->url)?'javascript:':$cover[5]->url); ?>" target="_blank">
                <img src="<?php echo e(asset('Uploads/'.$cover[5]->pic)); ?>">
            </a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Home.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>