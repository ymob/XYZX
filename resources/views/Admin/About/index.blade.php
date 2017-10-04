@extends('Admin.layout')

@section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">关于我们&联系我们</h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span>关于我们&联系我们</span>
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
                                <div class="col-md-8 col-xs-12">
                                    <form id="one-form" action="{{ url('/Admin/about/update') }}" method="post">
                                        {{ csrf_field() }}
                                        <h4>网站LOGO <small class="text-primary"> 点击点击下图选择您要上传的图片</small>  </h4>
                                        <img onclick="javascript: imgUpload('logo')" src="{{ isset(session('data')['logo'])?asset('/Tmp/'.session('data')['logo']):asset('/Uploads/'.$data['logo']) }}" width="300" class="img-thumbnail">
                                        <p class="help-block">支持的格式：jpg | png | jpeg | gif | bmp</p>
                                        <input type="hidden" name="logo" value="{{ session('data')['logo']?session('data')['logo']:$data['logo'] }}"/>
                                        <div class="form-group">
                                            <label for="title">网站名称</label>
                                            <input name="title" type="text" class="form-control" id="title" value="{{ session('data')['title']?session('data')['title']:$data['title'] }}" placeholder="网站名称">
                                        </div>
                                        <div class="form-group">
                                            <label for="contacts">联系人</label>
                                            <input name="contacts" type="text" class="form-control" id="contacts" value="{{ (session('data')['contacts']?session('data')['contacts']:$data['contacts']) }}" placeholder="请输入联系人">
                                        </div>
                                        <div class="form-group">
                                            <label for="address">地址</label>
                                            <input name="address" type="text" class="form-control" id="address" value="{{ (session('data')['address']?session('data')['address']:$data['address']) }}" placeholder="请输入公司地址">
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">手机</label>
                                            <input name="phone" type="text" class="form-control" id="phone" value="{{ (session('data')['phone']?session('data')['phone']:$data['phone']) }}" placeholder="请输入手机号码">
                                        </div>
                                        <div class="form-group">
                                            <label for="tel">座机</label>
                                            <input name="tel" type="text" class="form-control" id="tel" value="{{ (session('data')['tel']?session('data')['tel']:$data['tel']) }}" placeholder="请输入座机">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">电子邮箱</label>
                                            <input name="email" type="text" class="form-control" id="email" value="{{ (session('data')['email']?session('data')['email']:$data['email']) }}" placeholder="请输入电子邮箱">
                                        </div>
                                        <div class="form-group">
                                            <label for="postcode">邮政编码</label>
                                            <input name="postcode" type="text" class="form-control" id="postcode" value="{{ (session('data')['postcode']?session('data')['postcode']:$data['postcode']) }}" placeholder="请输入邮政编码">
                                        </div>
                                        <div class="form-group">
                                            <label for="content">关于我们</label>
                                            <script id="content" name="content" type="text/plain">
                                            {!! (session('data')?session('data')['content']:$data['content']) !!}
                                            </script>
                                            <script type="text/javascript">var ue = UE.getEditor('content', { initialFrameHeight: 220, });</script>
                                        </div>

                                        <div class="form-group col-xs-6">
                                            <label for="qrtitle1">二维码1</label>
                                            <input name="qrtitle1" type="text" class="form-control" id="qrtitle1" value="{{ (session('data')['qrtitle1']?session('data')['qrtitle1']:$data['qrtitle1']) }}" placeholder="请输入邮政编码">
                                        </div>
                                        <div class="form-group col-xs-6">
                                            <img onclick="javascript: imgUpload('qrcode1')" src="{{ isset(session('data')['qrcode1'])?asset('/Tmp/'.session('data')['qrcode1']):asset('/Uploads/'.$data['qrcode1']) }}" width="200" class="img-thumbnail" id="picModel">
                                            <input type="hidden" name="qrcode1" value="{{ session('data')['qrcode1']?session('data')['qrcode1']:$data['qrcode1'] }}"/>
                                            <p class="help-block">支持的格式：jpg | png | jpeg | gif | bmp</p>
                                        </div>
                                        <div class="form-group col-xs-6">
                                            <label for="qrtitle2">二维码2</label>
                                            <input name="qrtitle2" type="text" class="form-control" id="qrtitle2" value="{{ (session('data')['qrtitle2']?session('data')['qrtitle2']:$data['qrtitle2']) }}" placeholder="请输入邮政编码">
                                        </div>
                                        <div class="form-group col-xs-6">
                                            <img onclick="javascript: imgUpload('qrcode2')" src="{{ (session('data')['qrcode2']?asset('/Tmp/'.session('data')['qrcode2']):asset('/Uploads/'.$data['qrcode2'])) }}" width="200" class="img-thumbnail" id="picModel">
                                            <input type="hidden" name="qrcode2" value="{{ (session('data')['qrcode2']?session('data')['qrcode2']:$data['qrcode2']) }}"/>
                                            <p class="help-block">支持的格式：jpg | png | jpeg | gif | bmp</p>
                                        </div>
                                        <button class="btn btn-info col-md-1">添加</button>
                                    </form>
                                    <form id="two-form" action="{{ url('/Admin/about/upload') }}" id="one-form" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <input type="file" name="pic" style="display: none;" />
                                        <input type="hidden" name="field" />
                                    </form>
                                </div>
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

        function imgUpload(img)
        {
            var two = $('#two-form');
            var one = $('#one-form');
            var file = two.find('[type="file"]');
            var field = two.find('[type="hidden"]');
            field.val(img);
            file.click();
            file.on('change', function(){
                var inputs = one.find('input');
                var inp = null;
                $.each(inputs, function(i, n){
                    inp = $("<input name='"+ $(n).attr('name') +"' value='"+ $(n).val() +"' />");
                    two.append(inp);
                    inp = null;
                });
                inp = $("<input name='content' value='"+ UE.getEditor('content').getContent() +"'>");
                two.append(inp);
                two.submit();
            });
        }
        
            
    </script>

@endsection