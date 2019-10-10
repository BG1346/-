<head>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<style>
* {
    margin : 0px;
    padding : 0px;
    font-family : NanumBarunGothic ; san-serif;
}

#sangsangfont{
    font-family : SangSangFlowerRoad;
    font-size : 3em;
}
#search_box{
    position : absolute;
    z-index : 2;
    right : 0px;
}
#view_content{
    margin : auto;
    width : 90%;
    text-align : center;
}
#mark{
    font-family : SangSangFlowerRoad;
    margin-left : 10px;
    position : absolute;
    color : #FFFFFF;
    font-size : 1.5em;
}
.category{
    background-color : #0174DF;
}
.container{
    /* text-align : center; */
    /* margin : 3px; */
    padding : 3px;
    /* border : 2px solid blue; */
    background-image : url("/image/sea_main.jpg");
    background-repeat : no-repeat;
    background-size : cover;
}
.subcontainer{
    /* display : grid;
    grid-template-columns: 33% 33% 33%; */
    width : 100%;
    display : inline-block;
    padding: 3px;
    margin : 3px;
    /* border : 1px solid red; */
}
#card {
    float : left;
    display : grid;
    grid-template-columns: 50% 50%;
    /* border : 1px solid black; */
    margin : 20px;
    box-shadow : 10px 15px 5px 5px #58ACFA;
    background-color : #DDDDDD;
}	
#card {
    border-radius : 10px;
}
    #item1{
        overflow : hidden;
        grid-column: 1 / 3;
        border-radius : 10px;
    }
    #item2 {
        padding : 0 0 0 10%;
    }
    #item3{
        text-align : center;
    }
    #item4{
        grid-column: 1 / 3;
        text-align : center;
    }
#card img {
    /* display : inline; */
    width : 250px;
    height : 200px;
}
a, a:link, a:visited {ㅁ
    text-decoration : none; 
}
.jb-wrap {
	width: 100%;
    max-height : 350px;
	/* border: 1px solid #000000; */
	position: relative;
    background-color : gray;
    overflow : hidden;
    /* object-fit : cover; */
}
.jb-wrap img {
    width : 100%;
    /* height : auto; */
	vertical-align: middle;
    filter: brightness(60%); 
    overflow : hidden;
}
.jb-text {
	padding: 5px 10px;
	text-align: center;
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate( -50%, -50% );
    color : #DDDDDD;
}
.jb-text #title {
    font-family : SangSangFlowerRoad;
    font-size : 5em;
    color : #DDDDDD;
}
.jb-text a {
    text-decoration : none;
}
ul{
	text-align : center;
}
li {
    list-style-type : none;
    display : inline-block;
    margin : 0 30px 0 30px;
}
li a{
    color : #DDDDDD;
    text-decoration : none;
}
#subName { 
    color : #DDDDDD;
}
@font-face { 
    font-family: 'SangSangFlowerRoad'; src: url('https://cdn.jsdelivr.net/gh/projectnoonnu/noonfonts_three@1.0/SangSangFlowerRoad.woff') format('woff'); font-weight: normal; font-style: normal; 
}
@font-face { 
    font-family: 'NanumBarunGothic'; font-style: normal; font-weight: 400; src: url('//cdn.jsdelivr.net/font-nanumlight/1.0/NanumBarunGothicWeb.eot'); src: url('//cdn.jsdelivr.net/font-nanumlight/1.0/NanumBarunGothicWeb.eot?#iefix') format('embedded-opentype'), url('//cdn.jsdelivr.net/font-nanumlight/1.0/NanumBarunGothicWeb.woff') format('woff'), url('//cdn.jsdelivr.net/font-nanumlight/1.0/NanumBarunGothicWeb.ttf') format('truetype'); } @font-face { font-family: 'NanumBarunGothic'; font-style: normal; font-weight: 700; src: url('//cdn.jsdelivr.net/font-nanumlight/1.0/NanumBarunGothicWebBold.eot'); src: url('//cdn.jsdelivr.net/font-nanumlight/1.0/NanumBarunGothicWebBold.eot?#iefix') format('embedded-opentype'), url('//cdn.jsdelivr.net/font-nanumlight/1.0/NanumBarunGothicWebBold.woff') format('woff'), url('//cdn.jsdelivr.net/font-nanumlight/1.0/NanumBarunGothicWebBold.ttf') format('truetype') } @font-face { font-family: 'NanumBarunGothic'; font-style: normal; font-weight: 300; src: url('//cdn.jsdelivr.net/font-nanumlight/1.0/NanumBarunGothicWebLight.eot'); src: url('//cdn.jsdelivr.net/font-nanumlight/1.0/NanumBarunGothicWebLight.eot?#iefix') format('embedded-opentype'), url('//cdn.jsdelivr.net/font-nanumlight/1.0/NanumBarunGothicWebLight.woff') format('woff'), url('//cdn.jsdelivr.net/font-nanumlight/1.0/NanumBarunGothicWebLight.ttf') format('truetype'); } .nanumbarungothic * { font-family: 'NanumBarunGothic', sans-serif; 
}
</style>

</head>
<div id="search_box">
	<form id="search" method="GET" action="/index/search">
		<select name="opt" class="select-css">
			<option value="content_title" selected>제목+내용</option>
			<option value="title">제목</option>
			<option value="content">내용</option>
		</select>
		<input type="text" name="s_word" id="q" onkeypress="board_search_enter(document.q);"/>
		<input type="button" id="search_btn" value="검색"/>
    </form>
    




</div>
<?php
if($method == 'index'){
?>
    <div class="jb-wrap">
        <div class="jb-image"><img src="/image/main.jpg" alt=""></div>
            <div class="jb-text">
                <a href="/" id="title">강릉관광요람</a>
            </div>
        </div>
    </div>
<?php
}
?>
<?php
if($method != 'index'){
?>
<div class="category">
<br>
<a id="mark" href="/">
    강릉관광요람
</a>

<ul>
<?
    foreach($category as $iter){
        ?>
        <li>
        <a href="/index?category=<?php echo $iter->category?>"><?php echo $iter->category?></a>
        </li>
        <?php
    }
?>
</ul>
<br>
</div>
<div class="subcategory">
<?php 
    if(isset($_GET['category'])){
?>
        <br>
        <center><h1 id="subName" style="color : white;"><?php echo $_GET['category']; ?></h1></center>
        <br>
<ul>
<?php 
}
    foreach($subcategory as $iter){
        ?>
        <li>
            <a href="/index?category=<?php echo $_GET['category']?>&subcategory=<?php echo $iter->subcategory?>" id="title">
            <?php echo $iter->subcategory?>
            </a>
        </li>
        <?php
        
    }
}
?>
</ul>
</div>



