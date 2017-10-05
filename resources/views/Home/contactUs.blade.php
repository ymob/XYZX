@extends('Home.layout')


@section('content')

<div id="contactUs" class="container">
    <div class="col-xs-8 ccc col-xs-offset-2">
        <h3>学院之星</h3>
        <p>学院之星</p>
        <p>浙江省嘉兴市嘉善县阳光大道1118号泗洲小学XXX</p>
        <p>456550</p>
        <p>400-000-000</p>
        <p>13838383838</p>
        <ul>
            <li>
                <img src="./images/QRcode.jpg">
                <span>微信</span>
            </li>
            <li>
                <img src="./images/QRcode.jpg">
                <span>微信</span>
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
            var point = new BMap.Point(113.65,34.76);//定义一个中心点坐标
            map.centerAndZoom(point,12);//设定地图的中心点和坐标并将地图显示在地图容器中
            window.map = map;//将map变量存储在全局
            var icon = new BMap.Icon('{{ asset("/images/mapIco.png") }}', new BMap.Size(20, 32), {
               anchor: new BMap.Size(10, 30)
            });

            map.panTo(113.65,34.76);

            map.panTo(new BMap.Point(113.65,34.76));// map.panTo方法，把点击的点设置为地图中心点  
             //将覆盖物添加到地图中
            var mkr = new BMap.Marker(new BMap.Point(113.65,34.76), {
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