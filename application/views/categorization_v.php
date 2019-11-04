<head>
	<link rel="stylesheet" type="text/css" href="/css/categorization.css">
</head>
<div class="container">
<p id="category_name">Spotlist</p>
<div id="categorization_category_list_wrapper">
	<div></div>
	<div>
		<ul class="nav nav-justified dropdown" id="categorization_category_list"></ul>
	</div>
	<div></div>
</div>
<br>
<div id="categorization_spot_list_wrapper">
	<div id="categorization_spot_list"></div>
</div>
<div id="categorization_spot_more"></div>
</div>
<script>
	var categorization_category = <?php echo json_encode($category_list); ?>;
	var categorization_subcategory  = <?php echo json_encode($subcategory_list); ?>;
	var categorization_spot = <?php echo json_encode($spot_list); ?>;
	var like_list = <?php echo json_encode($like_list); ?>;
	function sort_category(opt){
		var url = '/index/categorize_page?'
		if(opt == 'latest_date')	url += 'pred=ASC&pred_column=id&selected_pred=latest_date';
		else if(opt == 'oldest_date')	url += 'pred=DESC&pred_column=id&selected_pred=oldest_date';
		else if(opt == 'ASC_alphabet')	url += 'pred=ASC&pred_column=title&selected_pred=ASC_alphabet';
		else if(opt== 'DESC_like')	url += 'pred=DESC&pred_column=like&selected_pred=DESC_like';
		else if(opt== 'DESC_hits')	url += 'pred=DESC&pred_column=hits&selected_pred=DESC_hits';
		else return;
		<?php if(isset($_GET['category'])){ ?>	url += '&category=<?php echo $_GET['category']; ?>'; <?php }?>
		<?php if(isset($_GET['subcategory'])){ ?>	url += '&subcategory=<?php echo $_GET['subcategory']; ?>'; <?php }?>
		location.replace(url);
	}
	function list_append(start, end){
		if(end >= categorization_spot.length){
			end = categorization_spot.length;
			$(".categorization_spot_iter_end").hide();
		}
		console.log(start, end, categorization_spot.length);
		for(var i=start ; i<end ; i++){
			var like_context ;
			if(like_list[categorization_spot[i].id] == 1)
				like_context = '<img id="card_heart_btn" src="/image/btn_heart_on.png" width="10px">';
			else
				like_context = '<img id="card_heart_btn" src="/image/btn_heart_off.png" width="10px">';
			$("#categorization_spot_list").append(
				'<div class="categorization_spot_iter_wrapper">'+
				'<div class="categorization_spot_iter">'+
				'	<div id="card_item1">'+
				'		<a href="/index/spot_view?id='+categorization_spot[i].id+'">'+
				'		<img id="card_item1_img" src="/image/'+categorization_spot[i].imagepath+'"></a>'+
				'	</div>'+
				'	<div id="card_item2">'+
				'		<a href="/index/spot_view?id='+categorization_spot[i].id+'"><span class="category_spot_category">'+categorization_spot[i].category+'</span>&nbsp&nbsp'+categorization_spot[i].title+'</a>'+
				'	</div>'+
				'	<div id="card_item3">'+'</div>'+
				'	<div id="card_item4"><span class="category_spot_category">'+
				like_context+
				'&nbsp;'+categorization_spot[i].like+
				'	</div>'+
				'</span></div>'+
				'</div>'
			);
		}
	}

$(document).ready(function(){
	// 카테고리 추가 문
	<?php if(isset($category_list)){ ?>
		var categorization_category = <?php echo json_encode($category_list); ?>;
		var categorization_subcategory  = <?php echo json_encode($subcategory_list); ?>;
			
		// 카테고리 뷰에 추가하기 
		$("#categorization_category_list").append('<li class="categorization_category_iter"><a class="categorization_category_iter_a" href="/index/categorize_page">all</a></li>');
		for(var i = 0 ; i<categorization_category.length ; i++){
			$("#categorization_category_list").append('<li class="categorization_category_iter"><a class="categorization_category_iter_a" href="/index/categorize_page?category='+categorization_category[i].category+'">'+categorization_category[i].category+"</a></li>");
		}

		// 서브카테고리 뷰에 추가하기 
		<?php if(isset($_GET['category'])){ ?>
				for(var i=0 ; i<categorization_subcategory.length; i++){
					$("#categorization_subcategory_list").append('<li class="categorization_subcategory_iter"><a href="/index/categorize_page?category=<?php echo $_GET['category'];?>&subcategory='+categorization_subcategory[i].subcategory+'">'+categorization_subcategory[i].subcategory+'</li>');
				}
		<?php } ?>
	<?php } ?>
			


	<?php if(isset($_GET['selected_pred'])){ ?>
		$(".categorization_iter[value='<?php echo $_GET['selected_pred'] ?>'").addClass('active');
	<?php } else{?>
		$(".categorization_iter[value='random']").addClass('active');
	<?php } ?>

	// spot들 리스트. 
	
	// console.log($_GET["spot_list"]);
	// 스팟들 뷰에 추가하기
	
	iter_for_row = $(".container").width();
	iter_for_row = parseInt(iter_for_row/350);
	cur_iter = iter_for_row*2;
	if(cur_iter > categorization_spot.length){
		cur_iter = categorization_spot.length;
	}
	list_append(0, cur_iter);

	$("#categorization_spot_more").append(
		// console.log('difhsli');
		'<div class="categorization_spot_iter_end">'+
				'<p>MORE</p>'+
		'</div>'
	);
	

	$("#categorization_spot_more").click(function(){
		next_iter = cur_iter + iter_for_row*2;
		list_append(cur_iter, next_iter);
		cur_iter = next_iter;
	});
})

</script>