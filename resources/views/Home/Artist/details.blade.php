@extends('Home.layout')


@section('content')

<div id="showing">
    <div class="headerPic">
        <img src="{{ asset('/Uploads/'.$cover->pic) }}">
    </div>
    <div class="container bg-efefef">
        <div class="col-xs-8 col-xs-offset-2">
            <h2>{{ $activity->name }}</h2><br>
            <div>{!! $activity->introduce !!}</div>
        </div>
        <div class="col-xs-10 col-xs-offset-1 bannerTwo">
            
            @if(count($details) > 1)
            <div class="successlunbo">
                <div class="succesny">
                    <div class="control">
                        <ul class="change">
                        </ul>
                    </div>
                    <div class="thumbWrap">
                        <div class="thumbCont">
                            <ul>
                                @foreach($details as $val)
                                <li>
                                    <div>
                                        <img src="{{ asset('/Uploads/s_'.$val->pic) }}" text="详情" target="_blank" url="{{ asset('/Uploads/'.$val->pic) }}" bigImg="{{ asset('/Uploads/'.$val->pic) }}" alt="点击查看原图">
                                    </div>
                                </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @else
            
            <h2 class="col-md-offset-2 text-info">暂无图片！</2>
        
            @endif
            
        </div>
    </div>
</div>
    

@endsection