<head>
    <link rel="stylesheet" type="text/css" href="/css/map_css.css">
    <style>
    @media screen and (min-width: 1024px) {
        #map_category_name {
            padding-top : 40px;
            text-align: center;
            font-size : 18px;
            line-height : 20px;
            color : #AAAAAA;
            font-family : NanumBarunGothic;
        }
        #map_category_list_wrapper{
            /* display : grid; */
            /* grid-template-columns : 33% 33% 33%; */
        }
        #map_category_list_wrapper * {
            color : #AAAAAA;
        }
            #map_category_list{
                padding : 0;
                margin : 0;
                text-align : center;
            }
            #map_category_list li {
                list-style-type : none;
                display : inline-block;
                margin : 0 30px 0 30px;
            }
        .spot_iter{
            padding : 15px;
            /* margin : 20px; */
        }
        .map_table_i_1{
            /* font: Regular 16px/19px */
            font-size : 16px;
            line-height : 19px;
        }
        .map_table_i_2{
            color: #AAAAAA;
        }
        #map_container{
            margin-top : 50px;
            display : grid;
            grid-template-columns : 30% 70%;
            height : 80%;
            max-height : 500px;
        }
        #pagination_div_wrapper{
            display : grid;
            grid-template-columns : 30% 70%;
        }
        #pagination_list{
            padding : 0px;
            text-align : center;
            height : 10px;
        }
        #map_overlay{
            display : grid;
            grid-template-columns: 50% 50%;
            width : 250px;
            height : 100px;
            border : 1px solid black;
            background-color : white;
            border-radius : 10px;
            opacity : 3;
            z-index : 2;
            margin-bottom : 10px;
        }
        #overlay_pin_background {
            z-index : 1;
            display : none;
            position : absolute;
            left : -25px;   
        }
        #overlay_image_wrapper {
            margin : 6px 6px 6px 6px;
            height : 86px;
        }
        #overlay_image{
            width : 100%;
            height : 100%;
            border-radius : 10px;
            border : 1px solid gray;
        }
        #overlay_two{
            text-align : center;
            padding : 6px;
            padding-top : 12px;
            z-index : 2;
        }
        #overlay_one{
            z-index : 2;
        }
        pagination_wrapper > * {   
            margin-left : 5px;
        }
        pagination_wrapper * {
            color : #AAAAAA;
        }
        pagination_cur_tag{
            color : #CC7B33;
        }
        #mobile_overlay_wrapper {
            display : none;
        }
    }
    @media screen and (max-width: 1023px) {
        .container { 
            padding : 0px;
        }
        #map_category_name {
				padding-top : 20px;
				text-align: center;
				font-size : 18px;
				line-height : 20px;
				color : #AAAAAA;
                font-family : NanumBarunGothic;
                margin : 0;
			}
			#map_category_list_wrapper *{
				color : #AAAAAA;
			}
			#map_category_list{
				padding : 0;
				margin : 0;
				text-align : center;
			}
			#map_category_list li {
				list-style-type : none;
				display : inline-block;
				margin : 0 10px 0 10px;
            }
        .spot_iter {
            display : none;
        }			
        #pagination_div_wrapper{
            display : none;
        }
        #kakao_map{
            width : 100%;
            height : 60%;
            margin-top : 20px;
        }
        #map_overlay{
            display : grid;
            grid-template-columns: 50% 50%;
            
            width : 250px;
            height : 100px;
            border : 1px solid black;
            background-color : white;
            border-radius : 10px;
            opacity : 3;
            z-index : 2;
            /* margin-bottom : 10px; */

            /* display : none; */
            /* padding : 20px; */
            /* border : 10px solid red; */
            /* bottom : 300px; */
            /* position : relative; */
            /* position : absolute; */
            /* left : 100%; */
            /* top : 80%; */
            /* height : 20%; */
        }
        #map_overlay{
            position : absolute;
            top : 100%;
        }
        #overlay_image_wrapper {
            margin : 6px 6px 6px 6px;
            height : 86px;
        }
        #overlay_image{
            width : 100%;
            height : 100%;
            border-radius : 10px;
            border : 1px solid gray;
        }
        #overlay_two{
            text-align : center;
            padding : 6px;
            padding-top : 12px;
            z-index : 2;
        }
        #overlay_one{
            z-index : 2;
        }
        #mobile_overlay_wrapper {
            display : none;
            z-index : 5;
            background-color : white;
            width : 100%;

            position : absolute;
        }
            #mobile_overlay{
                padding : 10px;
            }
            #mobile_overlay *{
                margin : 2px;
                color : #AAAAAA;
                font-size : 0.8em;
            }
            #mobile_overlay_title {
                font-size : 1em;
            }
            #mobile_overlay_like_anchor {
                margin : 0;
            }
            #mobile_overlay_like {
                position : absolute;
                right : 10;
            }
            #mobile_overlay_desc {
                color : #CC7B33;
            }
    }
    </style>
