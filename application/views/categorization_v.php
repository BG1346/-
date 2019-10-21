<div id="container">
<div id="subcontainer">
<ul>
<br>
	<div id="categorization_category_list">
	</div>
</ul>
<ul>
	<div id="categorization_subcategory_list"></div>
</ul>
<br>
<select id="sort_category"  onchange="sort_category(this.value)">
	<option value="default">--정렬--</option>
	<option value="latest_date">최신순</option>
	<option value="oldest_date" id="test33">오래된순</option>
	<option value="ASC_alphabet">가나다순</option>
	<option value="DESC_like">좋아요수</option>
	<option value="DESC_hits">조회수</option>
</select>
<br>
<div id="categorization_spot_list"></div>
<div id="categorization_spot_more"></div>
</div>
</div>
</body>

<script>
function sort_category(opt){
	var url = '/index?'
	if(opt == 'latest_date')	url += 'pred=ASC&pred_column=id&selected_pred=latest_date';
	else if(opt == 'oldest_date')	url += 'pred=DESC&pred_column=id&selected_pred=oldest_date';
	else if(opt == 'ASC_alphabet')	url += 'pred=ASC&pred_column=title&selected_pred=ASC_alphabet';
	else if(opt== 'DESC_like')	url += 'pred=DESC&pred_column=like&selected_pred=DESC_like';
	else if(opt== 'DESC_hits')	url += 'pred=DESC&pred_column=hits&selected_pred=DESC_hits';
	else return;
	location.replace(url);
}
<?php 	if(isset($_GET['selected_pred'])){ ?>
			$("#sort_category").val('<?php echo $_GET['selected_pred'] ?>').attr('selected', true);
<?php
		}
?>
$(function(){
	// if(isset($_GET['select_pred'])){
		// $("#sort_category").prop('selected', $("#sort_category").eq(1) );
	// }
	// spot들 리스트. 
	var categorization_spot = <?php echo json_encode($spot_list); ?>;
	// 스팟들 뷰에 추가하기
	for(var i=0 ; i<categorization_spot.length ; i++){
			$("#categorization_spot_list").append('<div class="categorization_spot_iter"><div id="card_item1"><a href="/index/spot_view?id='+categorization_spot[i].id+'"><img src="/image/'+categorization_spot[i].imagepath+'"></a></div><div id="card_item2"><a href="/index/spot_view?id='+categorization_spot[i].id+'">'+categorization_spot[i].title+'</a></div><div id="card_item3"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>&nbsp;'+categorization_spot[i].hits+'</div><div id="card_item4"><i id="heart" class="fas fa-heart"></i>&nbsp;'+categorization_spot[i].like+'</div><div id="card_item5">'+categorization_spot[i].desc+'</div>');
	}

	// 카테고리 추가 문
	<?php if(isset($category_list)){ ?>
		var categorization_category = <?php echo json_encode($category_list); ?>;
		var categorization_subcategory  = <?php echo json_encode($subcategory_list); ?>;
			
		// 카테고리 뷰에 추가하기 
		for(var i = 0 ; i<categorization_category.length ; i++){
			$("#categorization_category_list").append('<li class="categorization_category_iter"><a href="/index/categorize_page?category='+categorization_category[i].category+'">'+categorization_category[i].category+"</a></li>");
		}

		// 서브카테고리 뷰에 추가하기 
		<?php if(isset($_GET['category'])){ ?>
				for(var i=0 ; i<categorization_subcategory.length; i++){
						$("#categorization_subcategory_list").append('<li class="categorization_subcategory_iter"><a href="/index/categorize_page?category=<?php echo $_GET['category'];?>&subcategory='+categorization_subcategory[i].subcategory+'">'+categorization_subcategory[i].subcategory+'</li>');
				}
		<?php } ?>
	<?php } ?>
});
</script>