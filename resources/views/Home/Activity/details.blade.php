@extends('Home.layout')


@section('content')

<div id="showing">
    <div class="headerPic">
        <img src="{{ asset('/images/artist.jpg') }}">
    </div>
    <div class="container bg-efefef">
        <div class="col-xs-8 col-xs-offset-2">
            <h2>{{ $activity->title }}</h2>
            <p>{{ $activity->content }}</p>
        </div>
        <div class="col-xs-10 col-xs-offset-1 bannerTwo">

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

        </div>
    </div>
</div>
    

@endsection