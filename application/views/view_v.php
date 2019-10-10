<style>
    .jb-wrap{
        margin-bottom : 100px;
    }
</style>
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
<?php
print_r($data);
?>
<br><br><br><br><br><br>
content = <?php echo($data->content) ?><br>
addr = <?php echo($data->addr) ?><br>
category = <?php echo($data->category) ?><br>
subcategory = <?php echo($data->subcategory) ?><br>
fburl = <?php echo($data->fburl) ?><br>
instaurl = <?php echo($data->instaurl) ?><br>
instahashtag = <?php echo($data->instahashtag) ?><br>
tel1 = <?php echo($data->tel1) ?><br>
tel2 = <?php echo($data->tel2) ?><br>
hours = <?php echo($data->hours) ?><br>
likes = <?php echo($data->like) ?><br>
lat = <?php echo($data->lat) ?><br>
long = <?php echo($data->long) ?><br>
</div>