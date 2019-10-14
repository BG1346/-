<div id="map_container">
</div>
<?php 
foreach($category as $iter){
?>
                <li>
                    <a href="/index/categorize_page?category=<?php echo $iter->category?>"><?php echo $iter->category?></a>
                </li>
<?php
        }
?>
        </ul>
        <br>
        <div class="subcategory">
        <ul>
<?php 
            foreach($subcategory as $iter){
?>
                <li>
                    <a href="/index/categorize_page?category=<?php echo $_GET['category']?>&subcategory=<?php echo $iter->subcategory?>" id="title">
                    <?php echo $iter->subcategory?>
                    </a>
                </li>
<?php
            }
?>
        </ul>
<div id="map_wrapper">
<?php
    if(empty($list)){
        echo '내용이 존재하지 않습니다. ';
    }
    else{
?>
    <div id="item1">
<?php
        foreach ($list as $lt)
        {
?>
        <div id="each_map">
            <p><?php echo $lt->title; ?></p>
            <p><?php echo $lt->addr; ?></p>
        </div>
        <?php
        }
    }
    ?>
    </div>
    <div id="item2">
        <div id="map_list">
        </div>        
    </div>
</div>
<script>
    var container = document.getElementById('map_list');
    var options = {
        center: new kakao.maps.LatLng(33.450701, 126.570667),
        level: 3
    };
    var map = new kakao.maps.Map(container, options);
</script>