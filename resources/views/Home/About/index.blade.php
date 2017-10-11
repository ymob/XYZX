@extends('Home.layout')


@section('content')

    <div id="about">
        <div class="headerPic">
            <img src="{{ asset('/Uploads/'.$cover->pic) }}">
        </div>
        <div class="container">
            <div class="col-xs-3">
                <img src="{{ asset('/Uploads/'.$data['logo']) }}" style="width: 80%;">
            </div>
            <div class="col-xs-7">
                <h2>关于我们</h2>
                <div>
                    {!! $data['content'] !!}
                </div>
            </div>
        </div>
    </div>
   

@endsection