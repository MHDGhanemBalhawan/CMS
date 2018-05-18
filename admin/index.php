<?php session_start(); //create thr session
	include 'includes/db.php';
	// checking the session for the user and password
	if(isset($_SESSION['user']) && isset($_SESSION['password']) == true){
	// checking the user name and the password
		$sel_sql = "SELECT user_first_name, user_last_name,user_designation,  user_role, user_email, user_phone_no, user_password FROM tbl_user WHERE user_email = '$_SESSION[user]' AND user_password = '$_SESSION[password]'";
		if($pre_sql = mysqli_query($conn, $sel_sql)){
		while($rows = mysqli_fetch_assoc($pre_sql)){
		$name = $rows['user_first_name'].' '.$rows['user_last_name'];
		$job = $rows['user_designation'];
		$phone = $rows['user_phone_no'];
		$email = $rows['user_email'];
		$role = ucfirst($rows['user_role']);
		}
		
		// counting the number of rows in the database for the user and password
				if(mysqli_num_rows($pre_sql) == 1 ){
				}else{
				// if the session not exists send back to the main folder
					header('Location: ../index.php');
				}
		}
	}else{
		header('Location: ../index.php');
	}
	// counting posts
			$sel_sql = "SELECT pos_id FROM tbl_post WHERE pos_status = 'published'";
			$pre_sql = mysqli_query($conn, $sel_sql);
			$total_posts = mysqli_num_rows($pre_sql);
			
	//counting categories
			$sel_sql = "SELECT cat_id FROM tbl_category";
			$pre_sql = mysqli_query($conn, $sel_sql);
			$total_categories = mysqli_num_rows($pre_sql);
	//counting users
	
			$sel_sql = "SELECT user_id FROM tbl_user";
			$pre_sql = mysqli_query($conn, $sel_sql);
			$total_users = mysqli_num_rows($pre_sql);
	//counting comments
			$sel_sql = "SELECT com_id FROM tbl_comment";
			$pre_sql = mysqli_query($conn, $sel_sql);
			$total_comments = mysqli_num_rows($pre_sql);
?>
<!DOCTYPE html>
<html>	
	<head>
	<title>Admin Panel</title>
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
	<script src="/bootstrap/bootstrap/js/bootstrap.js"></script>
	<script src="bootstrap/js/jquery.js"></script>
       <script src="bootstrap/js/bootstrap.js"></script>
	

	
	</head>
	<body>
	<?php include 'includes/header.php'; ?>
	<?php include 'includes/sidebar.php';?>
	<?php //echo $_SESSION['user']; ?>
	<?php //echo $_SESSION['role']; ?>
	<?php //echo $_SESSION['password']; ?>
	
	<div class="col-lg-8" style="padding-top:30px;">
		<div class="col-md-3">

			<div class="panel panel-danger">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-3"><i class="glyphicon glyphicon-signal" style="font-size:4.5em"></i></div>
						<div class="col-xs-9 text-right">
							<div style="font-size="2.5em"><?php echo $total_posts; ?></div>
							<div>Posts</div>
						</div>
					</div>
				</div>
				<a href="post_list.php">
					<div class="panel-footer">
						<div class="pull-left">View Posts</div>
						<div class="clearfix"><i class="glyphicon glyphicon-circle-arrow-left pull-right"></i></div>
					</div>
				</a>
			</div>
		</div>
		<div class="col-md-3">
			<div class="panel panel-success">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-3"><i class="glyphicon glyphicon-th-list" style="font-size:4.5em"></i></div>
						<div class="col-xs-9 text-right">
							<div style="font-size="2.5em"><?php echo $total_categories; ?></div>
							<div>Categories</div>
						</div>
					</div>
				</div>
				<a href="category_list.php">
					<div class="panel-footer">
						<div class="pull-left">View Categories</div>
						<div class="clearfix"><i class="glyphicon glyphicon-circle-arrow-right pull-right"></i></div>
					</div>
				</a>
			</div>
		</div>
		<div class="col-md-3">
			<div class="panel panel-warning">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-3"><i class="glyphicon glyphicon-user" style="font-size:4.5em"></i></div>
						<div class="col-xs-9 text-right">
							<div style="font-size="2.5em"><?php echo $total_users; ?></div>
							<div>Users</div>
						</div>
					</div>
				</div>
				<a href="#">
					<div class="panel-footer">
						<div class="pull-left">View Users</div>
						<div class="clearfix"><i class="glyphicon glyphicon-circle-arrow-left pull-right"></i></div>
					</div>
				</a>
			</div>
		</div>
		<div class="col-md-3">
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-3"><i class="glyphicon glyphicon-comment" style="font-size:4.5em"></i></div>
						<div class="col-xs-9 text-right">
							<div style="font-size="2.5em"><?php echo $total_comments; ?></div>
							<div>Comments</div>
						</div>
					</div>
				</div>
				<a href="comment_list.php">
					<div class="panel-footer">
						<div class="pull-left">View Comments</div>
						<div class="clearfix"><i class="glyphicon glyphicon-circle-arrow-left pull-right"></i></div>
					</div>
				</a>
			</div>
		</div>
		<!--End Top Block -->
		<div class="clearfix"></div>
		
		<!--Users-->
		<div class="col-lg-6">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h4>Users List</h4>
				</div>
				<div class="panel-body">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>No</th>
								<th>Name</th>
								<th>Role</th>
							</tr>
						</thead>
						<tbody>
						<?php
							$sel_sql = "SELECT * FROM tbl_user LIMIT 5";
							$pre_sql = mysqli_query($conn, $sel_sql);
							$number = 1;
							while($rows = mysqli_fetch_assoc($pre_sql)){
								echo '
								<tr>
									<td>'.$number.'</td>
									<td>'.$rows['user_first_name'].' '.$rows['user_last_name'].'</td>
									<td>'.$rows['user_role'].'</td>
								</tr>
								';
								$number++;
							}
						?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
