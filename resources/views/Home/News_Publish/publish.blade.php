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
                <a href="{{ asset('/Uploads/'.$val->pic) }}" target="_blank">
                    <img src="{{ asset('/Uploads/'.$val->pic) }}" title="点击查看大图" style="border: 1px solid #ccc;">
                </a>
                <div>
                    <span style="font-size: 12px;">{{ $val->content }}</span>
                </div>
            </li>
            @endforeach


        </ul>
    </div>
</div>
    
@endsection