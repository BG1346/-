<head>
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
			.category_selected *{
				color : #CC7B33 !important;
				/* border : 1px solid black; */
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
			#loading{
				margin : 100px auto;
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
			position : relative;
		}
		.categorization_spot_iter {
			width : 100%;
			height : 100%;
			float : left;
			padding : 5px;
		}	
		.categorization_spot_iter * {
			color : black;
			height : 100%;
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
			.card_item1_img{
				/* -webkit-filter: grayscale(100%);	 */
			}
			.mobile_spot_text{
				position : absolute;
				padding-left: 10px;
				padding-bottom : 10px;
				bottom : 0;
				color : #FFFFFF;
				z-index = 3;
			}
			.mobile_spot_title{
				font-size : 1.5em;
			}
			.mobile_spot_district{
				font-size : 1.2em;
				text-align : left;
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
			#loading{
				/* margin : 200px;  */
				margin : 50px auto;
			}
		}
		#loading {
			/* display: inline-block; */
			/* display : center; */
			/* display : none; */
			/* visibility : hidden; */
			
			width: 50px;
			height: 50px;
			border: 3px solid rgba(255,255,255,.3);
			border-radius: 50%;
			border-top-color: black;
			animation: spin 1s ease-in-out infinite;
			-webkit-animation: spin 1s ease-in-out infinite;
		}
		@keyframes spin {
			to { -webkit-transform: rotate(360deg); }
		}
		@-webkit-keyframes spin {
			to { -webkit-transform: rotate(360deg); }
		}
	</style>
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
<div id="categorization_spot_list_wrapper">
	<div id="categorization_spot_list"></div>
</div>
<div id="loading"></div>
</div>
<script>
	var categorization_category = <?php echo json_encode($category_list); ?>;
	var categorization_subcategory  = <?php echo json_encode($subcategory_list); ?>;
	var categorization_spot = <?php echo json_encode($spot_list); ?>;
	var like_list = <?php echo json_encode($like_list); ?>;
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
		// $('#loading').show();
		if(end >= categorization_spot.length){
			end = categorization_spot.length;
			$('#loading').hide();
		}
		// console.log(start, end);
		for(var i=start ; i<end ; i++){
			// console.log(i +' : ' +categorization_spot[i].title);
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
				'			<img id="card_item1_img" src="/image_desktop/'+categorization_spot[i].imagepath+'"></a>'+
				'		</div>'+
				'		<div id="card_item2">'+
				'			<a href="/index/spot_view?id='+categorization_spot[i].id+'"><span class="category_spot_category">'+categorization_spot[i].category+'</span>&nbsp&nbsp'+categorization_spot[i].title+'</a>'+
				'		</div>'+
				'		<div id="card_item4"><span class="category_spot_category">'+
							like_context+
				'			&nbsp;'+categorization_spot[i].like+
				'			</span>'+
				'		</div>'+
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
		// $('#loading').hide();
	}
	function list_append_for_mobile(start, end){
		// $('#loading').show();
		if(end >= categorization_spot.length - 1){
			end = categorization_spot.length;
			// $(".categorization_spot_iter_end").hide();
			$('#loading').hide();
		}
		for(var i=start ; i<end ; i++){
			var like_context ;
			if(like_list[categorization_spot[i].id] == 1)
				like_context = '<img id="card_heart_btn" src="/image_mobile/btn_heart_on.png" width="10px">';
			else
				like_context = '<img id="card_heart_btn" src="/image_mobile/btn_heart_off.png" width="10px">';
			$("#categorization_spot_list").append(
				'<div class="categorization_spot_iter_wrapper">'+
				'    <div class=mobile_spot_text>'+
				'		<div class="mobile_spot_district">'+
							categorization_spot[i].district+
				'		</div>'+
				'		<div class="mobile_spot_title">'+
							categorization_spot[i].title+
				'		</div>'+
				'	</div>'+
				'	<div class="categorization_spot_iter">'+
				'		<div class="card_item1">'+
				'			<a href="/index/spot_view?id='+categorization_spot[i].id+'">'+
				'			<img class="card_item1_img" src="/image_mobile/'+categorization_spot[i].imagepath+'"></a>'+
				'		</div>'+
				'	</div>'+
				'</div>'
			);
		}
		height_adj();
		// $('#loading').hide();
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
		// iter_for_row = $(".container").width();
		// iter_for_row = parseInt(iter_for_row/350);
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
		$("#categorization_category_list").append('<li class="categorization_category_iter" id="category_all"><a class="categorization_category_iter_a" href="/index/categorize_page">all</a></li>');
		for(var i = 0 ; i<categorization_category.length ; i++){
			$("#categorization_category_list").append('<li class="categorization_category_iter" id="category_'+categorization_category[i].category+'"><a class="categorization_category_iter_a" href="/index/categorize_page?category='+categorization_category[i].category+'">'+categorization_category[i].category+"</a></li>");
		}

		// 서브카테고리 뷰에 추가하기 
		// <?php if(isset($_GET['category'])){ ?>
		// 		for(var i=0 ; i<categorization_subcategory.length; i++){
		// 			$("#categorization_subcategory_list").append('<li class="categorization_subcategory_iter"><a href="/index/categorize_page?category=<?php echo $_GET['category'];?>&subcategory='+categorization_subcategory[i].subcategory+'">'+categorization_subcategory[i].subcategory+'</li>');
		// 		}
		// <?php } ?>
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