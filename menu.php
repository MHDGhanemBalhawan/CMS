<?php include 'includes/db.php'; 
	
?>


<DOCTYPE html>
<html>
	<head>

	<title>MHD Ghanem Balhawan</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	
	<script src="bootstrap/js/jquery.js"></script>
	<script src="bootstrap/js/bootstrap.js"></script>
	<script src="bootstrap/js/myscript.js"></script> 



	</head>
	<body id="Articles">
	<?php include 'includes/header.php';?>
	<div class="container">
		<article class="row">
			<div class="col-md-4 visible-xs">
				<?php include 'includes/sidebar.php'; ?>
			</div>
			<section class="col-lg-8 pull-left">
				<?php
					$sel_sql = "SELECT * FROM `tbl_post` where pos_category = '$_GET[cat_name]' AND pos_status ='published'";
					$pre_sql = mysqli_query($conn,$sel_sql);
						while($rows = mysqli_fetch_assoc($pre_sql)){
							echo '
							<div class = "panel panel-success">
								<div class="panel-heading">
								<a class="hidden" href="post.php">'.$rows['pos_category'].'</a>
									<h3><a href ="post.php?pos_id='.$rows['pos_id'].'">'.$rows['pos_title'].'</a></h3>
								</div>
								<div class="panel-body">
									<div class = "col-lg-4">
										<img src="'.$rows['pos_image'].'" width = "100%">
									</div>
									<div class="col-lg-8">
										<p>'.substr($rows['pos_description'],0,250).'......</p>
									</div>
										<a href ="post.php?pos_id='.$rows['pos_id'].'" class = "btn btn-primary">Read More</a>
								</div>
							</div>
							';
							}
				?>
			</section>
			
			<div class="visible-lg col-md-4 pull-right"><?php include 'includes/sidebar.php'; ?></div>

		</article>

	</div>
	<div style="margin:50px;width:50px;height:50px;"></div>
	<?php include 'includes/footer.php'; ?>
	</body>
</html>