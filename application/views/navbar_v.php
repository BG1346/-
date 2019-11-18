<head>
	<link rel="stylesheet" type="text/css" href="/css/navBar.css">
	<script src="/js/navBar.js"></script>

</head>
<?php
if(isset($this->session->userdata['logged_in']) && $this->session->userdata['logged_in'] == TRUE){
    
    // echo '<p>login 정보</p>'.
    //     '<p>'.$this->session->userdata['nickname'].'</p>'.
    //     '<p>'.$this->session->userdata['email'].'</p>';
}
if(isset($this->session->userdata)){
    // print_r($this->session);
}
?>
<div id="nav_row_wrapper">
	<div id="nav_jb_wrapper">
		<div id="nav_jb_text">
			<a href="/" id="title">강릉<br>관광<br>요람</a>
		</div>
		<div>
			<ul id="nav_jb_ul">
				<li><a href="">About</a></li>
				<li class="delimeter">|</li>
				<li><a href="/index/categorize_page">Spotlist</a></li>
				<li class="delimeter">|</li>
				<li><a href="/index/map_page">map</a></li>
				<li class="delimeter">|</li>
				<li><a href="/index/board_page">board</a></li>
				<li class="delimeter">|</li>
				<li><a href="/index/signup">signup</a></li>
			</ul>
		</div>
	</div>

	<div id="search_wrapper">
		<div id="search_bar_wrapper">
			<input type="text" id="s_word">
			&nbsp;<button type="button" onclick="search()" id="search_btn">
				<img src="/image/btn_search.png">
			</button>
		</div>
	</div>

	<div id="nav_row_img_wrapper">
		<img src="/image/header.png">
	</div>
	
	
</div>
<script>
</script>							