<head>
	<link rel="stylesheet" type="text/css" href="/css/navBar_css.css">
	<script src="/js/navBar.js"></script>
</head>
<?php
if(isset($this->session->userdata['logged_in']) && $this->session->userdata['logged_in'] == TRUE){
	echo (
	'<div id="user_div_wrapper">'
		.'<div id="user_nickname">'
			.'<a href="/auth/account">'.$_SESSION['nickname'].'님, 환영합니다.</a>'
		.'</div>'
		.'<div id="user_info">'
			.'<a href="/auth/account/">내정보</a>'
		.'</div>'
		.'<div id="user_signout">'
			.'<a href="/index/signout">signout</a>'
		.'</div>'
	.'</div>');
}
else{
	echo (
		'<div id="user_div_wrapper">'
			.'<div id="user_nickname">'
				.'강릉관광요람'
			.'</div>'
			.'<div id="user_info">'
				.'<a href="/index/signin/">signin</a>'
			.'</div>'
			.'<div id="user_signout">'
				.'<a href="/index/signup">signup</a>'
			.'</div>'
		.'</div>');
}
?>
<div id="nav_row_wrapper">
	<!-- sdklf -->
	<div id="user_div_double_wrapper">
		<div id="user_nickname"></div>
		<div id="user_info"></div>
		<div id="user_signout"></div>
	</div>
	<div id="nav_jb_wrapper">
		<div id="nav_jb_text">
			<a href="/" id="title">강릉<br>관광<br>요람</a>
		</div>
		<div>
			<ul id="nav_jb_ul">
				<li><a href="">About</a></li>
				<li class="delimeter">|</li>
				<li><a href="/index/categorize_page">Spotlist</a></li>
				<li cla\ss="delimeter">|</li>
				<li><a href="/index/map_page">map</a></li>
				<li class="delimeter">|</li>
				<li><a href="/index/board_page">board</a></li>
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