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
	<body id="About">

	<?php include 'includes/header.php'; ?>
	<div class="container">
		<article class="row">
			<div class="col-md-4 visible-xs">
				<?php include 'includes/sidebar.php'; ?>
			</div>
		
			<section class="col-lg-8">
				<div class="panel panel-info">
					<div class="panel panel-heading">
							<h3>About Us</h3>
							
							

					</div><!--panel heading-->	
					<div class="" style="font-size:16px; padding:5px;">
						<b>Lorem Ipsum</b><br/><br/>
						<p>
						"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."
						"There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain..."<br/><br/></p>
						
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ipsum neque, ultricies a purus congue, rhoncus maximus nisl. Ut vestibulum enim non facilisis aliquet. Nulla non turpis nec ex facilisis rutrum nec eget tellus. Sed eu volutpat elit, nec rutrum enim. Curabitur faucibus consequat magna, non mollis tortor. Nullam at venenatis elit, quis dapibus libero. Maecenas eleifend est vestibulum sollicitudin volutpat. Donec aliquet eget ante non varius. Fusce imperdiet ornare bibendum. Proin eget risus ut neque egestas efficitur. Curabitur commodo eget lectus eget facilisis. <br/><br/></p>
						<p>
						Proin a nibh tellus. Integer a fermentum sem, nec tincidunt turpis. Vivamus gravida augue sed turpis mattis luctus. Sed at iaculis massa. Quisque sit amet posuere orci, sed lacinia nulla. Nulla quis libero sit amet dolor ornare iaculis eu feugiat turpis. Vestibulum non nisl hendrerit, luctus nibh iaculis, fermentum sem. Phasellus dapibus lobortis efficitur. Nam massa arcu, porttitor eget tellus eu, fringilla scelerisque elit. Nam eu placerat mi, eget sodales lorem. Duis vel tempor dui, vel fermentum felis. Duis sed tortor vitae orci dapibus elementum ac eget ante. Duis in mollis diam. Integer quis porttitor nulla, commodo posuere urna. Praesent ut imperdiet quam, in congue velit. <br/><br/></p>
						In aliquam nibh nec lobortis consectetur. Nam placerat interdum libero, vitae laoreet erat. Duis at elit at metus consectetur finibus. Praesent congue libero eget congue laoreet. Sed a purus massa. Aliquam luctus tortor commodo vehicula facilisis. Duis at tincidunt tellus. Donec pulvinar, nisi vel lacinia pellentesque, nulla quam faucibus ante, ac convallis massa ante a ligula. Sed commodo augue vitae metus convallis, ac volutpat lacus tincidunt. Donec molestie rutrum orci, ut dignissim tortor auctor eget. Nunc sodales, eros ut placerat laoreet, ligula sem imperdiet neque, ut tempus ante felis vitae quam. <br/><br/>
						Nam nec gravida urna. Praesent eget pharetra orci, sit amet accumsan neque. Nulla eu consectetur nisi. Interdum et malesuada fames ac ante ipsum primis in faucibus. Praesent dignissim porta ullamcorper. Morbi blandit quam eu eros varius finibus. Sed porta est erat, sed dapibus nulla ullamcorper sed. Vivamus finibus sagittis lorem. In imperdiet a erat volutpat pretium. Donec efficitur eros nisi, ac consectetur ipsum suscipit quis. Nullam scelerisque consectetur elit. Donec hendrerit id diam eu fermentum. Aenean lacinia nisl lectus, vel viverra arcu consectetur vel. Aenean vestibulum arcu sed massa lacinia tristique. <br/><br/>
						Ut consectetur vitae nunc vitae tincidunt. Morbi lobortis vulputate turpis, suscipit tristique nisl tristique nec. In sit amet cursus est, eget sodales enim. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent diam magna, rhoncus sed dapibus at, dapibus quis ipsum. Proin leo arcu, convallis nec elit at, finibus ornare velit. Suspendisse sed mi mauris. Praesent a diam nulla. Suspendisse potenti. Nam accumsan, dui vel tempus semper, nisl erat cursus odio, nec feugiat ex nibh sit amet massa. Nullam porttitor mi id mauris eleifend, et imperdiet nulla tincidunt. Pellentesque aliquet aliquam nunc, ut euismod ante luctus quis. Mauris non lacinia neque, at fermentum leo. Sed felis nisi, tincidunt nec nunc sit amet, rhoncus dignissim mi. Quisque nunc magna, tempor quis nulla vitae, posuere pellentesque ligula. <br/></p>
													
							
							</div>
					
				</div><!--panel info-->	
			</section>

			<div class="visible-lg col-md-4 pull-right"><?php include 'includes/sidebar.php'; ?></div>

		</article>
	</div><!--container-->

	<div style="margin:50px;width:50px;height:50px;"></div>
	
	<?php include_once 'includes/footer.php'; ?>
	  

	</body>
</html>