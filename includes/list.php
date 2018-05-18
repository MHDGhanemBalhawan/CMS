<div class="list-group pull-right">
	<?php
		$sel_side = "SELECT * FROM tbl_post WHERE pos_status ='published' limit 5";
		$pre_side = mysqli_query($conn,$sel_side);
		while($rows = mysqli_fetch_assoc($pre_side)){
			if(isset($_GET['pos_id'])){
				if($_GET['pos_id'] == $rows['pos_id']){
					$class="active";							
				} else {
					$class="";
				}
			}else {
				$class="";
			}				
				echo '
				<a href="post.php?pos_id='.$rows['pos_id'].'" class="list-group-item '.$class.'">
					<div class="col-sm-4">
						<img src="'.$rows['pos_image'].'" width="100%">
					</div>
					<div class="col-sm-8">
						<h4 class="list-group-item-heading">'.$rows['pos_title'].'</h4>
						<p class="list-group-item-text">'.substr($rows['pos_description'],0,50).'</p>
					</div>
					<div style="clear:both;"></div>
				</a>
				';
		}
	?>

</div>