<DOCTYPE html>
<html>
	<head>
	<?php include 'includes/db.php'; ?>

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
			<div class="col-lg-4 visible-xs">
				<?php include 'includes/sidebar.php'; ?>
			</div>
			<section class="col-lg-7">
				<?php
				  // prevent sql injections/ clear user invalid inputs
				$search = mysqli_real_escape_string($conn, $_GET['search']);
					if(isset($_GET['submit_search'])){
						$search = strip_tags($search);
						$search = htmlspecialchars($search);
						$sel_sql = "SELECT * FROM `tbl_post` WHERE `pos_title` LIKE '%$search%' OR `pos_description` LIKE '%;DROP TABLE tbl_test; --%'";
						/* $sel_sql = "SELECT * FROM `tbl_post` WHERE `pos_title` LIKE '%$search%' OR `pos_description` LIKE '%$search%'"; */
						$pre_sql = mysqli_query($conn,$sel_sql);
							if(mysqli_fetch_array($pre_sql)==0){
								echo "<div class='alert alert-danger'>No post(s) to be found for: $search</div>";
								}else {
	
								echo "<div class='alert alert-info'>Search result for: $search</div>";
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
												<div class="col-lg-7">
													<p>'.substr($rows['pos_description'],0,250).'......</p>
												</div>
													<a href ="post.php?pos_id='.$rows['pos_id'].'" class = "btn btn-primary">Read More</a>
											</div>
										</div>
										';
									}
								}
					}
					
				?>
			</section>
			<div class="visible-lg col-lg-4 pull-right"><?php include 'includes/sidebar.php'; ?></div>

			
		</article>
		
	</div>
	
	
	
	<!--<div style="margin:50px;width:50px;height:50px;"></div> -->
	<div>
	<?php include 'includes/footer.php'; ?>
	</div>	
	
	</body>

</html>