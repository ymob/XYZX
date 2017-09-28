@extends('Admin.layout')

@section('content')

	<div id="page-wrapper">
	    <div class="row">
	        <div class="col-lg-12">
	            <h1 class="page-header">前台首页</h1>
	        </div>
	        <!-- /.col-lg-12 -->
            <hr>

            <div class="row">
                @if ($errors->any())
                    <div class="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <form action="{{ url('/Admin/Test/upload') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="file" class="form-control" name="pic">
                <button class="btn btn-info">上传</button>
            </form>

	    </div>
	</div>
@endsection