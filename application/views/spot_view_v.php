
<div class="jb-wrap">
    <div class="jb-image"><img src="/image/<?php echo $data->imagepath ?>" alt="error"></div>
        <div class="jb-text">
            <p id="title"><?php echo $data->title ?></p>
            <p><?php echo $data->desc ?></p>
            <i class="fas fa-heart"></i>
            <i class="far fa-heart"></i>
            <p><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>&nbsp;&nbsp;<?php echo $data->like ?></p>
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
</script>