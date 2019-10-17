<div id="map_container">
</div>
</ul>
<br>
<br>
<br>
<div id="map_wrapper">
    <div id="item1">
    </div>
    <div id="item2">
        <div id="right_map">
        </div>
    </div>
</div>
<script>
    $(function(){
        // 카카오 지도 API

        var container = document.getElementById('right_map');
        var options = {
                center : new kakao.maps.LatLng(37.76632121829326, 128.90701331720723),
                // center: new kakao.maps.LatLng(33.450701, 126.570667),
                level: 7
        };
        var map = new kakao.maps.Map(container, options);
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
        var mapTypeControl = new kakao.maps.MapTypeControl();
        // 지도에 컨트롤을 추가해야 지도위에 표시됩니다
        // kakao.maps.ControlPosition은 컨트롤이 표시될 위치를 정의하는데 TOPRIGHT는 오른쪽 위를 의미합니다
        map.addControl(mapTypeControl, kakao.maps.ControlPosition.TOPRIGHT);
        // 지도 확대 축소를 제어할 수 있는  줌 컨트롤을 생성합니다
        var zoomControl = new kakao.maps.ZoomControl();
        map.addControl(zoomControl, kakao.maps.ControlPosition.RIGHT);

        // 카카오 지도 API 끝

        // item1에 spot 리스트 넣기
        var list = <?php echo json_encode($list)?>;
        for(var i=0; i<list.length; i++){
            $("#item1").append('<div class="spot_iter" id="list_id_'+i+'">'+list[i].title+' <span class="category_button">'+list[i].category+' | '+list[i].subcategory+'</span></div>');
        }
        // 스팟 클릭시 화면 옮기기 & 핀 세우기
        $(".spot_iter").click(function(){
            var index = $(this).index();
            var entity = list[index];
            var latLngToMove = new kakao.maps.LatLng(entity.y, entity.x);
            map.panTo(latLngToMove);
            marker.setPosition(latLngToMove);
            marker.setMap(map);
        });
    });
</script>

<style>
    .spot_iter {
        border : 1px solid black;
    }
</style>