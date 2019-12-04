<head>
    <style>
        #account_wrapper{
            text-align : center;
        }
        #account{
            width : 50%;
            margin : 100px auto;
            display : grid;
            grid-template-columns: 50% 50%;
        }
        #user_icon{
            width : 100%;
            height : 100%;
        }
        p{
            margin : 0;
        }
    </style>
</head>
<div id="account_wrapper">
    <div id="account">
        <div id="account_div_1">
            <img id="user_icon" src="/image/user_icon.png">
        </div>
        <div id="account_div_2">
            <p>nickname</p>
            <?php echo $_SESSION['nickname']; ?>
            <br><br>
            <p>email</p>
            <?php echo $_SESSION['email']; ?>
        </div>
    </div>
</div>