</head>
<div class="container">
    <p id="map_category_name">Map</p>
    <br>
    <div id="map_category_list_wrapper">
        <div></div>
        <div>
            <ul id="map_category_list"></ul>
        </div>
        <div></div>
    </div>
<div id="map_container">
    <div id="map_list">
<?php
foreach ($pagination_list as $lt)
{
?>
        <div class="spot_iter">
            <span class="map_table_i_1"><?php echo $lt->title ?></span>
            <br>
            <span class="map_table_i_2"><?php echo $lt->desc ?></span>
            <br>
        </div>
<?php
}
?>
            
    </div>
    <div id="kakao_map">
    </div>
</div>
<div id="mobile_overlay_wrapper">
    <div id="mobile_overlay">
        <a id="mobile_overlay_like_anchor">
            <img id="mobile_overlay_like">
        </a>
        <a id="mobile_overlay_title">test_title</a>
        <p id="mobile_overlay_addr">test_addr</p>
        <p id="mobile_overlay_tel">test_tel</p>
        <p id="mobile_overlay_desc">test_desc</p>
    </div>
</div>
<div id="pagination_div_wrapper">
    <div id="pagination_list">
        <?php echo $pagination;?>
    </div>
</div>



    <div id="map_wrapper">
        <!-- <div id="item1">
        </div>
        <div id="item2">
            <div id="right_map">
            </div>
        </div> -->
    </div>
