@extends('Home.layout')


@section('content')

<div id="contactUs" class="container">
    <div class="col-xs-8 ccc col-xs-offset-2">
        <h3>{{ $data['title'] }}</h3>
        <p>联系人：{{ $data['contacts'] }}</p>
        <p>地址：{{ $data['address'] }}</p>
        <p>邮编：{{ $data['postcode'] }}</p>
        <p>手机：{{ $data['phone'] }}</p>
        <p>座机：{{ $data['tel'] }}</p>
        <ul>
            <li>
                <img src="{{ asset('/Uploads/'.$data['qrcode1']) }}">
                <span>{{ $data['qrtitle1'] }}</span>
            </li>
            <li style="margin-left: 20px;">
                <img src="{{ asset('/Uploads/'.$data['qrcode2']) }}">
                <span>{{ $data['qrtitle2'] }}</span>
            </li>
        </ul>
    </div>
    <div class="col-xs-8 col-xs-offset-2">
    
        <div style="width:100% ;height:550px;border:#ccc solid 2px;" id="dituContent"></div>

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
            var xy = "{{ $data['map'] }}";
            xy = xy.split(',');

            var point = new BMap.Point(xy[0],xy[1]);//定义一个中心点坐标
            map.centerAndZoom(point,12);//设定地图的中心点和坐标并将地图显示在地图容器中
            window.map = map;//将map变量存储在全局
            var icon = new BMap.Icon('{{ asset("/images/mapIco.png") }}', new BMap.Size(20, 32), {
               anchor: new BMap.Size(20, 30)
            });

            map.panTo(xy[0],xy[1]);

            map.panTo(new BMap.Point(xy[0],xy[1]));// map.panTo方法，把点击的点设置为地图中心点  
             //将覆盖物添加到地图中
            var mkr = new BMap.Marker(new BMap.Point(xy[0],xy[1]), {
                icon: icon
            });
            map.addOverlay(mkr);

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