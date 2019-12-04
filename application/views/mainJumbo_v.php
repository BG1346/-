<head>
    <link rel="stylesheet" type="text/css" href="/css/mainJumbo_m_css.css">
    <link rel="stylesheet" type="text/css" href="/css/mainJumbo_css.css">
</head>
<div id="main_jb">
    <div id="main_jb_img_wrapper">
        <div id="main_jb_img">
            <img src="/image/back_1920.png">
        </div>
    </div>
    <div id="main_jb_wrapper">
        <div id="main_jb_text">
            <a href="/" id="title">강릉<br>관광<br>요람</a>
        </div>
        <div>
            <ul id="main_jb_ul">
                <li class="main_jb_ul_li"><a href="">About</a></li>
                <li>|</li>
                <li class="main_jb_ul_li"><a href="/index/categorize_page">Spotlist</a></li>
                <li>|</li>
                <li class="main_jb_ul_li"><a href="/index/map_page">map</a></li>
                <li>|</li>
                <li class="main_jb_ul_li"><a href="/index/board_page">board</a></li>
            </ul>
        </div>
    </div>
</div>

<script>
    if(window.innerWidth >= 1024)
        $("#main_jb_img").attr('src', '/image/back_1920.png');
    else{
        $("#main_jb_img").attr('src', '/image/back_m.png');
    }
</script>