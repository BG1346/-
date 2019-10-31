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
	$('#s_word').keydown(function(e) {
        if (e.keyCode == 13) {
            $("#search_btn").click();
        }
    });
});
function search(){
	location.replace("/index/categorize_page?s_word="+$("#s_word").val());
}