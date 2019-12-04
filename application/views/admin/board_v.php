<head>

</head>    
<body>
    <h1>게시판</h1>
    <button onclick="location.href='/index/board_write'">글쓰기</button>
    <div id="board_list">
    </div>
    <div id="pagination_div_wrapper">
    </div>
</body>
<script>
board_list = <?php echo json_encode($board_list); ?>;
user_id = '<?php  if(isset($_SESSION['user_id'])) echo $_SESSION['user_id']; ?>';
$(document).ready(function(){
    for(var i = 0 ;i < board_list.length ; i++){
        $("#board_list").append(
            '<div style="border : 1px solid black" id="board_list_wrapper_'+i+'">'+
                'title : ' + board_list[i].title+'<br>'+
                'type : ' +board_list[i].type+'<br>'+
                'contents : ' + board_list[i].contents+'<br>'+
                'reg_data : ' + board_list[i].reg_date+'<br>'+
                'nickname : ' + board_list[i].nickname+'<br>'+
                'hits : ' + board_list[i].hits+'<br>'+
                '<span id="board_list_file_'+i+'"></span>'+
                '<a href="admin/modify_board">수정</a>'+
                '<a href="admin/delete_board">삭제</a>'+
            '</div>'
        );
        if(board_list[i].attached_file_name != '' && board_list[i].attached_file_name != null){
            $("#board_list_file_"+i).append(
                '<br>'+
                'filename : ' + board_list[i].attached_file_name+'<br>'+
                'fileimage : <image style = "width : 100px; height : 100px;" class="attached_image" src="'+board_list[i].attached_file_path+'"><br>'+
                '<a href="'+board_list[i].attached_file_path+'">'+board_list[i].attached_file_name+'</a><br>'
            );  
        }
    }
})
</script>