<!--Profile-->
		<div class="col-lg-6">
			<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="col-md-7">
					<div class="page-header"><h4><?php echo $name; ?></h4></div>
				</div>
				<div class="col-md-7">
					<img src="../images/myAvatar.png" width="60%" class="img-circle">
				</div>
				<div class="clearfix"></div>
					<div class="panel-body">
						<table class="table table-condensed">
							<tbody>
								<tr>
									<th>Job</th>
									<td><?php echo $job; ?></td>
								</tr>
								<tr>
									<th>Role</th>
									<td><?php echo $role; ?></td>
								</tr>
								<tr>
									<th>Email</th>
									<td><?php echo $email; ?></td>
								</tr>
								<tr>
									<th>Contact No.</th>
									<td><?php echo $phone; ?></td>
								</tr>
							</tbody>
						</table>
					</div>			
			</div>

			</div>
		</div>
		<div class="clearfix"></div>		
		<!--Post-->
		<div class="panel panel-primary">
			<div class="panel-heading"><h3>Latest Posts</h3></div>
			<div class="panel-body">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Date</th>
							<th>Image</th>
							<th>Title</th>
							<th>Description</th>
							<th>Category</th>
							<th>Author</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						<?php
							//$sel_sql = "SELECT * FROM tbl_post ORDER BY pos_id DESC";
							$sel_sql = "SELECT * FROM tbl_post p JOIN tbl_user u ON p.pos_author = u.user_email LIMIT 3";
							$pre_sql = mysqli_query($conn, $sel_sql);
							$number = 1;
							while($rows = mysqli_fetch_assoc($pre_sql)){
								echo '
									<tr>
										<td>'.$number.'</td>
										<td>'.$rows['pos_date'].'</td>
										<td>'.($rows['pos_image'] == '' ? 'No Image' : '<img src="../'.$rows['pos_image'].'" width="50px">').'</td>
										<td>'.substr($rows{'pos_title'},0,15).'....</td>
										<td>'.substr($rows['pos_description'],0,7).'...</td>
										<td>'.$rows{'pos_category'}.'</td>
										<td>'.$rows['user_first_name'].' '.$rows['user_last_name'].'</td>
										<td>'.ucfirst($rows['pos_status']).'</td>
									</tr>
								';
								$number++;
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
		<!--Comments-->
		<div class="panel panel-primary">
			<div class="panel-heading"><h3>Comments</h3></div>
			<div class="panel-body">
				<table class="table">
					<thead>
						<th>No</th>
						<th>Date</th>
						<th>Author</th>
						<th>Email</th>
						<th>Subject</th>
						<th>Comment</th>
						<th>Status</th>
					</thead>
					<tbody>
					<?php
							
							$sel_sql = "SELECT * FROM tbl_comment ORDER BY com_id DESC LIMIT 3";
							$pre_sql = mysqli_query($conn, $sel_sql);
							$number = 1;
							while($rows = mysqli_fetch_assoc($pre_sql)){
								echo '
									<tr>
										<td>'.$number.'</td>
										<td>'.$rows['com_date'].'</td>
										<td>'.$rows['com_name'].'</td>
										<td>'.$rows['com_email'].'</td>
										<td>'.$rows['com_subject'].'</td>
										<td>'.substr($rows['com_comment'],0,5).'...</td>
										<td>'.ucfirst($rows['com_status']).'</td>
									</tr>
								';
								$number++;
							}
						?>
					</tbody>

				</table>
			</div>
		</div>
	</div>
	<footer></footer>
	<script src="/bootstrap/js/jquery.js"></script>
	<script src="/bootstrap/bootstrap/js/bootstrap.js"></script>
	</body>
</html>