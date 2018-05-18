<?php 
	
	include 'includes/db.php'; 
	include 'functions/functions.php'; 
		// getting user ip
	    $ip = getIp();
		
	if(isset($_POST['save_register'])){
	// escape variables for security
		
		$role = mysqli_real_escape_string($conn, $_POST['role']);
		$first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
		$last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);
		$gender = mysqli_real_escape_string($conn, $_POST['gender']);
		$marital_status = mysqli_real_escape_string($conn, $_POST['marital_status']);
		$phone_no = mysqli_real_escape_string($conn, $_POST['phone_no']);
		$designation = mysqli_real_escape_string($conn, $_POST['designation']);
		$website = mysqli_real_escape_string($conn, $_POST['website']);
		$address = mysqli_real_escape_string($conn, $_POST['address']);		
		$about_me = mysqli_real_escape_string($conn, $_POST['about_me']);
		$date = date('Y-m-d h:i:s');
		$ins_sql = "INSERT INTO tbl_user (user_role, user_first_name, user_last_name, user_email, user_password, user_gender, user_marital_status, 
		user_phone_no, user_designation, user_website, user_address, user_about_me, user_date,user_ip) VALUES ('$role', '$first_name', '$last_name', '$email',
		'$password', '$gender', '$marital_status', '$phone_no', '$designation', '$website', '$address', '$about_me', '$date','$ip')";
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
	</head>
	<body id="Register">
	<?php include 'includes/header.php'; ?>
	<div class="container">
		<article class="row">
			<div class="col-md-4 visible-xs">
				<?php include 'includes/sidebar.php'; ?>
			</div>
			<section class="col-lg-8">
				<div class="panel panel-info">
				<div class="panel panel-heading">
						<h3>Register</h3>
				</div>
				<form class="form-horizontal" action="register.php" method="post" role="form" autocomplete="off">
					<div class="form-group">
						<!--hidden textbox for the role-->
						<div class="col-sm-8">
							<input type="hidden" class="form-control" value="subscriber" name="role" placeholder="role" id="role">
						</div>
					</div><!--form-group-->
					<div class="form-group">
						<label for="first_name" class="col-sm-3 control-label">First Name *</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="first_name" placeholder="First Name" id="first_name" required>
						</div>
					</div><!--form-group-->
					<div class="form-group">
						<label for="last_name" class="col-sm-3 control-label">Last Name *</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="last_name" placeholder="Last Name" id="last_name" required>
						</div>
					</div><!--form-group-->
					<div class="form-group">
						<label for="email" class="col-sm-3 control-label">Email Address *</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="email" placeholder="Email" id="email" required>
						</div>
					</div><!--form-group-->
					<div class="form-group">
						<label for="password" class="col-sm-3 control-label">Password *</label>
						<div class="col-sm-8">
							<input type="password" class="form-control" name="password" placeholder="Password" id="password" required>
						</div>
					</div><!--form-group-->
					<div class="form-group">
						<label for="con_password" class="col-sm-3 control-label">Confirm Password *</label>
						<div class="col-sm-8">
							<input type="password" class="form-control" name="con_password" placeholder="Confirm Password" id="con_password" required>
						</div>
					</div><!--form-group-->
					<div class="form-group">
						<label for="gender" class="col-sm-3 control-label">Gender</label>
						<div class="col-sm-3">
							<select class="form-control" id="gender" name="gender">
								<option>Select Gender</option>
								<option value="male">Male</option>
								<option value="female">Female</option>
							</select>
						</div>
						<label for="marital_status" class="col-sm-2 control-label">Marital Status</label>
						<div class="col-sm-3">
							<select class="form-control" id="marital_status" name="marital_status">
								<option value="">Select Status</option>
								<option value="single">Single</option>
								<option value="married">Married</option>
								<option value="divorced">Divorced</option>
								<option value="other">Other</option>
							</select>							
						</div>
					</div><!--form-group-->	
					<div class="form-group">
						<label for="phone_no" class="col-sm-3 control-label">Phone Number *</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="phone_no" placeholder="Phone Number" id="phone_no" required>
						</div>
					</div><!--form-group-->	
					<div class="form-group">
						<label for="designation" class="col-sm-3 control-label">Designation</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="designation" placeholder="Designation" id="designation" required>
						</div>
					</div><!--form-group-->	
					<div class="form-group">
						<label for="website" class="col-sm-3 control-label">Website</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="website" placeholder="Website" id="website">
						</div>
					</div><!--form-group-->						
					<div class="form-group">
						<label for="address" class="col-sm-3 control-label">Address</label>
						<div class="col-sm-8">
							<textarea class="form-control" rows="3" name="address" id="address" style="resize:none;"></textarea>
						</div>
					</div><!--form-group-->						
					<div class="form-group">
						<label for="about_me" class="col-sm-3 control-label">About Me</label>
						<div class="col-sm-8">
							<textarea class="form-control" rows="6" name="about_me" style="resize:none;"></textarea>
						</div>
					</div><!--form-group-->
					<div class="form-group">
						<label class="col-sm-3 control-label"></label>
						<div class="col-sm-8">
							<input type="submit" value="Save Your Information" class="btn btn-block btn-danger" name="save_register" id="save_register">
						</div>
					</div><!--form-group-->	
				</div><!--panel-->	
				</form>	
			</section>
			<div class="visible-lg col-md-4 pull-right"><?php include 'includes/sidebar.php'; ?></div>

		</article>
	</div><!--container-->
	<div style="margin:50px;width:50px;height:50px;"></div>

	<?php include_once 'includes/footer.php'; ?>
	
	</body>
</html>