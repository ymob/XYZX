@extends('Home.layout')


@section('content')

<div id="showing">
    <div class="headerPic">
        <img src="{{ asset('/images/artist.jpg') }}">
    </div>
    <div class="container bg-efefef">
        <div class="col-xs-8 col-xs-offset-2">
            <h2>{{ $activity->title }}</h2><br>
            <div>{!! $activity->content !!}</div>
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
                                <!-- img属性, url=url, text=描述, bigimg=大图, alt=标题  -->
                                
                                @foreach($details as $val)
                                <li>
                                    <div><img src="{{ asset('/Uploads/s_'.$val->pic) }}" text="" url="javascript:" bigImg="{{ asset('/Uploads/'.$val->pic) }}" alt=""></div>
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