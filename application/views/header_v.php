
<head>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=858cb96bc6458a7a0e355b095c6c5a5e"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://kit.fontawesome.com/6156759e4a.js" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
</head>
<style>
@media screen and (min-width: 1024px) {
/*
    * {
        margin : 0px;  
        padding : 0px;
        font-family : NanumBarunGothic ; san-serif;
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
    #list_x, #list_y {
        display : none;
    }
    .row{
        display : grid;
        grid-template-columns: 25% 50% 25%;
    }
    .container {
        min-width : 900px;
        padding : 0px;
        margin : auto;
    }
    #map_overlay{
        display : grid;
        grid-template-columns: 50% 50%;
        width : 250px;
        height : 100px;
        border : 1px solid black;
        background-color : white;
        border-radius : 10px;
        opacity : 3;
        z-index : 2;
        margin-bottom : 10px;
    }
    #overlay_pin_background {
        z-index : 1;
        display : none;
        position : absolute;
        left : -25px;
        
    }
    #overlay_image_wrapper {
        margin : 6px 6px 6px 6px;
        height : 86px;
        border : 1px solid red;
    }
    #overlay_image{
        width : 100%;
        height : 100%;
        height : 50px;
        border-radius : 10px;
        border : 1px solid gray;
    }
    #overlay_two{
        text-align : center;
        padding : 6px;
        padding-top : 12px;
        overflow : scroll;
        z-index : 2;
    }
    #overlay_one{
        z-index : 2;
    }
    #map_wrapper{
        margin : auto;
        width : 80%;
        display : grid;
        grid-template-columns: 30% 70%;
        height : 500px;
        overflow : hidden;
    }
        #map_wrapper #item1{
            width : 100%;
            height : 100%;
            border : 1px solid black;
            overflow-y : scroll;
        }
        #map_wrapper #item2{
            width : 100%;
            height : 100%;
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
        display : grid;
        grid-template-columns: 70% 30%;
        margin : 1px 3px 1px 3px;
        border-radius : 10px;
        border : 1px solid black;
        height : 90px;
    }   
        .spot_iter_left{
            padding : 10px;
        }
        .spot_iter_left_wrapper{
            overflow : scroll
        }
        .spot_iter_title{
            font-size : 1.5em;
            display : inline;
        }
        .spot_iter_category{
            font-size : 0.7em;
            text-align : right;
        }
        .spot_iter_image_wrapper{
            width : 100%;
            height : 100%;
            padding : 2px;
        }
        .spot_iter_image_wrapper img{
            width : 100%;
            height : 100%;
            border-radius : 0 10px 10px 0;
            border : 1px solid gray;
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
        position : absolute;
        font-size : 2em;
    }
    .category_button {
        float : right;   
    }
    .subcategory_button {
        float : right;
    }
    #categorization_container{
        padding : 3px;
        background-repeat : no-repeat;
        background-size : cover;
        width : 100%;
        display : inline-block;
    }
    #categorization_subcontainer{
        width : 100%;
        padding: 3px;
        margin : 3px;
    }
    .categorization_spot_iter {
        width : 242px;
        height : 240px;
        float : left;
        display : grid;
        grid-template-columns: 25% 25% 25% 25%;
        margin : 20px;
        box-shadow : 1px 1px 0.5px 0.5px rgba(134, 134, 134, 35);
        border-radius : 10px;
        border : 1px solid black;
    }	
    #categorization_category_list_wrapper{
        display : grid;
        grid-template-columns : 33% 33% 33%;
    }
    #categorization_subcategory_list_wrapper{
        display : grid;
        grid-template-columns : 25% 50% 25%;
    }
    .categorization_spot_iter_end {
        width : 250px;
        height : 240px;
        float : left;
        margin : 20px;
    }
    #innerCircle{
        margin-left : 50px;
        margin-top : 48px;
        width : 150px;
        height : 144px;
        text-align : center;
        border-radius : 100px;
    }
    #innerCircle img{
        width : 100px;
        height : 100px;
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
    a, a:link, a:visited {
        text-decoration : none; 
    }
    .jb-wrap {
        width: 100%;
        position: relative;
        overflow : hidden;
    }
    .jb-wrap img {
        width : 100%;
        overflow : hidden;
        -webkit-filter: grayscale(70%);
        -webkit-filter: brightness(50%);
    }
    .jb-text {
        width : 100%;
        padding: 5px 10px;
        text-align: center;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate( -50%, -50% );
        font-size : 2em;
    }
    .jb-text * {
        color : white;
    }
    .jb-text #title {
        font-family : SangSangFlowerRoad;
        font-size : 3em;
    }
    .jb-text a {
        text-decoration : none;
    }
    #subName #subName:visited #subName:link{ 
        color : #DDDDDD;
    }
*/
    .categorization_spot_iter img {
        width : 250px;
        height : 200px;
    }
}
@font-face { 
    font-family: 'SangSangFlowerRoad'; src: url('https://cdn.jsdelivr.net/gh/projectnoonnu/noonfonts_three@1.0/SangSangFlowerRoad.woff') format('woff'); font-weight: normal; font-style: normal; 
}
@font-face { 
    font-family: 'NanumBarunGothic'; font-style: normal; font-weight: 400; src: url('//cdn.jsdelivr.net/font-nanumlight/1.0/NanumBarunGothicWeb.eot'); src: url('//cdn.jsdelivr.net/font-nanumlight/1.0/NanumBarunGothicWeb.eot?#iefix') format('embedded-opentype'), url('//cdn.jsdelivr.net/font-nanumlight/1.0/NanumBarunGothicWeb.woff') format('woff'), url('//cdn.jsdelivr.net/font-nanumlight/1.0/NanumBarunGothicWeb.ttf') format('truetype'); } @font-face { font-family: 'NanumBarunGothic'; font-style: normal; font-weight: 700; src: url('//cdn.jsdelivr.net/font-nanumlight/1.0/NanumBarunGothicWebBold.eot'); src: url('//cdn.jsdelivr.net/font-nanumlight/1.0/NanumBarunGothicWebBold.eot?#iefix') format('embedded-opentype'), url('//cdn.jsdelivr.net/font-nanumlight/1.0/NanumBarunGothicWebBold.woff') format('woff'), url('//cdn.jsdelivr.net/font-nanumlight/1.0/NanumBarunGothicWebBold.ttf') format('truetype') } @font-face { font-family: 'NanumBarunGothic'; font-style: normal; font-weight: 300; src: url('//cdn.jsdelivr.net/font-nanumlight/1.0/NanumBarunGothicWebLight.eot'); src: url('//cdn.jsdelivr.net/font-nanumlight/1.0/NanumBarunGothicWebLight.eot?#iefix') format('embedded-opentype'), url('//cdn.jsdelivr.net/font-nanumlight/1.0/NanumBarunGothicWebLight.woff') format('woff'), url('//cdn.jsdelivr.net/font-nanumlight/1.0/NanumBarunGothicWebLight.ttf') format('truetype'); } .nanumbarungothic * { font-family: 'NanumBarunGothic', sans-serif; 
}
</style>

</head>
<body>