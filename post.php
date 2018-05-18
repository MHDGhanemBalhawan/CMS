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
	<body id="post">
	<?php include 'includes/header.php';?>
	<div class="container">
		<article class="row">
			<div class="col-md-4 visible-xs">
				<?php include 'includes/sidebar.php'; ?>
			</div>
			<section class="col-lg-8">
				<?php
				if(isset($_GET['pos_id'])){
					$sel_sql = "SELECT * FROM `tbl_post` WHERE pos_id ='$_GET[pos_id]'";
					$pre_sql = mysqli_query($conn,$sel_sql);
						while($rows = mysqli_fetch_assoc($pre_sql)){
							echo '
							<div class = "panel panel-success">
								<div class="panel-heading">
									<h3><a href="post.php">'.$rows['pos_title'].'</a></h3>
								</div>
								<div class="panel-body">
									<img src="'.$rows['pos_image'].'" width = "100%"></br></br>
										<p>'.$rows['pos_description'].'</p>
								</div>
							</div>
							';
						}
				} else {
					echo '<div class="alert alert-danger">No post is selected to show! <a href="index.php"?>click here </a> to select a post"</div>';
				}

				?>
			</section>
			
			<div class="visible-lg col-md-4 pull-right"><?php include 'includes/sidebar.php'; ?></div>
			
		</article>
	</div>
	<div style="margin:50px; width:50px;height:50px;"></div>
	<footer class="navbar navbar-default navbar-fixt-bottom">
			<div class="container">
				<p class="nav-bar-text pull-left">Designed by Ghanem Balhawan</p>
				<a href="#" class="btn btn-success pull-right navbar-btn">Share</a>
			</div>	
	</footer>
	</body>
</html>