@extends('Admin.layout')

@section('content')

	<div id="page-wrapper">
	    <div class="row">
	        <div class="col-lg-12">
	            <h1 class="page-header">后台管理中心</h1>
	        </div>
            <div class="row">
                <div class="col-lg-12">
                    @if(session('info'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{{ session('info') }}</li>
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
            <div class="panel-body">
                <h3 class="text-warning">欢迎管理员: <span class="text-info">{{ session('master')->master }}</span> &nbsp;您好！</h3>
                <br>
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <colgroup>
                            <col class="col-xs-2">
                            <col class="col-xs-3">
                        </colgroup>
                        <thead>
                            <tr>
                                <th colspan="2">系统基本参数</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">
                                    <code>当前版本</code>
                                </th>
                                <td>1.0</td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <code>网站首页</code>
                                </th>
                                <td>{{ $_SERVER['SERVER_NAME'] }}</td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <code>服务器软件及语言</code>
                                </th>
                                <td>{{ $_SERVER['SERVER_SOFTWARE'] }}</td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <code>数据库</code>
                                </th>
                                <td>{{ $_SERVER['DB_CONNECTION'] }}</td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <code>最大上传限制</code>
                                </th>
                                <td>2.0M</td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <code>系统时间</code>
                                </th>
                                <td>{{ date('Y-m-d H:i:s') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

	    </div>
	</div>
@endsection