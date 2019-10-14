
<div class="jb-wrap">
    <div class="jb-image"><img src="/image/<?php echo $data->imagepath ?>" alt="error"></div>
        <div class="jb-text">
            <p id="title"><?php echo $data->title ?></p>
            <p>desc : <?php echo $data->desc ?></p>
            <p>like : <?php echo $data->like ?></p>
            <p>hits : <?php echo $data->hits ?></p>
        </div>
    </div>
</div>


<div id="view_content">
<br><br><br><br><br><br>
<h1>설명</h1>
content = <?php echo($data->content) ?><br>
<h1>주소</h1>
addr = <?php echo($data->addr) ?><br>
<h1>연락처</h1>
tel1 = <?php echo($data->tel1) ?><br>
tel2 = <?php echo($data->tel2) ?><br>
<h1> 운영, 휴무 시간</h1>
hours = <?php echo($data->hours) ?><br>
<h1> 좋아요 수 </h1>
likes = <?php echo($data->like) ?><br>

<!-- 카카오 지도-->
<h1>map</h1>
<div id="view_map"></div>
</div>
<script>
    var container = document.getElementById('view_map');
    var options = {
        // center: new kakao.maps.LatLng(33.450701, 126.570667),
        center: new kakao.maps.LatLng(<?php echo $data->x; ?>, <?php echo $data->y; ?>),
        level: 3
    };
    var map = new kakao.maps.Map(container, options);
</script>