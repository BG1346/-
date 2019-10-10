<head>
</head>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
		$(document).ready(function(){
			$("#search_btn").click(function(){
				if($("#q").val() == ''){
					alert('검색어를 입력해주세요.');
					return false;
				}
				else {
					// var act = '/index/search?id=3';
					// $("#search").attr('action', act).submit();
					$("#search").submit();
				}
			});
		});
		function board_search_enter(form) {
			var keycode = window.event.keyCode;
			if(keycode == 13) $("#search_btn").click();
		}
</script>
<body>
<div class="container">
<div class="subcontainer">
<br>
<ul>
<?php
foreach($category as $iter){
        ?>
        <li>
        	<a href="/index?category=<?php echo $iter->category?>"><?php echo $iter->category?></a>
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
            <a href="/index?category=<?php echo $_GET['category']?>&subcategory=<?php echo $iter->subcategory?>" id="title">
            <?php echo $iter->subcategory?>
            </a>
        </li>
        <?php
        
    }
?>
</ul>
</div>
<?php

// spot 테이블 전체 반환
if(empty($list)){
	echo '내용이 존재하지 않습니다. ';
}
else{
	foreach ($list as $lt)
	{
	?>
	<div id ="card">
		<div id="item1"><a href="/index/view?id=<?php echo $lt->id; ?>"><img src="/image/<?php echo $lt->imagepath?>"></a></div>
		<div id="item2"><a href="/index/view?id=<?php echo $lt->id; ?>"><?php echo $lt->title; ?></a></div>
		<div id="item3"><?php echo $lt->hits;  ?></div>
		<div id="item4"><?php echo $lt->desc;  ?></div>
	</div>

	<?php
	}
}
?>
</div>
</div>
			</tbody>
			<tfoot>
				<tr>
                    <!-- <th colspan="5"><?php echo $pagination;?></th> -->
				</tr>
			</tfoot>
		</table>
</body>