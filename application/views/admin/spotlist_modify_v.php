<article id="board_area">
<?php
$attributes = array('class' => 'form-horizontal', 'id' => 'write_action');
echo form_open_multipart('/admin/modify_spotlist', $attributes);
?>
		  <fieldset>
		    <legend>게시물 쓰기</legend>
		    <div class="control-group">
                <div class="controls">
                    <input type="hidden" class="input-xlarge" id="input01" name="id" value="<?php echo set_value('id'); ?>">
                </div>

                <div class="jb-wrap">
                <div class="jb-image"><img src="/image/<?php echo set_value('imagepath'); ?>" alt="error"></div>
                    <div class="jb-text">
                        <p id="title"><input type="text" class="input-xlarge" id="input01" name="title" value="<?php echo set_value('title'); ?>"></p>
                        <p><input class="input-xlarge" id="input02" name="desc" rows="5" value=<?php echo set_value('desc'); ?> /></p>
                        <a id="toggle_like">
                        <i id="heart" class="far fa-heart"></i>
                        &nbsp;<span id="heart_num"><input type="text" class="input-xlarge" id="input01" name="like" value="<?php echo set_value('like'); ?>"></span></a>
                        <p><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span><input type="text" class="input-xlarge" id="input01" name="hits" value="<?php echo set_value('hits'); ?>"></p>
                    </div>
                </div>
                </div>
                <div id="view_content">
                <br><br><br><br><br><br>
                content = <textarea class="input-xlarge" id="input02" name="content" rows="5"><?php echo set_value('content'); ?></textarea>
                <br><br>
                <div style="text-align : left;">
                <p><span class="glyphicon glyphicon-home" aria-hidden="true"></span><input class="input-xlarge" id="input02" name="addr" rows="5" value=<?php echo set_value('addr'); ?> /></p>
                <p><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span><input class="input-xlarge" id="input02" name="tel1" rows="5" value=<?php echo set_value('tel1'); ?> /></p>
                <p><span class="glyphicon glyphicon-time" aria-hidden="true"></span><input class="input-xlarge" id="input02" name="tel2" rows="5" value=<?php echo set_value('tel2'); ?> /></p>
                </div>
                <label class="control-label" for="input01">category</label>
                <div class="controls">
                    <select name="category">
                        <?php 
                        for($i = 0 ; $i < count($category_list) ; $i++){
                            echo set_value('category').'<br>';
                            echo $category_list[$i]->category;
                        ?>
                            <?php
                            if($category_list[$i]->category == set_value('category')){
                                ?><option value="<?php echo $category_list[$i]->category ?>" selected="selected"><?php echo $category_list[$i]->category ?></option>
                            <?php
                            }
                            else{
                            ?>
                                <option value="<?php echo $category_list[$i]->category ?>"><?php echo $category_list[$i]->category ?></option>
                            <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <label>hours</label><br>
                    <input class="" id="input02" name="hours" rows="5" value=<?php echo set_value('hours'); ?> /><br>
                <label class="control-label" for="input02">x좌표(kakao)</label><br>
                    <input class="input-xlarge" id="input02" name="x" rows="5" value=<?php echo set_value('x'); ?> /><br>
                <label class="control-label" for="input02">y좌표(kakao)</label><br>
                    <input class="input-xlarge" id="input02" name="y" rows="5" value=<?php echo set_value('y'); ?> /><br>
                <label class="control-label" for="input02">올릴 이미지</label><br>
                    <input type="file" name="userfile" size="20" value="<?php echo set_value('userfile');?>" /><br>

                <label>district</label><br>
                    <input class="input-xlarge" id="input02" name="district" rows="5" value=<?php echo set_value('district'); ?> /><br>
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


