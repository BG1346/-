<head>
<link rel="stylesheet" type="text/css" href="/css/spotlist_css.css">
</head>

<div class="container">

<p id="category_name">Spotlist</p>
<br>
<div id="categorization_category_list_wrapper">
	<div></div>
	<div>
		<ul id="categorization_category_list"></ul>
	</div>
	<div></div>
</div>
<br>
<button><a href="/admin/spotlist_write">글쓰기</a></button>
<div id="categorization_spot_list_wrapper">
	<div id="categorization_spot_list"></div>
</div>
<div id="loading"></div>
</div>
<script>
	var categorization_category = <?php echo json_encode($category_list); ?>;
	var categorization_subcategory  = <?php echo json_encode($subcategory_list); ?>;
	var categorization_spot = <?php echo json_encode($spot_list); ?>;
	var desktop_view = $(window).width() >= 1024 ? 1 : 0;
	var mobile_view = $(window).width() < 1024 ? 1 : 0;
	var padding_num = 0;
	function sort_category(opt){
		var url = '/index/categorize_page?'
		if(opt == 'latest_date')	url += 'pred=ASC&pred_column=id&selected_pred=latest_date';
		else if(opt == 'oldest_date')	url += 'pred=DESC&pred_column=id&selected_pred=oldest_date';
		else if(opt == 'ASC_alphabet')	url += 'pred=ASC&pred_column=title&selected_pred=ASC_alphabet';
		else if(opt == 'DESC_like')	url += 'pred=DESC&pred_column=like&selected_pred=DESC_like';
		else if(opt == 'DESC_hits')	url += 'pred=DESC&pred_column=hits&selected_pred=DESC_hits';
		else return;
		<?php if(isset($_GET['category'])){ ?>	url += '&category=<?php echo $_GET['category']; ?>'; <?php }?>
		<?php if(isset($_GET['subcategory'])){ ?>	url += '&subcategory=<?php echo $_GET['subcategory']; ?>'; <?php }?>
		location.replace(url);
	}
	function list_append(start, end){
		if(end >= categorization_spot.length){
			end = categorization_spot.length;
			$('#loading').hide();
		}
		for(var i=start ; i<end ; i++){
			$("#categorization_spot_list").append(
				'<div class="categorization_spot_iter_wrapper">'+
				'	<div class="categorization_spot_iter">'+
				'		<div class="card_item1">'+
				'			<a href="/index/spot_view?id='+categorization_spot[i].id+'">'+
				'			<img id="card_item1_img" src="/image_square_desktop/'+categorization_spot[i].imagepath+'"></a>'+
				'		</div>'+
				'		<div id="card_item2">'+
				'			<a href="/index/spot_view?id='+categorization_spot[i].id+'"><span class="category_spot_category">'+categorization_spot[i].category+'</span>&nbsp&nbsp'+categorization_spot[i].title+'</a>'+
				'		</div>'+
                '   <div></div>'+
                '   <div id="card_item2">'+
                '       <a href="/index/spot_view?id='+categorization_spot[i].id+'">미리보기</a>'+
                '       <a href="/admin/modify_spotlist/'+categorization_spot[i].id+'">수정</a>'+
                '       <a href="/admin/delete_spotlist/'+categorization_spot[i].id+'">삭제</a>'+
                '   </div>'+
				'	</div>'+
				'</div>'
			);
		}
		padding_num = iter_for_row - (end % iter_for_row);
		if(padding_num < iter_for_row){
			for(var i = 0; i < padding_num ; i++){
				$("#categorization_spot_list").append(
					'<div class="categorization_spot_iter_wrapper padding_div">'+
					'	<div class="categorization_spot_iter">'+
					'		<div class="card_item1">'+
					'		</div>'+
					'		<div id="card_item2">'+
					'		</div>'+
					'		<div id="card_item4"><span class="category_spot_category">'+
					'		</div>'+
					'	</div>'+
					'</div>'
				);
			}
		}
		height_adj();
	}
	function list_remove(start, end){
		for(var i=end-1 ; i>= start ; i--){
			$(".categorization_spot_iter_wrapper").eq(i).remove();
		}
	}
	function list_remove_last_n(n){
		for(var i=0 ; i<n ; i++)
			$(".categorization_spot_iter_wrapper").eq(categorization_spot.length - 1).remove();
	}
	function height_adj(){
		$(".card_item1").css('height', $(".card_item1").width());
	}
