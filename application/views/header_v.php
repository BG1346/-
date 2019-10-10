<head>
<style>
* {
    margin : 0px;
    padding : 0px;
    font-family : NanumBarunGothic;
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
    background-color : gray;
}
.subcategory{
    background-color : #909090;
}
.container{
    /* text-align : center; */
    margin : 3px;
    padding : 3px;
    /* border : 2px solid blue; */
}
.subcontainer{
    /* display : grid;
    grid-template-columns: 33% 33% 33%; */
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
}	
#card div {
    /* border : 1px solid green; */
}
    #item1{
        overflow : hidden;
        grid-column: 1 / 3;
        border-radius : 10px;
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
a, a:link, a:visited {
    color : black;
    text-decoration : none;
}
.jb-wrap {
	width: 100%;
    max-height : 300px;
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
    /* float : left; */
    margin : 0 30px 0 30px;
}
@font-face { 
    font-family: 'SangSangFlowerRoad'; src: url('https://cdn.jsdelivr.net/gh/projectnoonnu/noonfonts_three@1.0/SangSangFlowerRoad.woff') format('woff'); font-weight: normal; font-style: normal; 
}
@font-face { 
    font-family: 'NanumBarunGothic'; font-style: normal; font-weight: 400; src: url('//cdn.jsdelivr.net/font-nanumlight/1.0/NanumBarunGothicWeb.eot'); src: url('//cdn.jsdelivr.net/font-nanumlight/1.0/NanumBarunGothicWeb.eot?#iefix') format('embedded-opentype'), url('//cdn.jsdelivr.net/font-nanumlight/1.0/NanumBarunGothicWeb.woff') format('woff'), url('//cdn.jsdelivr.net/font-nanumlight/1.0/NanumBarunGothicWeb.ttf') format('truetype'); } @font-face { font-family: 'NanumBarunGothic'; font-style: normal; font-weight: 700; src: url('//cdn.jsdelivr.net/font-nanumlight/1.0/NanumBarunGothicWebBold.eot'); src: url('//cdn.jsdelivr.net/font-nanumlight/1.0/NanumBarunGothicWebBold.eot?#iefix') format('embedded-opentype'), url('//cdn.jsdelivr.net/font-nanumlight/1.0/NanumBarunGothicWebBold.woff') format('woff'), url('//cdn.jsdelivr.net/font-nanumlight/1.0/NanumBarunGothicWebBold.ttf') format('truetype') } @font-face { font-family: 'NanumBarunGothic'; font-style: normal; font-weight: 300; src: url('//cdn.jsdelivr.net/font-nanumlight/1.0/NanumBarunGothicWebLight.eot'); src: url('//cdn.jsdelivr.net/font-nanumlight/1.0/NanumBarunGothicWebLight.eot?#iefix') format('embedded-opentype'), url('//cdn.jsdelivr.net/font-nanumlight/1.0/NanumBarunGothicWebLight.woff') format('woff'), url('//cdn.jsdelivr.net/font-nanumlight/1.0/NanumBarunGothicWebLight.ttf') format('truetype'); } .nanumbarungothic * { font-family: 'NanumBarunGothic', sans-serif; 
}
</style>

</head>
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


<div class="category">
<br>

<?php 
if($method != 'index'){
?>
<a id="mark" href="/">
    강릉관광요람
</a>
<?php
}
?>
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
        <center><h1><?php echo $_GET['category']; ?></h1></center>
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
?>
</ul>
</div>



