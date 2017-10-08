@extends('Admin.layout')

@section('content')

	<div id="page-wrapper">
	    <div class="row">
	        <div class="col-lg-12">
	            <h1 class="page-header">出版列表</h1>
	        </div>
	        <!-- /.col-lg-12 -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="{{ url('/Admin/publish') }}">出版列表</a>
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
                            <a href="{{ url('/Admin/publish/add') }}">
                                <button class="btn btn-info" style="margin-bottom: 10px;">添加新的出版物</button>
                            </a>
                            <div class="dataTable_wrapper">
                                <table class="table table-hover table-condensed table-bordered table-striped">
                                    <tr>
                                        <th class="text-center" width="5%">编号</th>
                                        <th class="text-center">出版物封面</th>                 
                                        <th class="text-center">描述信息</th>
                                        <th class="text-center" width="15%">操作</th>
                                    </tr>
                                    @foreach($data as $key => $val)
                                    <tr class="text-center">
                                        <td style="line-height: 100px;">{{ $loop->iteration }}</td>
                                        <td>
                                            <a href="{{ asset('./Uploads/'.$val->pic) }}" target="_blank">
                                                <img src="{{ asset('./Uploads/s_'.$val->pic) }}" alt="缩略图" title="点击查看原图" height="100">
                                            </a>
                                        </td>
                                        <td style="line-height: 100px;" title="{{ $val->content }}">
                                            {{ substr($val->content, 0, 30) }}
                                        </td>
                                        <td style="line-height: 100px;">
                                            <a href="{{ url('/Admin/publish/edit/'.$val->id) }}">
                                                <button class="btn btn-primary">修改</button>
                                            </a>
                                            <a href="{{ url('/Admin/publish/status/'.$val->id.'/'.$val->status) }}">
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