<div id="container">
<div id="subcontainer">
<br>
<!-- <center><a href="/index/categorize_page">모두 보기</a></center> -->
<ul>
<br>
	<div id="categorization_category_list">
	</div>
</ul>
<ul>
	<div id="categorization_subcategory_list"></div>
</ul>
<br>
<br>
<div id="categorization_spot_list"></div>
<div id="categorization_spot_more"></div>
</div>
</div>
</body>

<script>
	console.log('dfkljs');
$(function(){
	// spot들 리스트. 
	var categorization_spot = <?php echo json_encode($spot_list); ?>;

	// 스팟들 뷰에 추가하기
	for(var i=0 ; i<categorization_spot.length ; i++){
			$("#categorization_spot_list").append('<div class="categorization_spot_iter"><div id="card_item1"><a href="/index/spot_view?id='+categorization_spot[i].id+'"><img src="/image/'+categorization_spot[i].imagepath+'"></a></div><div id="card_item2"><a href="/index/spot_view?id='+categorization_spot[i].id+'">'+categorization_spot[i].title+'</a></div><div id="card_item3">'+categorization_spot[i].hits+'</div><div id="card_item4">'+categorization_spot[i].desc+'</div></div>');
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