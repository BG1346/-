<head>
<link rel="stylesheet" type="text/css" href="/css/board_modify_css.css">
</head>
<article id="board_area">
<?php
$attributes = array('class' => 'form-horizontal');
echo form_open('/index/board_modify_action?board_id='.$this->uri->segment(3), $attributes);
?>
  <fieldset>
        <legend id="write_title">게시물 수정</legend>
        <div class="control-group">
            <table id="write_table">
                <tr>
                    <th class="th_f" >
                        <label class="control-label" for="input01" >제목</label>
                    </th>
                    <td>
                        <input type="text" class="input-xlarge" id="input01" name="title" value="<?php echo set_value('title'); ?>" />
                    </td>
                </tr>
                <tr>
                    <td class="td_l td_l_1">
                        <label class="control-label" for="input01">타입</label>
                    </td>
                    <td>
                        <div class="controls">
                            <select name="type" value="<?php echo set_value('type') ?>" id="write_type">
                                <option value="일반">일반</option>
                                <option value="문의">문의</option>
                                <option value="기타">기타</option>
                            </select>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="td_l td_l_2">
                        <label class="control-label" for="input02">내용</label>
                    </td>
                    <td>
                        <textarea class="input-xlarge" id="input02" name="contents" rows="5"><?php echo set_value('contents'); ?></textarea>
                    </td>
                </tr>

                <tr>
                    <td class="td_l td_l_3">
                        <label class="control-label" for="input02">첨부파일</label>
                    </td>
                    <td>
                        <input type="file" name="userfile" size="20" value="<?php echo set_value('userfile');?>"/>
                    </td>
                </tr>

                <div class="controls">
                    <p class="help-block"><?php echo validation_errors(); ?></p>
                </div>

                <tr>
                    <td colspan="2" class="td_l_4">
                        <button type="submit" class="btn btn-primary" id="write_btn">작성</button>
                    </td>
                </tr>
            </table>
        </div>
        </fieldset>
		</form>
	</article>