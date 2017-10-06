@extends('Home.layout')


@section('content')


<div id="media-publish">
    <div class="headerPic">
        <img src="{{ asset('/images/media-publish.jpg') }}">
    </div>
    <div class="container">
        <div class="col-xs-12">
            <h2>新闻中心</h2>
            <a href="{{ url('/News') }}">
                <img src="{{ asset('/images/media01.jpg') }}">
            </a>
        </div>
        <div class="col-xs-12">
            <h2>出版中心</h2>
            <a href="{{ url('/Publish') }}">
                <img src="{{ asset('/images/media02.jpg') }}">
            </a>
        </div>
    </div>
</div>
    

@endsection