window.onresize = function() {
	height_adj();
	if(window.innerWidth < 1024 && desktop_view){
		desktop_view = 0;
		mobile_view = 1;
		$(".categorization_spot_iter_wrapper").remove();
		list_append_for_mobile(0, cur_iter);
	}
 	if(window.innerWidth >= 1024){
		if(mobile_view){
			desktop_view = 1;
			mobile_view = 0;
			$(".categorization_spot_iter_wrapper").remove();
			list_append(0, cur_iter);
		}
		var new_iter_for_row = parseInt($(".container").width()/350);
		if(new_iter_for_row > iter_for_row){
			var row = parseInt(cur_iter/iter_for_row);
			iter_for_row = new_iter_for_row;
			if(iter_for_row*row > cur_iter)
				list_append(cur_iter, iter_for_row*row);
			cur_iter = iter_for_row * row;
		}
		else if(new_iter_for_row < iter_for_row){
			var row = parseInt(cur_iter/iter_for_row);
			iter_for_row = new_iter_for_row;
			if(iter_for_row*row<cur_iter)
				list_remove(iter_for_row*row, cur_iter);
			cur_iter = iter_for_row*row;
		}
	}
}
$(window).scroll(function(){
	if($(window).scrollTop() >= $(document).height() - $(window).height() - $(".footer").height() && cur_iter < categorization_spot.length){
		$('#loading').show();
		list_remove(padding_num);
		padding_num = 0;
		next_iter = cur_iter + iter_for_row*2;
		if(desktop_view)	list_append(cur_iter, next_iter);
		else	list_append_for_mobile(cur_iter, next_iter);
		cur_iter = next_iter;
	}
})

$(document).ready(function(){
	var repeat = setInterval(() => {
		height_adj();
		if($(".card_item1").width() > 100){
			clearInterval(repeat);
		}
	}, 100);

	// 카테고리 추가 문
	<?php if(isset($category_list)){ ?>
		var categorization_category = <?php echo json_encode($category_list); ?>;
		var categorization_subcategory  = <?php echo json_encode($subcategory_list); ?>;
			
		// 카테고리 뷰에 추가하기 
		$("#categorization_category_list").append('<li class="categorization_category_iter" id="category_all"><a class="categorization_category_iter_a" href="/admin/spotlist">all</a></li>');
		for(var i = 0 ; i<categorization_category.length ; i++){
			$("#categorization_category_list").append('<li class="categorization_category_iter" id="category_'+categorization_category[i].category+'"><a class="categorization_category_iter_a" href="/admin/spotlist?category='+categorization_category[i].category+'">'+categorization_category[i].category+"</a></li>");
		}
	<?php } ?>
			


	// category_selected
	<?php if(isset($_GET['category'])){ ?>
		$(".categorization_category_iter[id='category_<?php echo $_GET['category'] ?>'").addClass('category_selected');
	<?php } else{?>
		$(".categorization_category_iter[id='category_all']").addClass('category_selected');
	<?php } ?>
	
	// set list_append config
	if($(window).width() > 1024){
		iter_for_row = $(".container").width();
		iter_for_row = parseInt(iter_for_row/350);
		cur_iter = iter_for_row*2;
	}
	else{
		iter_for_row = 2;
		cur_iter = 4;
	}
	if(cur_iter > categorization_spot.length)
		cur_iter = categorization_spot.length;

	// init first list_append
	if(desktop_view == 1)
		list_append(0, cur_iter);
	else
		list_append_for_mobile(0, cur_iter);
})

</script>