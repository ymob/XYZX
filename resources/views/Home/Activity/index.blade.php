@extends('Home.layout')

@section('content')

<div id="previous">
    <div class="headerPic">
        <img src="{{ asset('/Uploads/'.$cover->pic) }}">
    </div>
    <div class="container">
        <ul class="col-xs-12">
            
            @foreach($data as $val)
            <li class="col-md-4">
                <a href="{{ url('/Activity/'.$val->id) }}">
                    <img src="{{ asset('/Uploads/'.$val->pic) }}" title="活动详情">
                </a>
                <div>
                    <span>{{ $val->title }}</span>
                </div>
            </li>
            @endforeach

        </ul>
    </div>
</div>
    
@endsection