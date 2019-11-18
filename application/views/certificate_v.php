<article id="board_area">
		<header>
			<h1></h1>
		</header>
<?php
print_r($_POST);
echo '<br>';
echo form_open('/index/certificate');
?>
		  <fieldset>
		    <legend>회원가입</legend>
		    <div class="control-group">
				<label class="control-label" for="input00">이메일</label>	
				<div class="controls">
					<input type="hidden" class="input-xlarge" id="input00" name="email" value="<?php echo set_value('email'); ?>">
				</div>
				<label class="control-label" for="input01">인증번호</label>
				<div class="controls">
					<input type="text" class="input-xlarge" id="input01" name="cert_number" value="<?php echo set_value('cert_number'); ?>">
					<p class="help-block"></p>
				</div>
				<div class="controls">
					<p class="help-block"><?php echo validation_errors(); ?></p>
					<?php
					if(isset($error_message))
						echo $error_message;
					?>
				</div>

				<div class="form-actions">
					<button type="submit" class="btn btn-primary">확인</button>
					<!-- <button class="btn" onclick="document.location.reload()">취소</button> -->
			</div>
		    </div>
		  </fieldset>
		</form>
		<button onclick="history.back()">dflksjfdl</button>
	</article>
