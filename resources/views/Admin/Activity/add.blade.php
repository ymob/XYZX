@extends('Admin.layout')

@section('content')

	<div id="page-wrapper">
	    <div class="row">
	        <div class="col-lg-12">
	            <h1 class="page-header">发布新的活动</h1>
	        </div>
	        <!-- /.col-lg-12 -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="{{ url('/Admin/activity') }}">活动列表</a>
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
                                <form action="{{ url('/Admin/activity/upload') }}" id="one-form" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <h4>活动封面图 <small class="text-primary">点击点击下图选择您要上传的图片</small>  </h4>
                                    <img src="{{ old('pic')?asset('/Tmp/'.old('pic')):(session('data')?asset('/Tmp/'.session('data')['fileName']):asset('/images/upload.jpg')) }}" width="300" class="img-thumbnail" id="picModel">
                                    <p class="help-block">支持的格式：jpg | png | jpeg | gif | bmp</p>
                                    <input type="hidden" name="title" />
                                    <input type="hidden" name="content" />
                                    <input type="file" name="pic" style="display: none;" />
                                </form>
                                <hr>
                                <form id="two-form" action="{{ url('/Admin/activity/insert') }}" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="pic" value="{{ old('pic')?old('pic'):(session('data')?session('data')['fileName']:'') }}" style="display: none;" />
                                    <div class="form-group">
                                        <label for="title">活动标题</label>
                                        <input name="title" type="text" class="form-control" id="title" value="{{ old('title')?old('title'):(session('data')['title']?session('data')['title']:'') }}" placeholder="请输入活动标题">
                                    </div>
                                    <div class="form-group">
                                        <label for="content">活动描述</label>
                                        <textarea class="form-control" rows="5" name="content" id="content" placeholder="请输入活动详情">{{ old('content')?old('content'):(session('data')?session('data')['content']:'') }}</textarea>
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
            var input2 = form.find('[name="title"]');
            var input3 = form.find('[name="content"]');
            var title = $("#two-form").find('[name="title"]').val();
            var content = $("#two-form").find('[name="content"]').val();
            input.click();
            input.on('change', function(){
                input2.val(title);
                input3.val(content);
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