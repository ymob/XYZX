@extends('Admin.layout')

@section('content')

	<div id="page-wrapper">
	    <div class="row">
	        <div class="col-lg-12">
	            <h1 class="page-header">修改新闻</h1>
	        </div>
	        <!-- /.col-lg-12 -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="{{ url('/Admin/news') }}">展览列表</a>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if(session('info'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{{ session('info') }}</li>
                            </ul>
                        </div>
                        @endif
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="col-xs-12 col-md-8">
                                <form id="two-form" action="{{ url('/Admin/news/update') }}" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" value="{{ $data->id }}" name="id">
                                    <div class="form-group">
                                        <label for="title">新闻标题</label>
                                        <input name="title" type="text" class="form-control" id="title" value="{{ old('title')?old('title'):$data->title }}" placeholder="请输入新闻标题">
                                    </div>
                                    <div class="form-group">
                                        <label for="content">活动描述</label>
                                        <script id="content" name="content" type="text/plain">
                                            {!! old('content')?old('content'):$data->content !!}
                                        </script>
                                        <script type="text/javascript">var ue = UE.getEditor('content');</script>
                                    </div>
                                    <button class="btn btn-info">添加</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
	    </div>
	</div>
@endsection

@section('script')
    <script type="text/javascript">

            
    </script>

@endsection