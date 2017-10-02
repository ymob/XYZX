@extends('Admin.layout')

@section('content')

	<div id="page-wrapper">
	    <div class="row">
	        <div class="col-lg-12">
	            <h1 class="page-header">艺术家列表</h1>
	        </div>
	        <!-- /.col-lg-12 -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="{{ url('/Admin/artist') }}">艺术家列表</a>
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
                            <div class="dataTable_wrapper">
                                <table class="table table-hover table-condensed table-bordered table-striped">
                                    <tr>
                                        <th class="text-center" width="5%">编号</th>
                                        <th class="text-center" width="15%">艺术家名称</th>
                                        <th class="text-center" width="15%">艺术家头像</th>
                                        <th class="text-center" width="30%">艺术家简介</th>
                                        <th class="text-center" width="15%">入驻时间</th>
                                        <th class="text-center" width="20%">操作</th>
                                    </tr>
                                    @foreach($data as $key => $val)
                                    <tr class="text-center">
                                        <td style="line-height: 100px;">{{ $loop->iteration }}</td>
                                        <td style="line-height: 100px;">{{ $val->name }}</td>
                                        <td>
                                            <a href="{{ asset('./Uploads/'.$val->pic) }}" target="_blank">
                                                <img src="{{ asset('./Uploads/s_'.$val->pic) }}" alt="缩略图" title="点击查看原图" height="100">
                                            </a>
                                        </td>
                                        <td style="line-height: 100px;" title="{{ $val->introduce }}">
                                            {{ substr($val->introduce, 0, 30) }}
                                        </td>
                                        <td style="line-height: 100px;">{{ date('Y-m-d', $val->time) }}</td>
                                        <td style="line-height: 100px;">
                                            <a href="{{ url('/Admin/artist/'.$val->id) }}">
                                                <button class="btn btn-default">详情</button>
                                            </a>
                                            <a href="{{ url('/Admin/artist/edit/'.$val->id) }}">
                                                <button class="btn btn-info">修改</button>
                                            </a>
                                            <a href="{{ url('/Admin/artist/status/'.$val->id.'/'.$val->status) }}">
                                                <button class="btn btn-danger" title="{{ $val->status==1?'点击隐藏':'点击展示' }}">
                                                    {{ $val->status!=1?'隐藏':'展示' }}
                                                </button>
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