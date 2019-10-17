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
<div id="search_box">
    <form id="search" method="GET" action="/index/search">
        <select name="opt_board" class="select-css">
			<option value="content_title" selected>관광지</option>
		</select>
		<select name="opt" class="select-css">
			<option value="content_title" selected>제목+내용</option>
			<option value="title">제목</option>
			<option value="content">내용</option>
		</select>
		<input type="text" name="s_word" id="q" onkeypress="board_search_enter(document.q);"/>
		<input type="button" id="search_btn" value="검색"/>
    </form>
</div>
<div class="category_ghost">
</div>
<div class="category">
    <br>
    <a id="mark" href="/">
        강릉관광요람
    </a>
    <ul>
        <a href="/index/categorize_page"><li>관광지 분류</li></a>
		<li>|</li>
        <a href="/index/map_page"><li>지도로 보기</li></a>
    </ul>
    <br>
</div>