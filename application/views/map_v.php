<div id="map_container">
</div>
</ul>
<br>
<br>
<br>
<button onclick="all_marker_show()">모든 마커 보이기</button>
<div id="map_wrapper">
    <div id="item1">
    </div>
    <div id="item2">
        <div id="right_map">
        </div>
    </div>
</div>
<script>
    
    // 카카오 지도 API
    var container = document.getElementById('right_map');
    var options = {
            center : new kakao.maps.LatLng(37.76632121829326, 128.90701331720723),
            // center: new kakao.maps.LatLng(33.450701, 126.570667),
            level: 7
    };
    var map = new kakao.maps.Map(container, options);
    var mapTypeControl = new kakao.maps.MapTypeControl();
    // 지도에 컨트롤을 추가해야 지도위에 표시됩니다
    // kakao.maps.ControlPosition은 컨트롤이 표시될 위치를 정의하는데 TOPRIGHT는 오른쪽 위를 의미합니다
    map.addControl(mapTypeControl, kakao.maps.ControlPosition.TOPRIGHT);
    // 지도 확대 축소를 제어할 수 있는  줌 컨트롤을 생성합니다
    var zoomControl = new kakao.maps.ZoomControl();
    map.addControl(zoomControl, kakao.maps.ControlPosition.RIGHT);



    // marker initiation
    var marker = new kakao.maps.Marker({ 
        // 지도 중심좌표에 마커를 생성합니다 
        position: map.getCenter()
    }); 
    kakao.maps.event.addListener(map, 'click', function(mouseEvent) {        
        // 클릭한 위도, 경도 정보를 가져옵니다 
        var latlng = mouseEvent.latLng; 
        // alert(typeof(latlng));
        // 마커 위치를 클릭한 위치로 옮깁니다
        marker.setPosition(latlng);
    });
    // 맨처음 spot을 클릭할 때 다른 모든 marker를 setMap(null)해줘야 함. 그다음부터는 비효율적인 setMap(null)을 방지하기 위한 bool변수
    var initMarker = 0;

    // overlay initiation
    // 마커 오버레이(마커 위에 정보 팜업)
    var content = 
    '<div id="map_overlay">'+
    '   <a id="overlay_link" href="">'+
    '      <div id="overlay_image_wrapper">'+
    '           <image id="overlay_image">'+
    '       </div>'+
    '   </a>'+
    '      <p id="overlay_title"></p>'+
    '       <p id="overlay_like"></p>'+
    '      <button onclick="closeOverlay()">닫기</button>'+
    '       </div>'+
    '</div>';

    var customOverlay = new kakao.maps.CustomOverlay({
        position: null,
        content: content,
        xAnchor: 0.5,
        yAnchor: 1.3
    });
    


    // 카카오 지도 API 끝

    // item1에 spot 리스트 넣기
    var list = <?php echo json_encode($list)?>;
    var markerlist = [];
    for(var i=0; i<list.length; i++){
        $("#item1").append('<div class="spot_iter" id="list_id_'+i+'">'+list[i].title+' <span class="category_button">'+list[i].category+' | '+list[i].subcategory+'</span></div>');
        var curMarker = new kakao.maps.Marker({ 
            position: new kakao.maps.LatLng(list[i].y, list[i].x),
        }); 
        curMarker.setMap(map);
        markerlist.push(curMarker);
    }

    // 스팟 클릭시 화면 옮기기 & 핀 세우기
    $(".spot_iter").click(function(){
        var index = $(this).index();
        var entity = list[index];
        var latLngToMove = new kakao.maps.LatLng(entity.y, entity.x);
        map.panTo(latLngToMove);


        //marker
        if(!initMarker){
            for(var i =0 ;i<markerlist.length ; ++i){
                markerlist[i].setMap(null);
            }
            initMarker = true;
        }
        marker.setPosition(latLngToMove);
        marker.setMap(map);



        //overlay
        $("#overlay_title").text(entity.title);
        $("#overlay_like").text(entity.like);
        $("#overlay_image").attr('src', '/image/'+entity.imagepath);
        $("#overlay_link").attr('href', '/index/spot_view?id='+entity.id);
        customOverlay.setPosition(latLngToMove);
        if(customOverlay.getMap() == null)
            customOverlay.setMap(map);
    });
    function closeOverlay(event){
        customOverlay.setMap(null);
    };
    function all_marker_show(){
        for(var i = 0 ; i < markerlist.length ; ++i){
            markerlist[i].setMap(map);
        }
        customOverlay.setMap(null);
        initMarker = false;
    }
</script>

<style>
    .spot_iter {
        border : 1px solid black;
    }
</style>