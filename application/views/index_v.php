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
<div>
	
	<form id="search" method="GET" action="/index/search">
	<br><br>
	<h2>게시글 검색</h2><br>
		<!-- <input type="button" value="검색" id="search_btn"/> -->
		<select name="opt">
			<option value="content_title" default>제목+내용</option>
			<option value="title">제목</option>
			<option value="content">내용</option>
		</select>
		<input type="text" name="s_word" id="q" onkeypress="board_search_enter(document.q);"/>
		<input type="button" id="search_btn" value="검색"/>
	</form>
</div>
<body>
<br>
<div class="container">
<div class="subcontainer">
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