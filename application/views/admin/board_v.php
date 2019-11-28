<head>

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
    </div>
</body>
<script>
$(document).ready(function(){
    // alert('lll');
    var board_list = <?php echo json_encode($board_list); ?>;
    for(var i = 0 ;i <board_list.length ; i++){
        if(board_list[i].attached_file_name != ''){
            $("#board_list").append(
                '<div style="border : 1px solid black" id="'+board_list[i].id+'">'+
                    'title : ' + board_list[i].title+'<br>'+
                    'type : ' +board_list[i].type+'<br>'+
                    'contents : ' + board_list[i].contents+'<br>'+
                    'reg_data : ' + board_list[i].reg_date+'<br>'+
                    'nickname : ' + board_list[i].nickname+'<br>'+
                    'hits : ' + board_list[i].hits+'<br>'+
                    // 'filename : ' + board_list[i].attached_file_name+'<br>'+
                    // 'fileimage : <image class="attached_image" src="'+board_list[i].attached_file_path+'"><br>'+
                    '<a href="'+board_list[i].attached_file_path+'">'+board_list[i].attached_file_name+'</a><br>'+
                    '<a href="/admin/modify_board/'+board_list[i].board_id+'"><button >수정</button></a>'+
                    '<a href="/admin/delete_board/'+board_list[i].board_id+'"><button >삭제</button></a>'+
                '</div>'
            )
        }
        else{
            $("#board_list").append(
                '<div style="border : 1px solid black" id="'+board_list[i].id+'">'+
                    'title : ' + board_list[i].title+'<br>'+
                    'type : ' +board_list[i].type+'<br>'+
                    'contents : ' + board_list[i].contents+'<br>'+
                    'reg_data : ' + board_list[i].reg_date+'<br>'+
                    'nickname : ' + board_list[i].nickname+'<br>'+
                    'hits : ' + board_list[i].hits+'<br>'+
                    '<a href="/admin/modify_board/'+board_list[i].board_id+'"><button >수정</button></a>'+
                    '<a href="/admin/delete_board/'+board_list[i].board_id+'"><button >삭제</button></a>'+
                '</div>'
            )
        }
    }
})
</script>