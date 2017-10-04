@extends('Admin.layout')

@section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">修改展览内容</h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="{{ url('/Admin/show') }}">展览列表</a>
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
                                <form id="two-form" action="{{ url('/Admin/show/update') }}" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <div class="form-group">
                                        <label for="author">艺术家名称</label>
                                        <input name="author" type="text" class="form-control" id="author" value="{{ old('author')?old('author'):$data->author }}" placeholder="请输入艺术家姓名">
                                    </div>
                                    <div class="form-group">
                                        <label for="content">活动描述</label>
                                        <script id="content" name="content" type="text/plain">
                                        {!! old('content')?old('content'):$data->content !!}
                                        </script>
                                        <script type="text/javascript">var ue = UE.getEditor('content');</script>
                                    </div>
                                    <div class="form-group">
                                        <label for="startime">开始时间</label>
                                        <input name="startime" type="date" class="form-control" id="startime" value="{{ old('startime')?old('startime'):date('Y-m-d', $data->startime) }}" placeholder="请输入艺术家姓名">
                                    </div>
                                    <div class="form-group">
                                        <label for="endtime">结束时间</label>
                                        <input name="endtime" type="date" class="form-control" id="endtime" value="{{ old('endtime')?old('endtime'):date('Y-m-d', $data->endtime) }}" placeholder="请输入艺术家姓名">
                                    </div>
                                    <button class="btn btn-info">修改</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">

            
    </script>

@endsection