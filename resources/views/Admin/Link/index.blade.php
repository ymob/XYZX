@extends('Admin.layout')

@section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">友情链接</h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        @if(session('info'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{{ session('info') }}</li>
                            </ul>
                        </div>
                        @endif
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-hover table-bordered">
                                    <tr>
                                        <th class="text-center" width="5%">编号</th>
                                        <th class="text-center" width="20%">链接名称</th>
                                        <th class="text-center" width="40%">链接地址</th>
                                        <th class="text-center" width="15%">操作</th>
                                    </tr>
                                    @foreach($data as $key => $val)
                                    <form action="{{ url('/Admin/link/'.$val->id) }}" method="post">
                                    {{ csrf_field() }}
                                    <tr class="text-center">
                                        <td style="line-height: 35px;">{{ $val->id }}</td>
                                        <td style="line-height: 35px;">
                                            <input type="text" name="link" value="{{ $val->link }}" class="form-control">
                                        </td>
                                        <td style="line-height: 35px;">
                                            <input type="text" name="url" value="{{ $val->url }}" class="form-control">
                                        </td>
                                        <td style="line-height: 35px;">
                                            <a href="{{ url('/Admin/link/edit/'.$val->id) }}">
                                                <button class="btn btn-primary">修改</button>
                                            </a>
                                    </form>
                                            <a href="{{ url('/Admin/link/status/'.$val->id.'/'.$val->status) }}">
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