</div>
<script>
    <?php if(isset($category_list)){ ?>
		var categorization_category = <?php echo json_encode($category_list); ?>;
		var categorization_subcategory  = <?php echo json_encode($subcategory_list); ?>;
			
		// 카테고리 뷰에 추가하기 
        $("#map_category_list").append(
                '<li class="map_category_iter">'+
                '   <a href="/index/map_page">all</a>'+
                '</li>'
        );
		for(var i = 0 ; i<categorization_category.length ; i++){
			$("#map_category_list").append(
                '<li class="map_category_iter">'+
                '   <a href="/index/map_page?category='+categorization_category[i].category+'">'+categorization_category[i].category+'</a>'+
                '</li>'
            );
		}

		// 서브카테고리 뷰에 추가하기 
	// 	<?php if(isset($_GET['category'])){ ?>
	// 			for(var i=0 ; i<categorization_subcategory.length; i++){
	// 					$("#map_subcategory_list").append(
    //                     '<li class="map_subcategory_iter">'+
    //                         '<a href="/index/map_page?category=<?php echo $_GET['category'];?>&subcategory='+categorization_subcategory[i].subcategory+'">'+
    //                             categorization_subcategory[i].subcategory+
    //                         '</a>'+
    //                     '</li>');
	// 			}
	// 	<?php } ?>
	<?php } ?>
    
    // 카카오 지도 API
    var container = document.getElementById('kakao_map');
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
        // // 클릭한 위도, 경도 정보를 가져옵니다 
        // var latlng = mouseEvent.latLng; 
        // // alert(typeof(latlng));
        // // 마커 위치를 클릭한 위치로 옮깁니다
        // marker.setPosition(latlng);
        // marker.setMap(map);
        // customOverlay.setMap(null);
    }); 
    // 맨처음 spot을 클릭할 때 다른 모든 marker를 setMap(null)해줘야 함. 그다음부터는 비효율적인 setMap(null)을 방지하기 위한 bool변수
    var initMarker = 0;
    

    // overlay initiation
    // 마커 오버레이(마커 위에 정보 팜업)
    var content = 
    '<div id="map_overlay">'+
    '   <div id="overlay_one">'+
    '      <a class="overlay_link" href="">'+
    '          <div id="overlay_image_wrapper">'+
    '               <image id="overlay_image">'+
    '          </div>'+
    '      </a>'+
    '   </div>'+
    '   <div id="overlay_two">'+
    '      <p id="overlay_title"></p>'+
    '      <p id="overlay_like"></p>'+
    '      <a class="overlay_link" href="">보러가기</a>&nbsp;&nbsp;'+
    '      <a onclick="closeOverlay()">닫기</a>'+
    '   </div>'+
    '</div>';

    customOverlay = new kakao.maps.CustomOverlay({
        position: null,
        content: content,
        xAnchor: 0.5,
        yAnchor: 1.3
    });
    // 카카오 지도 API 끝


    // get_curMarker = function(){
    //     return new kakao.maps.Marker({ 
    //         position: new kakao.maps.LatLng(list[i].y, list[i].x),
    //     }); 
    // };
    // item1에 spot 리스트 넣기
    var pagination_list = <?php echo json_encode($pagination_list)?>;
    var spot_list = <?php echo json_encode($spot_list)?>;
    
    var markerlist = [];
    if(window.innerWidth <= 1024)
        var listLen = spot_list.length;
    else
        var listLen = pagination_list.length;
    for(var i=0; i<listLen; i++){
        // $("#item1").append(
        // '<div class="spot_iter" id="list_id_'+i+'">'
        //     +'<div class="spot_iter_left">'
        //         +'<div class="spot_iter_left_wrapper">'
        //         +'<p class="spot_iter_title">'
        //             +list[i].title + '&nbsp;&nbsp;&nbsp;'
        //             +'<span class="spot_iter_category">'
        //             +list[i].category
        //             +'</span>'
        //         +'</p>'
        //         +'</div>'
        //     +'</div>'
        //     // +' <span class="category_button"><a href="/index/map?category='+list[i].category+'"></a>'+list[i].category+'</a> | '+list[i].subcategory+'</span>'
        //     +'<div class="spot_iter_image_wrapper">'
        //         +'<img src="/image/'+list[i].imagepath+'">'
        //     +'</div>'
        // +'</div>'
        // );
        var curMarker = new kakao.maps.Marker({ 
            position: new kakao.maps.LatLng(spot_list[i].y, spot_list[i].x),
        }); 
        curMarker.id = spot_list[i].id;
        curMarker.title = spot_list[i].title;
        curMarker.like = spot_list[i].like;
        curMarker.imagepath = spot_list[i].imagepath;
        curMarker.addr = spot_list[i].addr;
        curMarker.tel = spot_list[i].tel1;
        curMarker.desc = spot_list[i].desc;
        
        // var curMarker = new get_curMarker();
        curMarker.setMap(map);
        markerlist.push(curMarker);
        kakao.maps.event.addListener(curMarker, 'click', function(mouseEvent) {        
            if(window.innerWidth >= 1024){
                var latLngToMove = this.getPosition();
                customOverlay.setPosition(latLngToMove);
                if(customOverlay.getMap() == null)
                    customOverlay.setMap(map);
                $("#overlay_title").text(this.title);
                $("#overlay_image").attr('src', '/image/'+this.imagepath);
                $(".overlay_link").attr('href', '/index/spot_view?id='+this.id);
                map.setCenter(latLngToMove);
            }
            else{
                var latLngToMove = this.getPosition();
                map.setCenter(latLngToMove);
                $("#mobile_overlay_wrapper").show();
                $("#mobile_overlay_title").text(this.title);
                $("#mobile_overlay_title").attr('href', '/index/spot_view?id='+this.id);
                $("#mobile_overlay_addr").text(this.addr);
                $("#mobile_overlay_tel").text(this.tel);
                $("#mobile_overlay_desc").text(this.desc);

                // $("#mobile_overlay_like").attr('src', '/image/btn_heart_on.png');
                $.ajax({
                    url:'/index/check_if_i_like?ajax=t&id='+this.id,
                    // url:'/index/check_if_i_like?ajax=t',
                    success:function(data){
                        if(data == '0'){
                            $("#mobile_overlay_like").attr('src', '/image/btn_heart_off.png');
                        }
                        else{
                            $("#mobile_overlay_like").attr('src', '/image/btn_heart_on.png');
                        }
                    }
                })
                $("#mobile_overlay_like_anchor").attr('onclick', 'mobile_toggle_like('+this.id+')');
                $("#kakao_map").css('height', '60%');
                $("#kakao_map").css('height', $("#kakao_map").height() - $("#mobile_overlay_wrapper").height());
                // $('html').animate({scrollTop : offset.top}, 400);
                var offset = $("#mobile_overlay_wrapper").offset().top;
                $('html, body').animate({scrollTop : offset}, 1);
            }
        }); 
    }

    //when click heart button on overlay
    function mobile_toggle_like(id){
        $.ajax({
            url:'/index/toggle_like?ajax=t&id='+id,
            success:function(data){
                if(data == '0')
                    $("#mobile_overlay_like").attr('src', '/image/btn_heart_off.png');
                if(data == '1')
                    $("#mobile_overlay_like").attr('src', '/image/btn_heart_on.png');
            }
        })
    }

    // 스팟 클릭시 화면 옮기기 & 핀 세우기
    $(".spot_iter").click(function(){
        var index = $(this).index();
        var entity = pagination_list[index];
        var latLngToMove = new kakao.maps.LatLng(entity.y, entity.x);
        map.setCenter(latLngToMove);

        //marker
        if(!initMarker){
            for(var i =0 ;i<markerlist.length ; ++i){
                // markerlist[i].setMap(null);
            }
            initMarker = true;
        }
        marker.setPosition(latLngToMove);
        marker.setMap(map);

        //overlay
        customOverlay.setPosition(latLngToMove);
        if(customOverlay.getMap() == null)
            customOverlay.setMap(map);
        $("#overlay_title").text(entity.title);
        $("#overlay_image").attr('src', '/image/'+entity.imagepath);
        $(".overlay_link").attr('href', '/index/spot_view?id='+entity.id);
    });
    function closeOverlay(event){
        customOverlay.setMap(null);
    };
    // $(document).ready(function(){
        <?php if(isset($_GET['category'])){ ?>
            console.log('hh');
            var offset = $("#mobile_overlay_wrapper").offset().top;
            $('html, body').animate({scrollTop : offset + $("#kakao_map").height()}, 1);
            console.log(offset + $("#kakao_map").height());
        <?php }?>
    // }
</script>

<style>
</style>