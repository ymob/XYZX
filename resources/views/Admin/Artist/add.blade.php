@extends('Admin.layout')

@section('content')

	<div id="page-wrapper">
	    <div class="row">
	        <div class="col-lg-12">
	            <h1 class="page-header">艺术家入驻</h1>
	        </div>
	        <!-- /.col-lg-12 -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="{{ url('/Admin/artist') }}">艺术家列表</a>
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
                                <form action="{{ url('/Admin/artist/upload') }}" id="one-form" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <h4>艺术家头像 <small class="text-primary">点击点击下图选择您要上传的图片</small>  </h4>
                                    <img src="{{ old('pic')?asset('/Tmp/'.old('pic')):(session('data')?asset('/Tmp/'.session('data')['fileName']):asset('/images/upload.jpg')) }}" width="300" class="img-thumbnail" id="picModel">
                                    <p class="help-block">支持的格式：jpg | png | jpeg | gif | bmp</p>
                                    <input type="hidden" name="name" />
                                    <input type="hidden" name="introduce" />
                                    <input type="file" name="pic" style="display: none;" />
                                </form>
                                <hr>
                                <form id="two-form" action="{{ url('/Admin/artist/insert') }}" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="pic" value="{{ old('pic')?old('pic'):(session('data')?session('data')['fileName']:'') }}" style="display: none;" />
                                    <div class="form-group">
                                        <label for="name">姓名</label>
                                        <input name="name" type="text" class="form-control" id="name" value="{{ old('name')?old('name'):(session('data')['name']?session('data')['name']:'') }}" placeholder="请输入艺术家姓名">
                                    </div>
                                    <div class="form-group">
                                        <label for="introduce">个人简介</label>
                                        <script id="introduce" name="introduce" type="text/plain">
                                        {!! old('introduce')?old('introduce'):(session('data')?session('data')['introduce']:'') !!}
                                        </script>
                                        <script type="text/javascript">var ue = UE.getEditor('introduce');</script>
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
            var input2 = form.find('[name="name"]');
            var input3 = form.find('[name="introduce"]');
            var name = $("#two-form").find('[name="name"]').val();
            var introduce = $("#two-form").find('[name="introduce"]').val();
            input.click();
            input.on('change', function(){
                input2.val(name);
                input3.val(introduce);
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