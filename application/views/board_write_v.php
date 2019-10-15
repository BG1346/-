<form>
    ID : <input type="text" name="author"><br>
    PASSWORD : <input type="password" name="password"><br>
    후기 : <input type="text" name="content"><br>
    course추가하기
    <div style="border : 2px solid black; width : 500px; height : 300px; overflow : scroll;">
<?php
    foreach ($list as $lt)
    {
?>
        <div id="each_map">
            <p><a href="/index/spot_view?id=<?php echo $lt->id; ?>"><?php echo $lt->title; ?></a></p>
            <p><?php echo $lt->addr; ?></p>
        </div>
<?php
    }       
?>

    </div>
    <input type="submit" value="쓰기">
</form>