<head>
<style>
    .board_iter{
        border : 1px solid black;
    }
    .attached_image {
        width : 100px;
        height : 100px;
    }
    #category_name {
        padding-top : 40px;
        text-align: center;
        color : #AAAAAA;
        font-family : NanumBarunGothic;
    }
    #write_button{
        margin : 10px;
    }
    #write_button_wrapper {
        width : 70%;
        text-align : right;
        margin : auto;
    }
    .board_button_wrapper{
        position : absolute;
        right : 10px;
    }
    .user_icon{
        display : inline;
        width : 30px;
        height : 30px;
        margin-right : 20px;
    }
    .board_contents{
        padding : 10px;
    }
    .board_title{
        font-size : 2em;
        margin-right : 10px;
    }
    #pagination_div_wrapper{
        padding-top : 30px;
        display : grid;
        grid-template-columns : 33% 33% 33%;
    }
    #pagination_list{
        padding : 0px;
        text-align : center;
        height : 10px;
    }
    pagination_wrapper > * {   
        margin-left : 5px;
    }
    pagination_wrapper * {
        color : #AAAAAA;
    }
    pagination_cur_tag{
        color : #CC7B33;
    }
    .badge{
        background-color : #CC7B33;
    }
    #board_list{
        width : 70%;
        margin : auto;
    }
</style>
</head>
<body>
    <h1 id="category_name">Board</h1>
    <div id="write_button_wrapper">
        <button onclick="location.href='/index/board_write'" id="write_button">글쓰기</button>
    </div>
    <div id="board_list">
    </div>
    <div id="pagination_div_wrapper">
        <div>
        </div>
        <div id="pagination_list">
            <?php echo $pagination;?>
        </div>
        <div>
        </div>
    </div>

</body>
<script>
function board_delete(id){location.href='/index/board_delete/'+id;}
function board_modify(id){location.href='/index/board_modify/'+id;}
user_id = '<?php  if(isset($_SESSION['user_id'])) echo $_SESSION['user_id']; ?>';
$(document).ready(function(){
    var board_list = <?php echo json_encode($board_pagination_list); ?>;
    for(var i = 0 ;i <board_list.length ; i++){

            var today = new Date();
            reg_date = '';
            if(today.getFullYear() == board_list[i].reg_date.substr(0, 4) && today.getMonth()+1 == board_list[i].reg_date.substr(5).substr(0, 2)
                && today.getDate() == board_list[i].reg_date.substr(8).substr(0, 2)){
                    reg_date = board_list[i].reg_date.substr(10).substr(0, 6);
            }
            else{
                reg_date = board_list[i].reg_date.substr(2, 8);
            }
            $("#board_list").append(
                '<div style="border : 1px solid black; position : relative" id="'+board_list[i].board_id+'" class="board_contents">'+
                    '<a href="/auth/get_account/'+board_list[i].user_id+'"><img src="/image/user_icon.png" class="user_icon"></a>'+
                    '<span class="board_title">'+board_list[i].title+'</span>'+
                    '<span class="badge">' +board_list[i].type+'</span><br>'+
                    '<p class="board_contents">'+board_list[i].contents+'</p>'+
                    '<div class="board_button_wrapper">'+
                        '<span id="board_list_modify_button_'+i+'"></span>'+
                        '<span id="board_list_delete_button_'+i+'"></span>'+
                    '</div>'+
                    '' + reg_date+'<br>'+
                    '<span id="board_list_file_'+i+'"></span>'+
                    
                '</div>'
            )
            if(user_id == board_list[i].user_id){
                $("#board_list_modify_button_"+i).append('<button onclick="board_modify('+board_list[i].board_id+')">수정</button>');
                $("#board_list_delete_button_"+i).append('<button onclick="board_delete('+board_list[i].board_id+')">삭제</button>');
            }
            if(board_list[i].attached_file_name != '' && board_list[i].attached_file_name != null){
                $("#board_list_file_"+i).append(
                    '<br>'+
                    '<h4>첨부파일</h4><br>'+
                    '<a href="'+board_list[i].attached_file_path+'"><image class="attached_image" src="'+board_list[i].attached_file_path+'"></a><br>'
                );
            }
    }
})
</script>