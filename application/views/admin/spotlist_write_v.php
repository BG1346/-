<article id="board_area">
<?php
$attributes = array('class' => 'form-horizontal', 'id' => 'write_action');
echo form_open_multipart('/admin/spotlist_write', $attributes);
?>
		  <fieldset>
		    <legend>게시물 쓰기</legend>
		    <div class="control-group">
                <label class="control-label" for="input01">title</label>
                <div class="controls">
                    <input type="text" class="input-xlarge" id="input01" name="title" value="<?php echo set_value('title'); ?>">
                </div>

                <label class="control-label" for="input01">category</label>
                <div class="controls">
                    <select name="category" value="<?php echo set_value('category') ?>">
                        <?php 
                        for($i = 0 ; $i < count($category_list) ; $i++){
                        ?>
                            <option value="<?php echo $category_list[$i]->category ?>"><?php echo $category_list[$i]->category ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>


                <label class="control-label" for="input02">desc</label>
                <div class="controls">
                    <textarea class="input-xlarge" id="input02" name="desc" rows="5"><?php echo set_value('desc'); ?></textarea>
                </div>

                <label class="control-label" for="input02">contents</label>
                <div class="controls">
                    <textarea class="input-xlarge" id="input02" name="contents" rows="5"><?php echo set_value('contents'); ?></textarea>
                </div>

                <label class="control-label" for="input02">addr</label>
                <div class="controls">
                    <textarea class="input-xlarge" id="input02" name="addr" rows="5"><?php echo set_value('addr'); ?></textarea>
                </div>

                <label class="control-label" for="input02">hours</label>
                <div class="controls">
                    <textarea class="input-xlarge" id="input02" name="hours" rows="5"><?php echo set_value('hours'); ?></textarea>
                </div>

                <label class="control-label" for="input02">tel1</label>
                <div class="controls">
                    <textarea class="input-xlarge" id="input02" name="tel1" rows="5"><?php echo set_value('tel1'); ?></textarea>
                </div>

                <label class="control-label" for="input02">tel2</label>
                <div class="controls">
                    <textarea class="input-xlarge" id="input02" name="tel2" rows="5"><?php echo set_value('tel2'); ?></textarea>
                </div>

                <label class="control-label" for="input02">x좌표(kakao)</label>
                <div class="controls">
                    <textarea class="input-xlarge" id="input02" name="x" rows="5"><?php echo set_value('x'); ?></textarea>
                </div>

                <label class="control-label" for="input02">y좌표(kakao)</label>
                <div class="controls">
                    <textarea class="input-xlarge" id="input02" name="y" rows="5"><?php echo set_value('y'); ?></textarea>
                </div>

                <label class="control-label" for="input02">올릴 이미지</label>
                <div class="controls">
                    <input type="file" name="userfile" size="20" value="<?php echo set_value('userfile');?>"/>
                </div>

                <label class="control-label" for="input02">district</label>
                <div class="controls">
                    <textarea class="input-xlarge" id="input02" name="district" rows="5"><?php echo set_value('district'); ?></textarea>
                </div>
                
                <div class="controls">
                    <p class="help-block"><?php echo validation_errors(); ?></p>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary" id="write_btn">작성</button>
                </div>
		    </div>
		  </fieldset>
		</form>
        <button onclick="history.back()">취소</button>
	</article>