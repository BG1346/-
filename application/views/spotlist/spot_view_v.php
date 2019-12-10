<head>
<link rel="stylesheet" type="text/css" href="/css/spot_view_css.css">
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
<?php echo($data->content) ?><br>
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
        center: new kakao.maps.LatLng(<?php echo $data->y; ?>, <?php echo $data->x; ?>),
        level: 3
    };

    var map = new kakao.maps.Map(container, options);
    var marker = new kakao.maps.Marker({ 
        position: map.getCenter()
    }); 
    marker.setMap(map);
    kakao.maps.event.addListener(map, 'click', function(mouseEvent) {        
        var latlng = mouseEvent.latLng; 
        marker.setPosition(mouseEvent.latLng);
    }); 

    //map controller
    var mapTypeControl = new kakao.maps.MapTypeControl();
    map.addControl(mapTypeControl, kakao.maps.ControlPosition.TOPRIGHT);
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