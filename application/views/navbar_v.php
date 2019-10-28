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
	
<div class="category">
<br>
	<div class="row">
		<div></div><div></div>
		<div>
			<a id="mark" href="/">
				강릉관광요람
			</a>
		</div>
		<div>
			<ul id="nav_ul">
				<a href="/index/categorize_page"><li>관광지 분류</li></a>
				<a href="/index/map_page"><li>지도로 보기</li></a>
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
</div>