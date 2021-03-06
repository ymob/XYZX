@extends('Admin.layout')

@section('content')

	<div id="page-wrapper">
	    <div class="row">
	        <div class="col-lg-12">
	            <h1 class="page-header">新闻列表</h1>
	        </div>
	        <!-- /.col-lg-12 -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="{{ url('/Admin/news') }}">新闻列表</a>
                        </div>
                        <!-- /.panel-heading -->
                        @if(session('info'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{{ session('info') }}</li>
                            </ul>
                        </div>
                        @endif
                        <div class="panel-body">
                            <a href="{{ url('/Admin/news/add') }}">
                                <button class="btn btn-info" style="margin-bottom: 10px;">发布新的新闻</button>
                            </a>
                            <div class="dataTable_wrapper">
                                <table class="table table-hover table-condensed table-bordered table-striped">
                                    <tr>
                                        <th class="text-center" width="5%">编号</th>
                                        <th class="text-center" width="25%">标题</th>
                                        <th class="text-center" width="40%">内容</th>
                                        <th class="text-center" width="15%">发布时间</th>
                                        <th class="text-center" width="15%">操作</th>
                                    </tr>
                                    @foreach($data as $key => $val)
                                    <tr class="text-center">
                                        <td style="line-height: 100px;">{{ $loop->iteration }}</td>
                                        <td style="line-height: 100px;">{{ $val->title }}</td>
                                        <td style="line-height: 100px;" title="{{ $val->content }}">
                                            {{ substr($val->content, 0, 90) }}
                                        </td>
                                        <td style="line-height: 100px;">{{ date('Y-m-d H:i:s', $val->time) }}</td>
                                        <td style="line-height: 100px;">
                                            <a href="{{ url('/Admin/news/edit/'.$val->id) }}">
                                                <button class="btn btn-primary">修改</button>
                                            </a>
                                            <a href="{{ url('/Admin/news/status/'.$val->id.'/'.$val->status) }}">
                                                @if($val->status)
                                                <button class="btn btn-success btn-edit" title="点击隐藏">展示</button>
                                                @else
                                                <button class="btn btn-warning btn-edit" title="点击展示">隐藏</button>
                                                @endif
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            

	    </div>
	</div>
@endsection