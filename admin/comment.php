<?php session_start(); 
	include 'includes/db.php';
	if(isset($_SESSION['user']) && isset($_SESSION['password']) == true){
		$sel_sql = "SELECT user_role, user_email, user_password FROM tbl_user WHERE user_email = '$_SESSION[user]' AND user_password = '$_SESSION[password]'";
		if($pre_sql = mysqli_query($conn, $sel_sql)){
				while($rows = mysqli_fetch_assoc($pre_sql)){
					if(mysqli_num_rows($pre_sql) == 1 ){
						if($rows['user_role'] == 'admin'){
						} else {
							header('Location: ../index.php');
						}
					}else{
						header('Location: ../index.php');
					}	
				}
		}
	}else{
		header('Location: ../index.php');
	}
		$result = '';
	if(isset($_GET['new_status'])){
		$new_status = $_GET['new_status'];
		$sql = "UPDATE tbl_comment SET  com_status='$new_status' WHERE com_id= $_GET[id]";
		if($pre_sql = mysqli_query($conn, $sql)){
			$result = '<div class="alert alert-success">Comment Status is Updated</div>';
		}
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

	<div class="col-lg-9" style="padding-top:30px;">
	<?php 
		echo $result;
	?>
		<!--Comments-->
		<div class="panel panel-primary">
			<div class="panel-heading"><h3>Comment</h3></div>
			<div class="panel-body">
				<table class="table table-responsive">
					<thead>
						<th>No</th>
						<th>Date</th>
						<th>Author</th>
						<th>Email</th>
						<th>Subject</th>
						<th>Status</th>
						<th>Action</th>
						<th>Delete</th>
					</thead>
					<tbody style="height: auto;">
					<?php
							
							$sel_sql = "SELECT * FROM tbl_comment WHERE com_id ='$_GET[com_id]'";
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
										<td>'.ucfirst($rows['com_status']).'</td>
										<td>'.($rows['com_status'] == 'edit'? '<a href="comment_list.php?new_status=approved&id='.$rows['com_id'].'" class="btn btn-primary btn-xs navbar-btn">Approve</a>': '<a href="comment_list.php?new_status=edit&id='.$rows['com_id'].'" class="btn btn-info btn-xs navbar-btn">Edit</a>').'</td>
										<td><a href="comment_list.php?del_id='.$rows['com_id'].'" class="btn btn-danger btn-xs navbar-btn">Delete</a></td>
									</tr>
									<div class="row">
										<div class="col-lg-12" style="background-color:yellow;">'.$rows['com_comment'].'</div>
									</div>					
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


