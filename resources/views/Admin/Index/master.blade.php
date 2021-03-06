@extends('Admin.layout')

@section('content')

	<div id="page-wrapper">
	    <div class="row">
	        <div class="col-lg-12">
	            <h1 class="page-header">展览列表</h1>
	        </div>
	        <!-- /.col-lg-12 -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="{{ url('/Admin/show') }}">展览列表</a>
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
                            <a href="{{ url('/Admin/master/add') }}">
                                <button class="btn btn-info" style="margin-bottom: 10px;">添加新的管理员</button>
                            </a>
                            <div class="dataTable_wrapper">
                                <table class="table table-hover table-condensed table-bordered table-striped">
                                    <tr>
                                        <th class="text-center" width="5%">编号</th>
                                        <th class="text-center">账号</th>
                                        <th class="text-center">密码</th>
                                        <th class="text-center">手机号</th>
                                        <th class="text-center" width="20%">操作</th>
                                    </tr>
                                    @foreach($data as $key => $val)
                                    <tr class="text-center">
                                        <td style="line-height: 100px;">{{ $loop->iteration }}</td>
                                        <td style="line-height: 100px;">{{ $val->master }}</td>
                                        <td style="line-height: 100px;">{{ $val->password }}</td>
                                        <td style="line-height: 100px;">{{ $val->phone }}</td>
                                        <td style="line-height: 100px;">
                                            <a href="{{ url('/Admin/master/edit/'.$val->id) }}">
                                                <button class="btn btn-primary">修改</button>
                                            </a>
                                            @if($val->id != 1)
                                            <a href="{{ url('/Admin/master/status/'.$val->id.'/'.$val->status) }}">
                                                @if($val->status)
                                                <button class="btn btn-success btn-edit" title="点击禁用">启用</button>
                                                @else
                                                <button class="btn btn-warning btn-edit" title="点击启用">禁用</button>
                                                @endif
                                            </a>
                                            <a href="{{ url('/Admin/master/delete/'.$val->id) }}" onclick="if(!confirm('确实要删除吗?')) return false;">
                                                <button class="btn btn-danger">删除</button>
                                            </a>
                                            @endif
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

