<?php
if($method == 'index' && !isset($_GET['category'])){
?>
    <div class="jb-wrap">
        <div class="jb-image"><img src="/image/main.jpg" alt=""></div>
            <div class="jb-text">
                <a href="/" id="title">강릉관광요람</a>
                <br><br><br><br><br><br><br><br><br>
                <ul>
                    <a href="#container"><li>관광지 분류</li></a>
                    <a href="#map_container"><li>지도 보기</li></a>
                    <a href="#board"><li>여행 게시판</li></a>
                    <li>menu4</li>
                    <li>menu5</li>
                </ul>
            </div>
        </div>
    </div>
<?php
}
?>