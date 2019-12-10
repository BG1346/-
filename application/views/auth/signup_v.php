<article id="board_area">
		<header>
			<h1></h1>
		</header>
<?php
echo form_open('/index/signup');
?>
		  <fieldset>
		    <legend>회원가입</legend>
		    <div class="control-group">
			  <label class="control-label" for="input04">이메일</label>
		      <div class="controls">
		        <input type="text" class="input-xlarge" id="input04" name="email" value="<?php echo set_value('email'); ?>">
		        <p class="help-block"></p>
		      </div>
		      <label class="control-label" for="input02">비밀번호</label>
		      <div class="controls">
		        <input type="password" class="input-xlarge" id="input02" name="password" value="<?php echo set_value('password'); ?>">
		        <p class="help-block"></p>
		      </div>
              <label class="control-label" for="input03">비밀번호</label>
		      <div class="controls">
		        <input type="password" class="input-xlarge" id="input03" name="password2" value="<?php echo set_value('password2'); ?>">
		        <p class="help-block"></p>
		      </div>
			  <label class="control-label" for="input04">닉네임</label>
		      <div class="controls">
		        <input type="text" class="input-xlarge" id="input04" name="nickname" value="<?php echo set_value('nickname'); ?>">
		        <p class="help-block"></p>
		      </div>
              

			  <div class="controls">
				<p class="help-block"><?php echo validation_errors(); ?></p>
				<?php
				if(isset($error_message)){
					echo $error_message.'<br>';
				}
				?>
		      </div>

		      <div class="form-actions">
		        <button type="submit" class="btn btn-primary">확인</button>
		        <button class="btn" onclick="document.location.reload()">취소</button>
			</div>
		    </div>
		  </fieldset>
		</form>
		<button onclick="history.back()">dflksjfdl</button>
	</article>
