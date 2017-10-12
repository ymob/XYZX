@extends('Home.layout')

@section('content')

<div id="artists">
    <div class="headerPic">
        <img src="{{ asset('/Uploads/'.$cover->pic) }}">
    </div>
    <div class="container">
        <ul class="col-xs-12">
            
            @foreach($data as $val)
            <li class="col-md-2">
                <a href="{{ url('/Artist/'.$val->id) }}">
                    <img src="{{ asset('/Uploads/s_'.$val->pic) }}" title="{{ $val->name }}">
                </a>
                <div>
                    <span>{{ $val->name }}</span>
                </div>
            </li>
            @endforeach
            @if(count($data) == 0)
            <h2>暂时没有相关艺术家！</h2>
            @endif
        </ul>
    </div>
</div>
    
@endsection