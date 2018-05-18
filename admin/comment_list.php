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
	if(isset($_GET['del_id'])){
			$del_id = $_GET['del_id'];
			$del_sql = "DELETE FROM tbl_comment WHERE com_id = '$del_id'";
			if($pre_sql = mysqli_query($conn,$del_sql)){
				$result = '<div class="alert alert-danger">You deleted row no. '.$del_id.' </div>';
			}
	}
		$per_page = 10;
	if(isset($_GET['page'])){
		$page = $_GET['page'];
	} else {
		$page = 1;
	}
	$start_from = ($page-1) * $per_page;
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
						<th>Action</th>
						<th>View</th>
						<th>Delete</th>
					</thead>
					<tbody>
					<?php
							
							$sel_sql = "SELECT * FROM tbl_comment ORDER BY com_id DESC";
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
										<td>'.($rows['com_status'] == 'edit'? '<a href="comment_list.php?new_status=approved&id='.$rows['com_id'].'" class="btn btn-primary btn-xs navbar-btn">Approve</a>': '<a href="comment_list.php?new_status=edit&id='.$rows['com_id'].'" class="btn btn-info btn-xs navbar-btn">Edit</a>').'</td>
										<td><a href="comment.php?com_id='.$rows['com_id'].'" class="btn btn-success btn-xs navbar-btn">View</a></td>
										<td><a href="comment_list.php?del_id='.$rows['com_id'].'" class="btn btn-danger btn-xs navbar-btn">Delete</a></td>
									</tr>
								';
								$number++;
							}
						?>
					</tbody>

				</table>
			</div>
		</div>
		<div class="text-center">
			<ul class="pagination">
			<?php
				$pagination_sql = "SELECT com_id FROM tbl_comment";
				$pre_pagination = mysqli_query($conn, $pagination_sql);
				$count = mysqli_num_rows($pre_pagination);
				$total_pages = ceil($count/$per_page);
				for($i=1;$i<=$total_pages;$i++){
					echo '<li><a href="comment_list.php?$page='.$i.'">'.$i.'</a></li>';
				}
			?>
				</ul>
		</div>
		
	</div>
	
	<footer></footer>
		<script src="/bootstrap/js/jquery.js"></script>
	<script src="/bootstrap/bootstrap/js/bootstrap.js"></script>
	
	</body>
	
	
	
	
	
	
</html>


