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

$(function(){
	<?php if(isset($_GET['selected_pred'])){ ?>
		$(".categorization_iter[value='<?php echo $_GET['selected_pred'] ?>'").addClass('active');
	<?php } else{?>
		$(".categorization_iter[value='random']").addClass('active');
	<?php } ?>
	// spot들 리스트. 
	var categorization_spot = <?php echo json_encode($spot_list); ?>;
	// 스팟들 뷰에 추가하기
	
	iter_for_row = $(".container").width();
	iter_for_row = parseInt(iter_for_row/240);
	cur_iter = iter_for_row*2-1;
	if(cur_iter > categorization_spot.length){
		cur_iter = categorization_spot.length;
	}
	for(var i=0 ; i<cur_iter ; i++){
		$("#categorization_spot_list").append(
			'<div class="categorization_spot_iter">'+
			'	<div id="card_item1">'+
			'		<a href="/index/spot_view?id='+categorization_spot[i].id+'">'+
			'		<img id="card_item1_img" src="/image/'+categorization_spot[i].imagepath+'"></a>'+
			'	</div>'+
			'	<div id="card_item2">'+
			'		<a href="/index/spot_view?id='+categorization_spot[i].id+'">'+categorization_spot[i].title+'</a>'+
			'	</div>'+
			'	<div id="card_item3"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>&nbsp;'+categorization_spot[i].hits+'</div>'+
			'	<div id="card_item4">'+
			'		<i id="heart" class="fas fa-heart"></i>&nbsp;'+categorization_spot[i].like+
			'	</div>'+
			'</div>'
		);
	}
	if(cur_iter < categorization_spot.length){
		$("#categorization_spot_more").append(
			'<div class="categorization_spot_iter_end">'+
				'<div id="innerCircle">'+
					'<img src="/image/plus.png">'+
					'<h3>더보기</h3>'+
				'</div>'+
			'</div>'
		);
	}

	$("#categorization_spot_more").click(function(){
		next_iter = cur_iter + iter_for_row*2;
		if(next_iter >= categorization_spot.length){
			next_iter = categorization_spot.length;
			$(".categorization_spot_iter_end").hide();
		}
		for(var i=cur_iter ; i<next_iter ; i++){
			$("#categorization_spot_list").append(
				'<div class="categorization_spot_iter">'+
				'<div id="card_item1">'+
				'	<a href="/index/spot_view?id='+categorization_spot[i].id+'">'+
				'	<img id="card_item1_img" src="/image/'+categorization_spot[i].imagepath+'"></a>'+
				'</div>'+
				'<div id="card_item2">'+
				'	<a href="/index/spot_view?id='+categorization_spot[i].id+'">'+categorization_spot[i].title+'</a>'+
				'</div>'+
				'<div id="card_item3"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>&nbsp;'+categorization_spot[i].hits+'</div>'+
				'<div id="card_item4">'+
				'	<i id="heart" class="fas fa-heart"></i>&nbsp;'+categorization_spot[i].like+
				'</div>'+
				'</div>'
			);
		}
		cur_iter = next_iter;
	});

	

	// 카테고리 추가 문
	<?php if(isset($category_list)){ ?>
		var categorization_category = <?php echo json_encode($category_list); ?>;
		var categorization_subcategory  = <?php echo json_encode($subcategory_list); ?>;
			
		// 카테고리 뷰에 추가하기 
		$("#categorization_category_list").append('<li class="categorization_category_iter"><a href="/index/categorize_page">all</a></li>');
		for(var i = 0 ; i<categorization_category.length ; i++){
			$("#categorization_category_list").append('<li class="categorization_category_iter"><a href="/index/categorize_page?category='+categorization_category[i].category+'">'+categorization_category[i].category+"</a></li>");
		}

		// for(var i = 0 ; i<categorization_category.length ; i++){
		// 	$("#categorization_category_list2").append('<li class="categorization_category_iter"><a href="/index/categorize_page?category='+categorization_category[i].category+'">'+categorization_category[i].category+"</a></li>");
		// }


		// 서브카테고리 뷰에 추가하기 
		<?php if(isset($_GET['category'])){ ?>
				for(var i=0 ; i<categorization_subcategory.length; i++){
					$("#categorization_subcategory_list").append('<li class="categorization_subcategory_iter"><a href="/index/categorize_page?category=<?php echo $_GET['category'];?>&subcategory='+categorization_subcategory[i].subcategory+'">'+categorization_subcategory[i].subcategory+'</li>');
				}
		<?php } ?>
	<?php } ?>

		// $(window).scroll(function(){
        //     let $window = $(this);
		// 	$("#scroll1").text(window);
        //     let scrollTop = $window.scrollTop();
		// 	$("#scroll2").text(scrollTop);
		// 	console.log(scrollTop);
        //     let windowHeight = $window.height();
		// 	$("#scroll3").text(windowHeight);
        //     let documentHeight = $(document).height();
		// 	$("#scroll4").text(documentHeight);
            
        //     // console.log("documentHeight:" + documentHeight + " | scrollTop:" + scrollTop + " | windowHeight: " + windowHeight );
            
        //     // // scrollbar의 thumb가 바닥 전 30px까지 도달 하면 리스트를 가져온다.
        //     // if( scrollTop + windowHeight + 30 > documentHeight ){
        //     //     fetchList();
        //     // }
        // })
	});