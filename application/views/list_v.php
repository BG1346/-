<head>
	<style>
	table * {
		border : 1px solid blue;
	}
	img {
		width : 300px;
		height : 300px;
	}
	#thumb_image{
		display : inline-block;
	}	
	#thumb_image:hover{
		
	}
	</style>
</head>
<script>
		$(document).ready(function(){
			$("#search_btn").click(function(){
				if($("#q").val() == ''){
					alert('검색어를 입력해주세요.');
					return false;
				} else {
					var act = '/ggy/index/lists/store/q/'+$("#q").val()+'/page/1';
					$("#bd_search").attr('action', act).submit();
				}
			});
		});

		function board_search_enter(form) {
			var keycode = window.event.keyCode;
			if(keycode == 13) $("#search_btn").click();
		}
	</script>
	
	
<?php
foreach ($list as $lt)
{
?>
<div id ="thumb_image">
	<a href="index/view/<?php echo $lt->store_id?>"><img src ="<?php echo base_url();echo $lt->imagepath ;?>"></a><br>
	<a href="index/view/<?php echo $lt->store_id?>"><img src ="<?php "/".$lt->imagepath ;?>"></a><br>
	<?php echo "/".$lt->imagepath?>
	<center><?php echo $lt->name?></center>
</div>
<?php
}
?>

			</tbody>
			<tfoot>
				<tr>
                    <th colspan="5"><?php echo $pagination;?></th>
				</tr>
			</tfoot>
		</table>
		<div><p><a href="/bbs/board/write/<?php echo $this->uri->segment(3);?>/page/<?php echo $this->uri->segment(5);?>" class="btn btn-success">쓰기</a></p></div>
		<div>
		
			<form id="bd_search" method="post" class="well form-search">
			<h1>게시글 검색</h1><br>
				<i class="icon-search"></i> <input type="text" name="search_word" id="q" onkeypress="board_search_enter(document.q);" class="input-medium search-query" /> <input type="button" value="검색" id="search_btn" class="btn btn-primary" />
			</form>
		</div>
	</article>
