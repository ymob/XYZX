@extends('Admin.layout')

@section('content')

	<div id="page-wrapper">
	    <div class="row">
	        <div class="col-lg-12">
	            <h1 class="page-header">修改联系我们</h1>
	        </div>
	        <!-- /.col-lg-12 -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                                            
                        <div class="panel-heading">
                            <a href="{{ url('/Admin/lianxi') }}">联系我们</a>
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
                                <form action="{{ url('/Admin/lianxi/upload') }}" id="one-form" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <h4>微信二维码 <small class="text-primary">点击点击下图选择您要上传的图片</small>  </h4>
                                    <img src="{{ old('wechatpic')?asset('/Tmp/'.old('wechatpic')):(session('data')?asset('/Tmp/'.session('data')['fileName']):asset('/Uploads/'.$data->wechatpic)) }}" width="300" class="img-thumbnail" id="picModel">
                                    <p class="help-block">支持的格式：jpg | png | jpeg | gif | bmp</p>
                                    <input type="hidden" name="title" />
                                    <input type="hidden" name="content" />
                                    <input type="file" name="wechatpic" style="display: none;" />
                                </form>
                                <hr>
                                <form id="two-form" action="{{ url('/Admin/lianxi/update') }}" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{ $data->id }}" style="display: none;" />
                                    <input type="hidden" name="wechatpic" value="{{ old('wechatpic')?old('wechatpic'):(session('data')?session('data')['fileName']:$data->wechatpic) }}" style="display: none;" />
                                    <div class="form-group">
                                        <label for="title">电话号码</label>
                                        <input name="phone" type="text" class="form-control" id="title" value="{{ old('title')?old('title'):(session('data')['title']?session('data')['title']:$data->phone) }}" placeholder="请输入艺术家姓名">
                                    </div>
                                    <div class="form-group">
                                        <label for="title">联系地址</label>
                                        <input name="address" type="text" class="form-control" id="title" value="{{ old('title')?old('title'):(session('data')['title']?session('data')['title']:$data->address) }}" placeholder="请输入艺术家姓名">
                                    </div>
                                    <div class="form-group">
                                        <label for="content">邮政编码</label>
                                        <input name="code" type="text" class="form-control" id="content" value="{{ old('content')?old('content'):(session('data')['content']?session('data')['content']:$data->code) }}" placeholder="请输入作品名称">
                                    </div>
                                    <div class="form-group">
                                        <label for="title">手机号码</label>
                                        <input name="phonenumber" type="text" class="form-control" id="title" value="{{ old('title')?old('title'):(session('data')['title']?session('data')['title']:$data->phonenumber) }}" placeholder="请输入艺术家姓名">
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
            var input = form.find('[name="wechatpic"]');
            var input2 = form.find('[name="title"]');
            var input3 = form.find('[name="content"]');
            var name = $("#two-form").find('[name="title"]').val();
            var zuoping = $("#two-form").find('[name="content"]').val();
            input.click();
            input.on('change', function(){
                input2.val(name);
                input3.val(zuoping);
                form.submit();
            });
        });
            
    </script>

@endsection