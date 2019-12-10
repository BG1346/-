<head>
<link rel="stylesheet" type="text/css" href="/css/account_css.css">
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