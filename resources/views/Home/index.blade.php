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
        <div style="width: 24%; height: 100%;">
            <a href="{{ empty($cover[0]->url)?'javascript:':$cover[0]->url }}" target="_blank">
                <img src="{{ asset('Uploads/'.$cover[0]->pic) }}">
            </a>
        </div>
        <div style="width: 52%; height: 100%;">
            <a href="{{ empty($cover[1]->url)?'javascript:':$cover[1]->url }}" target="_blank">
                <img src="{{ asset('Uploads/'.$cover[1]->pic) }}">
            </a>
        </div>
        <div style="width: 24%; height: 100%;">
            <a href="{{ empty($cover[2]->url)?'javascript:':$cover[2]->url }}" target="_blank">
                <img src="{{ asset('Uploads/'.$cover[2]->pic) }}">
            </a>
        </div>
    </div>
    <div class="row">
        <div style="width: 24%; height: 100%;">
            <a href="{{ empty($cover[3]->url)?'javascript:':$cover[3]->url }}" target="_blank">
                <img src="{{ asset('Uploads/'.$cover[3]->pic) }}">
            </a>
        </div>
        <div style="width: 38%; height: 100%;">
            <a href="{{ empty($cover[4]->url)?'javascript:':$cover[4]->url }}" target="_blank">
                <img src="{{ asset('Uploads/'.$cover[4]->pic) }}">
            </a>
        </div>
        <div style="width: 38%; height: 100%;">
            <a href="{{ empty($cover[5]->url)?'javascript:':$cover[5]->url }}" target="_blank">
                <img src="{{ asset('Uploads/'.$cover[5]->pic) }}">
            </a>
        </div>
    </div>
</div>
@endsection