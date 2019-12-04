<head>
    <style>
    @media screen and (min-width: 1024px) {
        #view_content{
            margin : auto;
            width : 75%;
        } 
        #view_content h1{
            margin : 50px 0 50px 30px;
        }
        #view_map{
            width : 400px;
            height : 400px;
        }
        .jb-wrap {
            width: 100%;
            position: relative;
            overflow : hidden;
        }
        .jb-wrap img {
            width : 100%;
            overflow : hidden;
            -webkit-filter: grayscale(70%);
            -webkit-filter: brightness(50%);
        }
        .jb-text {
            width : 100%;
            padding: 5px 10px;
            text-align: center;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate( -50%, -50% );
            font-size : 2em;
        }
        .jb-text * {
            color : white;
        }
        .jb-text #title {
            font-family : SangSangFlowerRoad;
            font-size : 3em;
        }
        .jb-text a {
            text-decoration : none;
        }
        .jb-image{
            height : 400px;
        }
        .jb-image img{
            height : 100%;
            /* -webkit-transform: translate(0, -50%);  */
        }
    }
    @media screen and (max-width: 1023px) {
        #view_content{
            margin : auto;
            width : 75%;
        } 
        #view_content h1{
            margin : 50px 0 50px 30px;
        }
        #view_map{
            width : 100%;
            height : auto;
            height : 300px;
        }
        .jb-wrap {
            width: 100%;
            position: relative;
            overflow : hidden;
        }
        .jb-wrap img {
            width : 100%;
            overflow : hidden;
            -webkit-filter: grayscale(70%);
            -webkit-filter: brightness(50%);
        }
        .jb-text {
            width : 100%;
            padding: 5px 10px;
            text-align: center;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate( -50%, -50% );
            font-size : 2em;
        }
        .jb-text * {
            color : white;
        }
        .jb-text #title {
            font-family : SangSangFlowerRoad;
            font-size : 3em;
        }
        .jb-text a {
            text-decoration : none;
        }
        .jb-image{
            height : 400px;
        }
        .jb-image img{
            /* -webkit-transform: translate(0, -50%);  */
            height : 100%;
        }
    }
    </style>
</head>
<div class="jb-wrap">
    <div class="jb-image"><img src="/image/<?php echo $data->imagepath ?>" alt="error"></div>
        <div class="jb-text">
            <p id="title"><?php echo $data->title ?></p>
            <p><?php echo $data->desc ?></p>
            <a id="toggle_like">
            <i id="heart" class="far fa-heart"></i>
            &nbsp;<span id="heart_num"><?php echo $data->like ?></span></a>
            <p><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>&nbsp;&nbsp;<?php echo $data->hits ?></p>
        </div>
    </div>
</div>


<div id="view_content">
<br><br><br><br><br><br>
content = <?php echo($data->content) ?><br>
<br><br>
<div style="text-align : left;">
<p><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;&nbsp;<?php echo $data->addr ?></p>
<p><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>&nbsp;&nbsp;<?php echo $data->tel1 ?></p>
<p><span class="glyphicon glyphicon-time" aria-hidden="true"></span>&nbsp;&nbsp;<?php echo $data->hours ?></p>
</div>

<!-- 카카오 지도-->
<h1>지도</h1>
<div id="view_map"></div>
</div>
<script>
    var container = document.getElementById('view_map');
    var options = {
        // center: new kakao.maps.LatLng(33.450701, 126.570667),
        center: new kakao.maps.LatLng(<?php echo $data->y; ?>, <?php echo $data->x; ?>),
        level: 3
    };

    var map = new kakao.maps.Map(container, options);
    var marker = new kakao.maps.Marker({ 
        // 지도 중심좌표에 마커를 생성합니다 
        position: map.getCenter()
    }); 
    marker.setMap(map);
    kakao.maps.event.addListener(map, 'click', function(mouseEvent) {        
        // 클릭한 위도, 경도 정보를 가져옵니다 
        var latlng = mouseEvent.latLng; 
        marker.setPosition(mouseEvent.latLng);
    }); 

    //map controller
    var mapTypeControl = new kakao.maps.MapTypeControl();
    // 지도에 컨트롤을 추가해야 지도위에 표시됩니다
    // kakao.maps.ControlPosition은 컨트롤이 표시될 위치를 정의하는데 TOPRIGHT는 오른쪽 위를 의미합니다
    map.addControl(mapTypeControl, kakao.maps.ControlPosition.TOPRIGHT);
    // 지도 확대 축소를 제어할 수 있는  줌 컨트롤을 생성합니다
    var zoomControl = new kakao.maps.ZoomControl();
    map.addControl(zoomControl, kakao.maps.ControlPosition.RIGHT);




    // 토글 좋아요
    $(function(){
        var like_bool = <?php echo $like_bool?>;
        if(like_bool)
            $("#heart").attr('class', 'fas fa-heart');
        $("#toggle_like").click(function(){
            $.ajax({
                url:'/index/toggle_like?id=<?php echo $data->id?>',
                success:function(data){
                    if(like_bool){
                        like_bool = 0;
                        $("#heart").attr('class', 'far fa-heart');
                        $("#heart_num").html(Number($("#heart_num").html()) - 1);
                    }
                    else{
                        like_bool = 1;
                        $("#heart").attr('class', 'fas fa-heart');
                        $("#heart_num").html(Number($("#heart_num").html()) + 1);
                    }
                }
            })
        })
    });

    // 게시글 hover
    $( ".spot_iter" ).hover(function() {

        $( this ).fadeOut( 100 );
        $( this ).fadeIn( 500 );
    });
</script>