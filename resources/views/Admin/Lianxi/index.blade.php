@extends('Admin.layout')

@section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">联系我们</h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="{{ url('/Admin/lianxi') }}">联系我们</a>
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
                                        <th class="text-center" width="20%">联系地址</th>
                                        <th class="text-center">联系电话</th>
                                        <th class="text-center">联系手机</th>
                                        <th class="text-center">邮政编码</th>
                                        <th class="text-center" width="20%">微信二维码</th>                 
                                        <th class="text-center">操作</th>
                                    </tr>
                                    @foreach($data as $key => $val)
                                    <tr class="text-center">
                                        <td style="line-height: 100px;">{{ $val->address }}</td>
                                        <td style="line-height: 100px;">{{ $val->phone }}</td>
                                        <td style="line-height: 100px;">{{ $val->phonenumber }}</td>
                                        <td style="line-height: 100px;">{{ $val->code }}</td>
                                        <td>
                                            <a href="{{ asset('./Uploads/'.$val->wechatpic) }}" target="_blank">
                                                <img src="{{ asset('./Uploads/s_'.$val->wechatpic) }}" alt="缩略图" title="点击查看原图" height="100">
                                            </a>
                                        </td>
                                        <td style="line-height: 100px;">
                                            <a href="{{ url('/Admin/lianxi/edit/'.$val->id) }}">
                                                <button class="btn btn-info">修改</button>
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