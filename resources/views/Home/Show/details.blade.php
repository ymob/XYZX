@extends('Home.layout')


@section('content')


<div id="show-detail">
    
    <div class="headerPic">
        <img src="{{ asset('/Uploads/'.$cover->pic) }}">
    </div>
    <div class="container">
        <ol>
            <li class="row">
                <div class="col-xs-8 col-md-offset-2">
                    <div id="mycarousel-1" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            @foreach($data->pic as $val)
                            <div class="item {{ $loop->index?'':'active' }}">
                                <a href="{{ asset('/Uploads/'.$val->pic) }}" title="点击查看原图" target="_blank">
                                    <img src="{{ asset('/Uploads/'.$val->pic) }}">
                                </a>
                            </div>
                            @endforeach
                        </div>
                        <a class="left carousel-control" href="#mycarousel-1" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        </a>
                        <a class="right carousel-control" href="#mycarousel-1" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        </a>
                    </div>
                </div>
                <div class="col-xs-8 col-md-offset-2">
                    <div class="col-md-offset-4">
                        <h2>{{ $data->author }}</h2>
                        <h4 class="col-md-offset-1">{{ date('m月d日', $data->startime).' -- '.date('m月d日', $data->endtime).' / '.date('Y年', $data->startime) }}</h4>
                    </div>
                    <div>
                        {!! $data->content !!}
                    </div>
                </div>  
            </li>

        </ol>
    </div>
</div>
    

@endsection