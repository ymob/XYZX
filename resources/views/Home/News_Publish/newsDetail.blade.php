@extends('Home.layout')


@section('content')
	<div class="headerPic">
        <img src="{{ asset('/Uploads/'.$cover->pic) }}">
    </div>
    <div id="media-publish-info" class="container">
        <div class="col-xs-10 col-xs-offset-1">
            <h2 class="text-center">{{ $data->title }}</h2>
            <h3 class="text-center"><small>{{ date('Y-m-d H:i:s', $data->time) }}</small></h3>
            <div>
            	
            </div>
        </div>
    </div>
    
@endsection
