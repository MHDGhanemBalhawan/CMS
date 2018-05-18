<?php 
		include 'includes/db.php'; 
		include 'functions/functions.php'; 
		// getting user ip
	    $ip = getIp();
		
		if(isset($_POST['submit_comment'])){
	// escape variables for security
		$status = mysqli_real_escape_string($conn, $_POST['status']);
		$name = mysqli_real_escape_string($conn, $_POST['name']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$subject = mysqli_real_escape_string($conn, $_POST['subject']);
		$comment = mysqli_real_escape_string($conn, $_POST['comment']);
		$date = date('Y-m-d h:i:s');
		$ins_sql = "INSERT INTO tbl_comment (com_status, com_name, com_email, com_subject, com_comment, com_date,com_user_ip) VALUES ('$status', '$name', '$email', '$subject', '$comment', '$date','$ip')";
		$pre_sql = mysqli_query($conn, $ins_sql);
	}
?>
<DOCTYPE html>
<html>
	<head>
	<?php include 'includes/db.php'; ?>
	<title>MHD Ghanem Balhawan</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<script src="bootstrap/js/myscript.js"></script>
	<script src="bootstrap/js/jquery.js"></script>
	<script src="bootstrap/js/bootstrap.js"></script>
	
	    </style>
	
 
	</head>
	<body id="Contact">

	<?php include 'includes/header.php'; ?>
	<div class="container">
		<article class="row">
			<div class="col-md-4 visible-xs">
				<?php include 'includes/sidebar.php'; ?>
			</div>
			<section class="col-lg-8">
				<div class="panel panel-info">
				<div class="panel panel-heading">
						<h3>Contact Us</h3>
				<form class="form-horizontal" action="contact.php" method="post" role="form" autocomplete="off">
					<div class="form-group">
						<!--hidden textbox for the role-->
						<div class="col-sm-8">
							<input type="hidden" class="form-control" value="edit" name="status" id="status">
						</div>
					</div><!--form-group-->
				<form class="form-horizontal" action="contact.php" method="post" role="form">
					<div class="form-group">
						<label for="name" class="col-sm-3 control-label">Name *</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" name="name" placeholder="Name" id="name" required>
						</div>
						</div><!--form-group-->
					<div class="form-group">
						<label for="email" class="col-sm-3 control-label">Email Address *</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" name="email" placeholder="Email" id="email" required>
						</div>
					</div><!--form-group-->
					<div class="form-group">
						<label for="subject" class="col-sm-3 control-label">Subject *</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" name="subject" placeholder="Subject" id="subject" required>
						</div>
					</div><!--form-group-->
					<div class="form-group">
						<label for="comment" class="col-sm-3 control-label">Comment</label>
						<div class="col-sm-7">
							<textarea class="form-control" rows="10" name="comment" style="resize:none;"></textarea>
						</div>
					</div><!--form-group-->
					<div class="form-group">
						<label class="col-sm-3 control-label"></label>
						<div class="col-sm-7">
							<input type="submit" value="Submit Your Comment" class="btn btn-block btn-danger" name="submit_comment" id="submit_comment">
						</div>
					</div><!--form-group-->
					
					
					
					
				</div><!--panel-->	
				<div class="panel panel-heading">
					<pclass="glyphicons "><b>Address: SE7 8AY, London, UK</b></p>
					<p><b>Mobile: 09999999<b/></p>
					<p><b>Email: support@mail.com</b></p>
					
				
				</div>
				
				<iframe width="100%" height="100%" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=London%20SE78AY%2C%20United%20Kingdom&key=AIzaSyBcCkNop_qbwRNaVhkHj8EaGZKz90OLy80" allowfullscreen>
				</iframe>
				
				</form>	
				
			</section>
	
			<div class="visible-lg col-md-4 pull-right"><?php include 'includes/sidebar.php'; ?></div>

		</article>

	

	</div><!--container-->


	<div style="margin:50px;width:50px;height:50px;"></div>
	
	<?php include_once 'includes/footer.php'; ?>
	  

	</body>
</html>