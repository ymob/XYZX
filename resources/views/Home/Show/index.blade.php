@extends('Home.layout')

@section('content')
<div id="show">
    <div class="headerPic">
        <img src="{{ asset('/Uploads/'.$cover->pic) }}">
    </div>
    <div class="container">
        <ul class="col-xs-12">
            
            @foreach($data as $val)
            <li class="col-md-6">
                <a href="{{ url('/Show/'.$val->id) }}">
                    <img src="{{ asset('/Uploads/'.$val->pic) }}" title="{{ $val->author }}">
                </a>
                <div>
                    <span>{{ $val->author }}</span>
                </div>
            </li>
            @endforeach


        </ul>
    </div>
</div>
    
@endsection