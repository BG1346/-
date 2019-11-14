<article id="board_area">
		<header>
			<h1></h1>
		</header>
<?php
$attributes = array('class' => 'form-horizontal', 'id' => 'auth_login');
echo form_open('/index/signin', $attributes);
?>
<!-- <form action="/index/signin" method="post"> -->
		  <fieldset>
		    <legend>로그인</legend>
		    <div class="control-group">
		      <label class="control-label" for="input01">이메일</label>
		      <div class="controls">
		        <input type="text" class="input-xlarge" id="input01" name="email" value="<?php echo set_value('email'); ?>">
		        <p class="help-block"></p>
		      </div>
		      <label class="control-label" for="input02">비밀번호</label>
		      <div class="controls">
			  <input type="password" class="input-xlarge" id="input02" name="password" value="<?php echo set_value('password'); ?>">
			  <!-- <input type="password" class="input-xlarge" id="input02" name="password"> -->
		        <p class="help-block"></p>
		      </div>

			  <div class="controls">
		        <p class="help-block"><?php echo validation_errors(); ?></p>
		      </div>

		      <div class="form-actions">
		        <button type="submit" class="btn btn-primary">확인</button>
		        <!-- <button class="btn" onclick="document.location.reload()">취소</button> -->
                <!-- <button class="btn" onclick="history.back()">취소</button> -->
                <!-- <button class="btn" onclick="back()">취소</button> -->
		      </div>
		    </div>
		  </fieldset>
		  
		</form>
		<button onclick="history.back()">취소</button>
	</article>
<script>
function back(){
    alert("dlfkjs");
}
</script>