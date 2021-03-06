@extends('Admin.layout')

@section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">修改出版物</h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="{{ url('/Admin/publish') }}">出版物列表</a>
                        </div>
                        @if(session('info')) 
                        <div class="alert alert-danger">
                            <ul>
                                <li>{{ session('info') }}</li>
                            </ul>
                        </div>
                        @endif
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="col-xs-12 col-md-6">
                                <form action="{{ url('/Admin/publish/upload') }}" id="one-form" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <p class="text-primary">点击点击下图选择您要上传的图片</p>
                                    <img src="{{ session('data')?asset('/Tmp/'.session('data')['fileName']):asset('/Uploads/'.$data->pic) }}" width="300" class="img-thumbnail" id="picModel">
                                    <p class="help-block">支持的格式：jpg | png | jpeg | gif | bmp</p>
                                    <p class="help-block">建议尺寸：1100px X 850px</p>
                                    <input type="hidden" name="content" />
                                    <input type="file" name="pic" style="display: none;" />
                                </form>
                                <hr>
                                <form id="two-form" action="{{ url('/Admin/publish/update') }}" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="content">出版物描述</label>
                                        <input type="hidden" name="id" value="{{ $data->id }}" style="display: none;" />
                                        <input type="hidden" name="pic" value="{{ session('data')?session('data')['fileName']:$data->pic }}" style="display: none;" />
                                        <input name="content" type="text" class="form-control" id="content" value="{{ session('data')?session('data')['content']:$data->content }}" placeholder="请输入出版物描述">
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
        
        $('#picModel').on('click', function(){
            var form = $("#one-form");
            var input = form.find('[name="pic"]');
            var input2 = form.find('[name="content"]');
            var content = $("#two-form").find('[name="content"]').val();
            input.click();
            input.on('change', function(){
                input2.val(content);
                form.submit();
            });
        });

        $('#two-form').on('submit', function(){
            var pic = $(this).find('[name="pic"]').val();
            if(!pic)
            {
                alert('未选择图片');
                return false;
            }
        });
            
    </script>

@endsection