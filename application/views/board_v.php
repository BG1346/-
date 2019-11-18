<head>
<style>
    .board_iter{
        border : 1px solid black;
    }
</style>
</head>
<body>
    <h1>게시판</h1>
    <button onclick="location.href='/index/board_write'">글쓰기</button>
    <?php 
        // print_r($board_list);
    ?>

    <div id="board_list">
    </div>
    <div id="pagination_div_wrapper">
        <div id="pagination_list">
            <?php echo $pagination;?>
        </div>
    </div>
</body>
<script>
$(document).ready(function(){
    // alert('lll');
    var board_list = <?php echo json_encode($board_pagination_list); ?>;
    for(var i = 0 ;i <board_list.length ; i++){
        $("#board_list").append(
            // '<div class="board_iter">'+
            //     '<p>'+
            //         board_list[i].title+
            //     '</p>'+
            //     '<p>'+
            //         board_list[i].user_name+
            //     '</p>'+
            //     '<p>'+
            //         board_list[i].type+
            //     '</p>'+
            //     '<p>'+
            //         board_list[i].content+
            //     '</p>'+
            // '</div>'
            '<div style="border : 1px solid black">'+
                'title : ' + board_list[i].title+'<br>'+
                'type : ' +board_list[i].type+'<br>'+
                'contents : ' + board_list[i].contents+'<br>'+
                'reg_data : ' + board_list[i].reg_date+'<br>'+
                'nickname : ' + board_list[i].nickname+'<br>'+
                'hits : ' + board_list[i].hits+'<br>'+
            '</div>'
        )
    }
})
</script>