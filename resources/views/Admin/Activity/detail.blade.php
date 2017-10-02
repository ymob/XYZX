@extends('Admin.layout')

@section('content')

	<div id="page-wrapper">
	    <div class="row">
	        <div class="col-lg-12">
	            <h1 class="page-header">活动详情</h1>
	        </div>
	        <!-- /.col-lg-12 -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="{{ url('/Admin/activity') }}">活动详情</a>
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
                            <div class="row">
                                
                                <form id="img-form" action="{{ url('/Admin/activity/detail/add') }}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="oldPic" value="0">
                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <input type="file" name="pic[]" value="0" class="hidden" multiple>
                                    <div class="img-list" id="img-add">
                                        <img src="{{ asset('/images/add.png') }}" style="border: 0;">
                                    </div>
                                </form>

                                @foreach($data as $val)
                                    <div class="img-list">
                                        <a href="{{ asset('/Uploads/'.$val->pic) }}" target="_blank" title="点击查看大图">
                                            <img src="{{ asset('/Uploads/s_'.$val->pic) }}">
                                        </a>
                                        <div>
                                            <a href="javascript:imgEdit({{ $val->id }})"><span class="glyphicon glyphicon-edit img-edit" title="修改图片"></span></a>
                                            <a href="{{ url('/Admin/activity/detail/delete/'.$val->id) }}" onclick="if(!confirm('删除之后不可恢复，确实要删除吗?')) return false;">
                                                <span class="glyphicon glyphicon-remove img-remove" title="删除图片"></span>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
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

        $('#img-add').on('click', function(){
            var file = $('#img-form').find('[type="file"]');
            file.click();
            file.on('change', function(){
                $('#img-form').submit();
            });
        });

        function imgEdit(id)
        {

            var file = $('#img-form').find('[type="file"]');
            var oldPic = $('#img-form').find('[name="oldPic"]');
            oldPic.val(id);
            file.click();
            file.on('change', function(){
                $('#img-form').submit();
            });
        }
            
    </script>
@endsection