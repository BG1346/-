<article id="board_area">
		<header>
			<h1></h1>
		</header>

		<!--<form class="form-horizontal" method="post" action="" id="write_action">-->
<?php
$attributes = array('class' => 'form-horizontal');
echo form_open('/index/board_modify_action?board_id='.$this->uri->segment(3), $attributes);
?>
		  <fieldset>
		    <legend>게시물 쓰기</legend>
		    <div class="control-group">
                <label class="control-label" for="input01">제목</label>
                <div class="controls">
                    <input type="text" class="input-xlarge" id="input01" name="title" value="<?php echo set_value('title'); ?>">
                    <p class="help-block">게시물의 제목을 써주세요.</p>
                </div>
                <label class="control-label" for="input01">타입</label>
                <div class="controls">
                    <select name="type" value="<?php echo set_value('type') ?>">
                        <option value="일반">일반</option>
                        <option value="문의">문의</option>
                        <option value="기타">기타</option>
                    </select>
                    <!-- <input type="text" class="input-xlarge" id="input03" name="type" value="<?php echo set_value('type'); ?>">
                    dfkjsdlkfj<?php echo set_value('type');?>ㄹ이ㅏ널 -->
                    <p class="help-block">게시물의 타입 써주세요.</p>
                </div>
                <label class="control-label" for="input02">내용</label>
                <div class="controls">
                    <textarea class="input-xlarge" id="input02" name="contents" rows="5"><?php echo set_value('contents'); ?></textarea>
                    <p class="help-block">게시물의 내용을 써주세요.</p>
                </div>

                <div class="controls">
                    <p class="help-block"><?php echo validation_errors(); ?></p>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary" id="write_btn">작성</button>
                    <!-- <button class="btn" onclick="document.location.reload()">취소</button> -->
                </div>
		    </div>
		  </fieldset>
		</form>
        <button onclick="history.back()">취소</button>
	</article>