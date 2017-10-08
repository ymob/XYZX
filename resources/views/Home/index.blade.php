@extends('Home.layout')


@section('content')
<!-- 轮播图 -->
    <div class="pictureSlider poster-main" data-setting='{"width":1200,"height":600,"posterWidth":900,"posterHeight":600,"scale":0.9,"autoPlay":true,"delay":200000,"speed":500}'>
        <div class="poster-btn poster-prev-btn">
            <span class="glyphicon glyphicon-menu-left"></span>
        </div>
        <ul class="poster-list">
            @foreach($data as $val)
            <li class="poster-item"><img src="{{ asset('./Uploads/'.$val->pic) }}"><h3>{{ $val->content }}</h3></li>
            @endforeach
        </ul>
        <div class="poster-btn poster-next-btn">
            <span class="glyphicon glyphicon-menu-right">
        </div>
    </div>

<div id="con" class="container pad-bot-150">
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