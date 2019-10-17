<head>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=858cb96bc6458a7a0e355b095c6c5a5e"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://kit.fontawesome.com/6156759e4a.js" crossorigin="anonymous"></script>
</head>
<style>
* {
    margin : 0px;  
    padding : 0px;
    font-family : NanumBarunGothic ; san-serif;
}
button {
    padding : 10px;
}
#course_card{
    display : inline-block;
    width : 400px;
    height : 500px;
    border : 1px solid blue;
}
#list_x, #list_y {
    display : none;
}
#map_wrapper{
    margin : auto;
    width : 80%;
    display : grid;
    grid-template-columns: 30% 70%;
}
    #map_wrapper #item1{
        width : 100%;
        height : 700px;
        border : 1px solid black;
        /* overflow : auto; */
        overflow-y : scroll;
    }
    #map_wrapper #item2{
        width : 100%;
        height : 700px;
        border : 1px solid black;
        overflow : scroll;
    }
    #right_map {
        width : 100%;
        height : 100%;
    }
.each_map{
    border : 1px solid green;
}
.spot_iter{
    padding : 10px;
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
    width : 75%;
    
} 
#view_content h1{
    margin : 100px;
}
#view_map{
    width : 400px;
    height : 400px;
}
#mark{
    font-family : SangSangFlowerRoad;
    margin-left : 10px;
    position : absolute;
    font-size : 1.5em;
}
.category{
    height : 9%;
    border-bottom : 1px solid black;
}
.category_button {
    float : right;   
}
.subcategory_button {
    float : right;
}
#container{
    /* text-align : center; */
    /* margin : 3px; */
    padding : 3px;
    /* border : 2px solid blue; */
    /* background-image : url("/image/sea_main.jpg"); */
    background-repeat : no-repeat;
    background-size : cover;
    width : 100%;
    display : inline-block;
}
#subcontainer{
    /* display : grid;
    grid-template-columns: 33% 33% 33%; */
    width : 100%;
    /* display : inline-block; */
    padding: 3px;
    margin : 3px;
    /* border : 1px solid red; */
}
.categorization_spot_iter {
    width : 250px;
    height : 240px;
    float : left;
    display : grid;
    grid-template-columns: 50% 50%;
    /* border : 1px solid black; */
    margin : 20px;
    /* box-shadow : 10px 15px 5px 5px #58ACFA; */
    box-shadow : 10px 15px 5px 5px #BBBBBB;
    background-color : #DDDDDD;
    border-radius : 10px;
    border : 1px solid black;
}	
.categorization_spot_iter_end {
    width : 250px;
    height : 240px;
    float : left;
    display : grid;
    grid-template-columns: 50% 50%;
    margin : 20px;
    box-shadow : 10px 15px 5px 5px #BBBBBB;
    border-radius : 10px;
    border : 2px solid black;
}
.categorization_spot_iter img {
    /* display : inline; */
    width : 250px;
    height : 200px;
}
    #card_item1{
        overflow : hidden;
        grid-column: 1 / 3;
        border-radius : 10px;
    }
    #card_item1 h1 {
        text-align : center;
        /* vertical-align : middle; */
        margin-top : 100px;
    }
    #card_item2 {
        padding : 0 0 0 10%;
    }
    #card_item3{
        text-align : center;
    }
    #card_item4{
        grid-column: 1 / 3;
        text-align : center;
    }

a, a:link, a:visited {
    text-decoration : none; 
    color : black;
}

.jb-wrap {
	width: 100%;
    height : 91%;
    /* max-height : 300px; */
	/* border: 1px solid #000000; */
	position: relative;
    background-color : gray;
    overflow : hidden;
    /* object-fit : cover; */
}
.jb-wrap img {
    width : 100%;
    height : 100%;
	vertical-align: middle;
    filter: brightness(60%); 
    overflow : hidden;
}
.jb-text {
    width : 100%;
	padding: 5px 10px;
	text-align: center;
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate( -50%, -50% );
    color : #DDDDDD;
    font-size : 2em;
}
.jb-text #title {
    font-family : SangSangFlowerRoad;
    font-size : 3em;
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
#subName #subName:visited #subName:link{ 
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





