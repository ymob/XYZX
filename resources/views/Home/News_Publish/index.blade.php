@extends('Home.layout')


@section('content')


<div id="media-publish">
    <div class="headerPic">
        <img src="{{ asset('/Uploads/'.$cover[0]->pic) }}">
    </div>
    <div class="container">
        <div class="col-xs-12">
            <h2>新闻中心</h2>
            <a href="{{ url('/News') }}">
                <img src="{{ asset('/Uploads/'.$cover[1]->pic) }}">
            </a>
        </div>
        <div class="col-xs-12">
            <h2>出版中心</h2>
            <a href="{{ url('/Publish') }}">
                <img src="{{ asset('/Uploads/'.$cover[2]->pic) }}">
            </a>
        </div>
    </div>
</div>
    

@endsection