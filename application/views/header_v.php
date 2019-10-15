<head>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

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
    width : 90%;
    display : grid;
    grid-template-columns: 30% 70%;
}
    #map_wrapper #item1{
        width : 100%;
        height : 700px;
        border : 1px solid black;
        overflow : scroll;
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
#view_content h1{
    margin : 100px;
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
    height : 7%;
}
.category_button {
    background-color : #FF3333;
}
.subcategory_button {
    background-color : #33FF33;
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
    #card #item1{
        overflow : hidden;
        grid-column: 1 / 3;
        border-radius : 10px;
    }
    #card #item2 {
        padding : 0 0 0 10%;
    }
    #card #item3{
        text-align : center;
    }
    #card #item4{
        grid-column: 1 / 3;
        text-align : center;
    }
#card img {
    /* display : inline; */
    width : 250px;
    height : 200px;
}
a, a:link, a:visited {
    text-decoration : none; 
    color : black;
}

.jb-wrap {
	width: 100%;
    height : 93%;
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





