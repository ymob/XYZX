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
                                        <th class="text-center" width="15%">编号</th>
                                        <th class="text-center" width="50%">标题</th>
                                        <th class="text-center" width="35%">操作</th>
                                    </tr>
                                    @foreach($data as $key => $val)
                                    <form action="{{ url('/Admin/title/'.$val->id) }}" method="post">
                                    {{ csrf_field() }}
                                    <tr class="text-center">
                                        <td style="line-height: 35px;">{{ $val->id!=9?$val->id:'备案号' }}</td>
                                        <td style="line-height: 35px;">
                                            <input type="text" name="title" value="{{ $val->title }}" class="form-control">
                                        </td>
                                        <td style="line-height: 35px;">
                                            <a href="{{ url('/Admin/title/edit/'.$val->id) }}">
                                                <button class="btn btn-primary">修改</button>
                                            </a>
                                        </td>
                                    </tr>
                                    </form>
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