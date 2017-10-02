@extends('Admin.layout')

@section('content')

	<div id="page-wrapper">
	    <div class="row">
	        <div class="col-lg-12">
	            <h1 class="page-header">添加新的轮播图</h1>
	        </div>
	        <!-- /.col-lg-12 -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="{{ url('/Admin/banner') }}">轮播图列表</a><span class="text-danger">（注意：图片数量只能是单数！）</span>
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
                                <form action="{{ url('/Admin/banner/upload') }}" id="one-form" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <p class="text-primary">点击点击下图选择您要上传的图片</p>
                                    <img src="{{ session('data')?asset('/Tmp/'.session('data')['fileName']):asset('/images/upload.jpg') }}" width="300" class="img-thumbnail" id="picModel">
                                    <p class="help-block">支持的格式：jpg | png | jpeg | gif | bmp</p>
                                    <p class="help-block">建议尺寸：1100px X 850px</p>
                                    <input type="hidden" name="content" />
                                    <input type="file" name="pic" style="display: none;" />
                                </form>
                                <hr>
                                <form id="two-form" action="{{ url('/Admin/banner/insert') }}" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="content">图片描述</label>
                                        <input type="hidden" name="pic" value="{{ session('data')?session('data')['fileName']:'' }}" style="display: none;" />
                                        <input name="content" type="text" class="form-control" id="content" value="{{ session('data')?session('data')['content']:'' }}" placeholder="请输入图片描述，可以为空">
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