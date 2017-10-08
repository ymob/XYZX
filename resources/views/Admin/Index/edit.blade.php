@extends('Admin.layout')

@section('content')

	<div id="page-wrapper">
	    <div class="row">
	        <div class="col-lg-12">
	            <h1 class="page-header">添加管理员</h1>
	        </div>
	        <!-- /.col-lg-12 -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="{{ url('/Admin/master') }}">管理员列表</a>
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
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="col-xs-12 col-md-6">
                                <form id="two-form" action="{{ url('/Admin/master/update') }}" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{ $data->id }}">
                                    <div class="form-group">
                                        <label for="name">账户</label>
                                        <input name="master" type="text" readonly class="form-control" id="name" value="{{ old('master')?old('master'):$data->master }}" placeholder="请输入账号">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">密码</label>
                                        <input name="password" type="password" class="form-control" id="password" value="{{ old('password')?old('password'):$data->password }}" placeholder="请输入密码">
                                    </div>

                                    <div class="form-group">
                                        <label for="phone">手机号</label>
                                        <input name="phone" type="phone" class="form-control" id="phone" value="{{ old('phone')?old('phone'):$data->phone }}" placeholder="请输入手机号">
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