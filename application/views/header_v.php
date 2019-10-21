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
#map_overlay{
    width : 150px;
    height : 200px;
    border : 1px solid black;
    background-color : white;
    border-radius : 10px;
}
#overlay_image_wrapper {
    width: auto;
    height : 50%;
}
#overlay_image{
    width : 100%;
    height : 100%;
    border-radius : 10px 10px 0 0;
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
    margin : 50px 0 50px 30px;
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
    padding : 3px;
    background-repeat : no-repeat;
    background-size : cover;
    width : 100%;
    display : inline-block;
}
#subcontainer{
    width : 100%;
    padding: 3px;
    margin : 3px;
}
.categorization_spot_iter {2
    width : 250px;
    height : 240px;
    float : left;
    display : grid;
    grid-template-columns: 25% 25% 25% 25%;
    margin : 20px;
    box-shadow : 1px 1px 0.5px 0.5px rgba(134, 134, 134, 35);
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
    /* box-shadow : 10px 15px 5px 5px #BBBBBB; */
    border-radius : 10px;
    border : 2px solid black;
}
.categorization_spot_iter img {
    width : 250px;
    height : 200px;
}
    #card_item1{
        overflow : hidden;
        grid-column: 1 / 5;
        border-radius : 10px 10px 0 0;
    }
    #card_item1 h1 {
        text-align : center;
        margin-top : 100px;
    }
    #card_item2 {
        grid-column: 1 / 3;
        padding : 0 0 0 10%;
    }
    #card_item3, #card_item4 {
        float : right;
    }
    #card_item5{
        grid-column: 1 / 5;
        text-align : center;
    }

a, a:link, a:visited {
    text-decoration : none; 
    color : black;
}

.jb-wrap {
	width: 100%;
    height : 91%;
	position: relative;
    background-color : gray;
    overflow : hidden;
}
.jb-wrap img {
    width : 100%;
    overflow : hidden;
    height : 100%;
}
.jb-text {
    width : 100%;
	padding: 5px 10px;
	text-align: center;
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate( -50%, -50% );
    color : white;
    font-size : 2em;
}
.jb-text #title {
    font-family : SangSangFlowerRoad;
    font-size : 3em;
}
.jb-text a {
    text-decoration : none;
    color : white !important;
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





