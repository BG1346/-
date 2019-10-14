<div id="container">
<div id="subcontainer">
<br>
<ul>
<?php

foreach($category as $iter){
        ?>
        <li>
        	<a href="/index/categorize_page?category=<?php echo $iter->category?>"><?php echo $iter->category?></a>
        </li>
        <?php
}
?>
</ul>
<br>
<div class="subcategory">
<ul>
<?php 
    foreach($subcategory as $iter){
        ?>
        <li>
            <a href="/index/categorize_page?category=<?php echo $_GET['category']?>&subcategory=<?php echo $iter->subcategory?>" id="title">
            <?php echo $iter->subcategory?>
            </a>
        </li>
        <?php
    }
?>
</ul>
</div>
<?php

// spot 테이블 전체 반환
if(empty($list)){
	echo '내용이 존재하지 않습니다. ';
}
else{
	foreach ($list as $lt)
	{
	?>
	<div id ="card">
		<div id="item1"><a href="/index/spot_view?id=<?php echo $lt->id; ?>"><img src="/image/<?php echo $lt->imagepath?>"></a></div>
		<div id="item2"><a href="/index/spot_view?id=<?php echo $lt->id; ?>"><?php echo $lt->title; ?></a></div>
		<div id="item3"><?php echo $lt->hits;  ?></div>
		<div id="item4"><?php echo $lt->desc;  ?></div>
	</div>

	<?php
	}
}
?>
</div>
</div>
			</tbody>
			<tfoot>
				<tr>
                    <!-- <th colspan="5"><?php echo $pagination;?></th> -->
				</tr>
			</tfoot>
		</table>
</body>