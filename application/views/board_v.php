<br><br><br><br>
<div id="board"></div>
<?php
// spot 테이블 전체 반환
if(empty($list)){
	echo '내용이 존재하지 않습니다. ';
}
else{
	foreach ($list as $lt)
	{
	?>
	<div id ="course_card">
		<div id="item1"><a href="/index/view?id=<?php echo $lt->id; ?>"></a></div>
		<div id="item2"><a href="/index/view?id=<?php echo $lt->id; ?>"><?php echo $lt->title; ?></a></div>
		<div id="item3"><?php echo $lt->author;  ?></div>
		<div id="item4"><?php echo $lt->content;  ?></div>
	</div>

	<?php
	}
}
?>