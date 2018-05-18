<?php session_start(); 
	include 'includes/db.php';
	if(isset($_SESSION['user']) && isset($_SESSION['password']) == true){
		$sel_sql = "SELECT user_role, user_first_name, user_last_name, user_email, user_gender, user_password, user_marital_status, user_phone_no, 
		user_designation, user_website, user_address, user_about_me FROM tbl_user WHERE user_email = '$_SESSION[user]' AND user_password = '$_SESSION[password]'";
		if($pre_sql = mysqli_query($conn, $sel_sql)){
			while($rows = mysqli_fetch_assoc($pre_sql)){
				$user_role = $rows['user_role'];
				$user_first_name = $rows['user_first_name'];
				$user_last_name =   $rows['user_last_name'];
				$user_email = $rows['user_email'];
				$user_gender = $rows['user_gender'];
				$user_marital_status = $rows['user_marital_status'];
				$user_phone_no = $rows['user_phone_no'];
				$user_designation = $rows['user_designation'];
				$user_website = $rows['user_website'];
				$user_address = $rows['user_address'];
				$user_about_me = $rows['user_about_me'];
				if(mysqli_num_rows($pre_sql) == 1 ){
					if($rows['user_role'] == 'admin'){
					}else{
						header('Location: ../index.php');
					}
				} else{
					header('Location: ../index.php');
				}	
			}
		}
	}else{
		header('Location: ../index.php');
	}
?>
<!DOCTYPE html>
<html>	
	<head>
	<title>Admin Panel</title>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
	<script src="../bootstrap/bootstrap/js/bootstrap.js"></script>
	<script src="../bootstrap/js/jquery.js"></script>
	</head>
	<body>
	<?php include 'includes/header.php'; ?>
	<?php include 'includes/sidebar.php'; ?>
	<div class="col-lg-8" style="padding-top:30px;">
			<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="col-md-2">
					<img src="../images/myAvatar.png" width="100%" class="img-thumbnail">
				</div>
				<div class="col-md-7">
					<h4><u><?php echo $user_first_name. ' '.$user_last_name; ?></u></h4>
					<p><i class="glyphicon glyphicon-file"></i> <?php echo $user_designation; ?></p>
					<p><i class="glyphicon glyphicon-road"></i> <?php echo $user_address; ?></p>
					<p><i class="glyphicon glyphicon-phone"></i> <?php echo $user_phone_no; ?></p>
					<p><i class="glyphicon glyphicon-envelope"></i> <?php echo $_SESSION['user']; ?></p>
				</div>
				<div class="clearfix"></div>
			</div>
			
			</div>
	</div>
	<div class="col-md-3">
		<div class="panel panel-default">
			<div class="panel panel-body">
				<table class="table talble-condensed">
					<tbody>
						<tr>
							<th>Gender</th>
							<td><?php echo ucfirst($user_gender); ?></td>
						</tr>
						<tr>
							<th>M. Status</th>
							<td><?php echo ucfirst($user_marital_status); ?></td>
						</tr>
						<tr>
							<th>Website</th>
							<td><?php echo $user_website; ?></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	
	</div>
	<div class="col-md-2">
		<div class="panel panel-default">
			<div class="panel-heading">
				<table class="table table-condened">
					<tbody>
						<tr>
							<td width="10%">1</td>
							<td>
								<a href="#">The First Post</a>
							</td>
						</tr>
						<tr>
							<td width="5%">2</td>
							<td>
								<a href="#">The Second Post</a>
							</td>
						</tr>
						<tr>
							<td width="5%">3</td>
							<td>
								<a href="#">The Third Post</a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				
				<h4>About Me</h4>
				<p><?php echo $user_about_me; ?></p> 
			</div>
		</div>
	</div>
	

	<footer></footer>
		<script src="/bootstrap/js/jquery.js"></script>
	<script src="/bootstrap/bootstrap/js/bootstrap.js"></script>
	
	</body>
	
</html>


