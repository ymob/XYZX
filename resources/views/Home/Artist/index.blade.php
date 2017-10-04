@extends('Home.layout')

@section('content')

<div id="artists">
    <div class="headerPic">
        <img src="{{ asset('/images/show-event.jpg') }}">
    </div>
    <div class="container">
        <ul class="col-xs-12">
            
            @foreach($data as $val)
            <li class="col-md-2">
                <a href="{{ url('/Artist/'.$val->id) }}">
                    <img src="{{ asset('/Uploads/'.$val->pic) }}" title="{{ $val->name }}">
                </a>
                <div>
                    <span>{{ $val->name }}</span>
                </div>
            </li>
            @endforeach


        </ul>
    </div>
</div>
    
@endsection