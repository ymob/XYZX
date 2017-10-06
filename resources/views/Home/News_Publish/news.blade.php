@extends('Home.layout')


@section('content')

<div id="media-publish-list" class="container">
    <ul class="col-xs-10 col-xs-offset-1">
        @foreach($data as $key => $val)
        <li class="row">
            <h2 class="col-xs-2">{{ $key }}</h2>
            <ol class="col-xs-6">
                @foreach($val as $v)
                <li>
                    <a href="{{ url('/News/'.$v->id.'?'.md5($v->id)) }}" title="点击查看新闻内容">
                        <p>{{ $v->title }}</p>
                    </a>
                    <p>{{ url('/News/'.$v->id.'?'.md5($v->id)) }}</p>
                </li>
                @endforeach
            </ol>
        </li>
        @endforeach
    </ul>
</div>


@endsection