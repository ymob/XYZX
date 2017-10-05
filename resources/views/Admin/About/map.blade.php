@extends('Admin.layout')

@section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">修改关于我们</h1>
            </div>
            <!-- /.col-lg-12 -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                                            
                        <div class="panel-heading">
                            <a href="#">关于我们</a>
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
                            <form id="one-form" action="{{ url('/Admin/about/map') }}" method="post">
                            {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="postcode">坐标</label>
                                    <input name="map" type="text" class="form-control" id="postcode" value="{{ $map }}" placeholder="在下图选择坐标">
                                </div>
                                <button class="btn btn-primary">修改</button>
                            </form>
                            <br>
                            <div class="col-xs-8 col-md-6">
                                <div style="width:697px;height:450px;border:#ccc solid 1px;" id="dituContent"></div>
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
    //创建和初始化地图函数：
    function initMap(){
        createMap();//创建地图
        setMapEvent();//设置地图事件
        addMapControl();//向地图添加控件
    }
    
    //创建地图函数：
    function createMap(){
        var map = new BMap.Map("dituContent");//在百度地图容器中创建一个地图
        var point = new BMap.Point({{ $map }});//定义一个中心点坐标
        map.centerAndZoom(point,12);//设定地图的中心点和坐标并将地图显示在地图容器中
        window.map = map;//将map变量存储在全局
        var icon = new BMap.Icon('{{ asset("/images/mapIco.png") }}', new BMap.Size(20, 32), {
           anchor: new BMap.Size(2, 30)
        });
        map.panTo(new BMap.Point({{ $map }}));// map.panTo方法，把点击的点设置为地图中心点  
         //将覆盖物添加到地图中
        var mkr = new BMap.Marker(new BMap.Point({{ $map }}), {
            icon: icon
        });
        map.addOverlay(mkr);

        map.addEventListener("click",function(e){  
            map.panTo(new BMap.Point(e.point.lng,e.point.lat));// map.panTo方法，把点击的点设置为地图中心点  
             //将覆盖物添加到地图中
            var mkr = new BMap.Marker(new BMap.Point(e.point.lng,e.point.lat), {
                icon: icon
            });
            map.addOverlay(mkr);
            $('[name="map"]').val(e.point.lng+','+e.point.lat)
        });  



    }
    
    //地图事件设置函数：
    function setMapEvent(){
        map.enableScrollWheelZoom();//启用地图滚轮放大缩小
        map.enableKeyboard();//启用键盘上下左右键移动地图
    }

    
    //地图控件添加函数：
    function addMapControl(){
        //向地图中添加缩放控件
    var ctrl_nav = new BMap.NavigationControl({anchor:BMAP_ANCHOR_TOP_LEFT,type:BMAP_NAVIGATION_CONTROL_LARGE});
    map.addControl(ctrl_nav);
        //向地图中添加缩略图控件
    var ctrl_ove = new BMap.OverviewMapControl({anchor:BMAP_ANCHOR_BOTTOM_RIGHT,isOpen:1});
    map.addControl(ctrl_ove);
        //向地图中添加比例尺控件
    var ctrl_sca = new BMap.ScaleControl({anchor:BMAP_ANCHOR_BOTTOM_LEFT});
    map.addControl(ctrl_sca);
    }
    
    
    initMap();//创建和初始化地图
</script>

@endsection