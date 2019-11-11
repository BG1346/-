<head>
	<!-- <link rel="stylesheet" type="text/css" href="/css/categorization.css"> -->
	<style>
		@media screen and (min-width: 1024px) {
		#category_name {
			padding-top : 40px;
			text-align: center;
			font-size : 18px;
			line-height : 20px;
			color : #AAAAAA;
			font-family : NanumBarunGothic;
		}
		#categorization_category_list_wrapper *{
			color : #AAAAAA;
		}
			#categorization_category_list{
				padding : 0;
				margin : 0;
				text-align : center;
			}
			#categorization_category_list li {
				list-style-type : none;
				display : inline-block;
				margin : 0 30px 0 30px;
			}
			.category_selected {
				color : #CC7B33 !important;
			}
		#categorization_spot_list_wrapper{
			padding : 10px;
			display : table;
		}
		#categorization_spot_list{
			display : table-cell;
			text-align : center;
		}
		.categorization_spot_iter_wrapper{
			display : inline-block;
		}
		.categorization_spot_iter {
			width : 310px;
			height : 310px;
			float : left;
			display : grid;
			grid-template-columns: 25% 25% 25% 25%;
			margin : 20px;
		}	
		.categorization_spot_iter *{
			color : black;
		}
		.category_spot_category{
			color : #CC7B33;
		}
			#card_heart_btn{
				height : 14px;
				width : 16px;
			}
			.card_item1 img {
				width : 310px;
				height : 310px;
				border-radius : 10px;
			}
			.card_item1{
				overflow : hidden;
				grid-column: 1 / 5;
				border-radius : 10px;
			}
			#card_item2 {
				grid-column: 1 / 4;
				text-align : left;
			}
			#card_item3, #card_item4 {
				float : right;
				text-align : right;
				padding-right : 10px;
			}
			.categorization_spot_iter_end{
				padding-top : 70px;
				text-align : center;
				color : #AAAAAA;
			}
			.categorization_spot_iter_end p{
				display : inline;
				border-bottom : 1px solid #AAAAAA;
			}
		}
		@media screen and (max-width: 1023px) {
			#category_name {
				padding-top : 40px;
				text-align: center;
				font-size : 18px;
				line-height : 20px;
				color : #AAAAAA;
				font-family : NanumBarunGothic;
			}
			#categorization_category_list_wrapper *{
				color : #AAAAAA;
			}
			#categorization_category_list{
				padding : 0;
				margin : 0;
				text-align : center;
			}
			#categorization_category_list li {
				list-style-type : none;
				display : inline-block;
				margin : 0 10px 0 10px;
			}			
			#categorization_spot_list_wrapper{
			display : table;
		}
		#categorization_spot_list{
			display : table-cell;
			text-align : center;
		}
		.categorization_spot_iter_wrapper{
			width : 45%;
			display : inline-block;
		}
		.categorization_spot_iter {
			width : 100%;
			height : 100%;
			float : left;
			display : grid;
			grid-template-columns: 25% 25% 25% 25%;
			padding : 5px;
		}	
		.categorization_spot_iter * {
			color : black;
			height : 100%;
		}
		.category_spot_category{
			color : #CC7B33;
		}
			#card_heart_btn{
				height : 14px;
				width : 16px;
			}
			.card_item1{
				overflow : hidden;
				grid-column: 1 / 5;
				border-radius : 10px;
				height : 115px;
			}
			.card_item1 img {
				width : 100%;
				height : 100%;
				border-radius : 10px;
			}
			
			#card_item2 {
				grid-column: 1 / 5;
				text-align : left;
			}
			#card_item3, #card_item4 {
				display : none;
				float : right;
				text-align : right;
				padding-right : 10px;
			}
			.categorization_spot_iter_end{
				padding-top : 70px;
				text-align : center;
				color : #AAAAAA;
				padding-bottom : 100px;
			}
			.categorization_spot_iter_end p{
				display : inline;
				border-bottom : 1px solid #AAAAAA;
			}	
		}
	</style>
</head>
<div class="container">
<p id="category_name">Spotlist</p>
<br>
<div id="categorization_category_list_wrapper">
	<div></div>
	<div>
		<!-- <ul class="nav nav-justified dropdown" id="categorization_category_list"></ul> -->
		<ul id="categorization_category_list"></ul>
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
			$(".categorization_spot_iter_end").hide();
		}
		for(var i=start ; i<end ; i++){
			var like_context ;
			if(like_list[categorization_spot[i].id] == 1)
				like_context = '<img id="card_heart_btn" src="/image/btn_heart_on.png" width="10px">';
			else
				like_context = '<img id="card_heart_btn" src="/image/btn_heart_off.png" width="10px">';
			$("#categorization_spot_list").append(
				'<div class="categorization_spot_iter_wrapper">'+
				'	<div class="categorization_spot_iter">'+
				'		<div class="card_item1">'+
				'			<a href="/index/spot_view?id='+categorization_spot[i].id+'">'+
				'			<img id="card_item1_img" src="/image/'+categorization_spot[i].imagepath+'"></a>'+
				'		</div>'+
				'		<div id="card_item2">'+
				'			<a href="/index/spot_view?id='+categorization_spot[i].id+'"><span class="category_spot_category">'+categorization_spot[i].category+'</span>&nbsp&nbsp'+categorization_spot[i].title+'</a>'+
				'		</div>'+
				// '		<div id="card_item3"></div>'+
				'		<div id="card_item4"><span class="category_spot_category">'+
							like_context+
				'			&nbsp;'+categorization_spot[i].like+
				'			</span>'+
				'		</div>'+
				'	</div>'+
				'</div>'
			);
		}
	}

$(document).ready(function(){
	
	// console.log($(".categorization_spot_iter_wrapper").innerHeight);
	// $(".categorization_spot_iter_wrapper").css('height', $(".categorization_spot_iter_wrapper").width());
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
	
	
	// console.log($(window).width());
	if($(window).width() > 1024){
		iter_for_row = $(".container").width();
		iter_for_row = parseInt(iter_for_row/350);
		cur_iter = iter_for_row*2;
	}
	else{
		iter_for_row = 2;
		cur_iter = 4;
	}
	if(cur_iter > categorization_spot.length){
		cur_iter = categorization_spot.length;
	}
	list_append(0, cur_iter);

	$("#categorization_spot_more").append(
		'<div class="categorization_spot_iter_end">'+
				'<p>MORE</p>'+
		'</div>'
	);
	

	$("#categorization_spot_more").click(function(){
		next_iter = cur_iter + iter_for_row*2;
		list_append(cur_iter, next_iter);
		cur_iter = next_iter;
	});

	console.log($(".card_item1").width());
	$(".card_item1").css('height', $(".card_item1").width());

	
})

</script>