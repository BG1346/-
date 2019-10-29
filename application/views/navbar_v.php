<script>
	$(document).ready(function(){
		$("#search_btn").click(function(){
			if($("#q").val() == ''){
				alert('검색어를 입력해주세요.');
				return false;
			}
			else {
				$("#search").submit();
			}
		});
	});
	function search(){
		location.replace("/index/categorize_page?s_word="+$("#s_word").val());
	}
</script>
	

	<div id="nav_row">
		<!-- <div></div><div></div> -->
		<div id="mark_wrapper">
			<a id="mark" href="/">
				강릉관광요람
			</a>
		</div>
		<div>
			<ul class="nav nav-justified">
				<li><a href="/index/categorize_page">관광지 분류</a></li>
				<li><a href="/index/map_page">지도로 보기</a></li>
				<li><a href="/index/categorize_page">코스</a></li>
			</ul>
		</div>
		<div>
			<div class="input-group">
				<input type="text" class="form-control" placeholder="Search for..." id="s_word">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button" onclick="search()">검색</button>
				</span>
			</div>
		</div>
	</div>