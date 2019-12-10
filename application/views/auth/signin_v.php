<head>
<link rel="stylesheet" type="text/css" href="/css/signin_css.css">
</head>

<div id="signin_box">
<form action="/index/signin" method="post" id="signin_form">
	<fieldset>
	<p>로그인</p>
	<div class="control-group">
		<table id="signin_table">
			<tr>
				<div class="controls">
					<td class="first_td"><label class="control-label" for="input01">이메일</label></td>
					<td><input type="text" class="input-xlarge" id="input01" name="email" value="<?php echo set_value('email'); ?>"></td>
					<td rowspan="2" class="signin_button_wrapper"><button type="submit" class="btn btn-primary" id="signin_button">제출</button></td>
					<p class="help-block"></p>
				</div>
			</tr>
			<tr>
				<div class="controls">
					<td><label class="control-label" for="input02">비밀번호</label></td>
					<td><input type="password" class="input-xlarge" id="input02" name="password" value="<?php echo set_value('password'); ?>"></td>
				</div>
			</tr>
		</table>
		<p class="help-block"></p>
				
		<div class="controls">
		<p class="help-block"><?php echo validation_errors(); ?></p>
		</div>
		<div class="form-actions">
		</div>
	</div>
	</fieldset>  
</form>
</div>
<!-- <button onclick="history.back()">취소</button> -->
	</article>
<script>
function back(){
    alert("dlfkjs");
}
</script>