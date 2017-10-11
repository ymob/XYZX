@extends('Admin.layout')

@section('content')

	<div id="page-wrapper">
	    <div class="row">
	        <div class="col-lg-12">
	            <h1 class="page-header">修改广告图</h1>
	        </div>
	        <!-- /.col-lg-12 -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                                            
                        <div class="panel-heading">
                            <a href="{{ url('/Admin/cover') }}">广告列表</a>
                        </div>
                        @if(session('info')) 
                        <div class="alert alert-success">
                            <ul>
                                <li>{{ session('info') }}</li>
                            </ul>
                        </div>
                        @endif
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="col-xs-12 col-md-6">
                                <h3 class="text-danger">{{ $data->name }}</h3><br>
                                <form action="{{ url('/Admin/cover/upload') }}" id="one-form" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <p class="text-primary">点击点击下图选择您要上传的图片</p>
                                    <p class="help-block">支持的格式：jpg | png | jpeg | gif | bmp &nbsp;&nbsp;&nbsp;<sapn class="text-danger">建议尺寸：{{ $data->size }}(单位：px)</sapn></p>
                                    
                                    <img src="{{ session('data')?asset('/Tmp/'.session('data')['fileName']):asset('/Uploads/'.$data->pic) }}" width="500" class="img-thumbnail" id="picModel">
                                    <input type="hidden" name="url" />
                                    <input type="file" name="pic" style="display: none;" />
                                </form>
                                <hr>
                                <form id="two-form" action="{{ url('/Admin/cover/update') }}" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="url">图片描述</label>
                                        <input type="hidden" name="id" value="{{ $data->id }}" style="display: none;" />
                                        <input type="hidden" name="pic" value="{{ session('data')['fileName']?session('data')['fileName']:$data->pic }}" style="display: none;" />
                                        <input name="url" type="text" class="form-control" id="url" value="{{ session('data')?session('data')['url']:$data->url }}" placeholder="请输入图片描述，可以为空">
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
            var input2 = form.find('[name="url"]');
            var url = $("#two-form").find('[name="url"]').val();
            input.click();
            input.on('change', function(){
                input2.val(url);
                form.submit();
            });
        });
            
    </script>

@endsection