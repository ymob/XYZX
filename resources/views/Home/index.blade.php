@extends('Home.layout')


@section('content')
<!-- 轮播图 -->
<div class="pictureSlider poster-main" data-setting='{"width":1600,"height":850,"posterWidth":1100,"posterHeight":850,"scale":0.7,"autoPlay":true,"delay":2000,"speed":300}'>
    <div class="poster-btn poster-prev-btn">
        <span class="glyphicon glyphicon-menu-left"></span>
    </div>
    <ul class="poster-list">
        <li class="poster-item"><img src="./images/banner01.jpg"><h3>孙晓强-春的气息</h3></li>
        <li class="poster-item"><img src="./images/banner01.jpg"><h3>孙晓强-春的气息</h3></li>
        <li class="poster-item"><img src="./images/banner01.jpg"><h3>孙晓强-春的气息</h3></li>
        <li class="poster-item"><img src="./images/banner01.jpg"><h3>孙晓强-春的气息</h3></li>
        <li class="poster-item"><img src="./images/banner01.jpg"><h3>孙晓强-春的气息</h3></li>
    </ul>
    <div class="poster-btn poster-next-btn">
        <span class="glyphicon glyphicon-menu-right">
    </div>
</div>

<div id="con" class="container">
    <div class="row">
        <div style="width: 25%; height: 100%;">
            <img src="./images/3.jpg">
        </div>
        <div style="width: 50%; height: 100%;">
            <img src="./images/4.jpg">
        </div>
        <div style="width: 25%; height: 100%;">
            <img src="./images/5.jpg">
        </div>
    </div>
    <div class="row">
        <div style="width: 25%; height: 100%;">
            <img src="./images/7.jpg">
        </div>
        <div style="width: 37%; height: 100%;">
            <img src="./images/8.jpg">
        </div>
        <div style="width: 38%; height: 100%;">
            <img src="./images/9.jpg">
        </div>
    </div>
</div>
@endsection