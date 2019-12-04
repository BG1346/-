<article id="board_area">
<form action="/admin/signin" method="post">
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
		        <p class="help-block"></p>
		      </div>

			  <div class="controls">
		        <p class="help-block"><?php echo validation_errors(); ?></p>
		      </div>

		      <div class="form-actions">
		        <button type="submit" class="btn btn-primary">확인</button>
		      </div>
		    </div>
		  </fieldset>
		  
		</form>
		<button onclick="history.back()">취소</button>
	</article>
<script>
</script>