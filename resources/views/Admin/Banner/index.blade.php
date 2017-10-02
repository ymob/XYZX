@extends('Admin.layout')

@section('content')

	<div id="page-wrapper">
	    <div class="row">
	        <div class="col-lg-12">
	            <h1 class="page-header">首页轮播图</h1>
	        </div>
	        <!-- /.col-lg-12 -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            轮播图列表<span class="text-danger">（注意：图片数量只能是单数！）</span>
                        </div>
                        <!-- /.panel-heading -->
                        @if($count % 2 == 0 && $count != 0)
                        <div class="alert alert-danger">
                            <ul>
                                <li>现在图片数量是双数，建议您再添加一张，或删除一张。</li>
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
                        <div class="panel-body">
                            <a href="{{ url('/Admin/banner/add') }}">
                                <button class="btn btn-primary">添加新的图片</button>
                            </a>
                            <br>
                            <br>
                            <div class="dataTable_wrapper">
                                <table class="table table-hover">
                                    <tr>
                                        <th class="text-center">编号</th>
                                        <th class="text-center">图片名称</th>
                                        <th class="text-center">图片</th>
                                        <th class="text-center">图片描述</th>
                                        <th class="text-center">操作</th>
                                    </tr>
                                    @foreach($data as $key => $val)
                                    <tr class="text-center">
                                        <td style="line-height: 100px;">{{ $loop->iteration }}</td>
                                        <td style="line-height: 100px;">{{ $val->pic }}</td>
                                        <td>
                                            <a href="{{ asset('./Uploads/'.$val->pic) }}" target="_blank">
                                                <img src="{{ asset('./Uploads/s_'.$val->pic) }}" alt="缩略图" title="点击查看原图" height="100">
                                            </a>
                                        </td>
                                        <td style="line-height: 100px;">{{ $val->content }}</td>
                                        <td style="line-height: 100px;">
                                            <a href="{{ url('/Admin/banner/edit/'.$val->id) }}">
                                                <button class="btn btn-info">修改</button>
                                            </a>
                                            <a href="{{ url('/Admin/banner/delete/'.$val->id.'/'.$val->pic) }}" onclick="if(!confirm('确实要删除吗?')) return false;">
                                                <button class="btn btn-danger">删除</button>
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