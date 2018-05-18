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
		$sql = "UPDATE tbl_post SET  pos_status='$new_status' WHERE pos_id= $_GET[id]";
		if($pre_sql = mysqli_query($conn, $sql)){
			$result = '<div class="alert alert-success">Post Status is Updated</div>';
		}
	}
	if(isset($_GET['del_id'])){
			$del_id = $_GET['del_id'];
			$del_sql = "DELETE FROM tbl_post WHERE pos_id = '$del_id'";
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
							<th>Action</th>
							<th>Edit</th>
							<th>View</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>
						<?php
							//$sel_sql = "SELECT * FROM tbl_post ORDER BY pos_id DESC";
							$sel_sql = "SELECT * FROM tbl_post p JOIN tbl_user u ON p.pos_author = u.user_email ORDER BY pos_id DESC";
							$pre_sql = mysqli_query($conn, $sel_sql);
							$number = 1;
							while($rows = mysqli_fetch_assoc($pre_sql)){
								echo '
									<tr>
										<td>'.$number.'</td>
										<td>'.$rows['pos_date'].'</td>
										<td>'.($rows['pos_image'] == '' ? 'No Image' : '<img src="../'.$rows['pos_image'].'" width="50px">').'</td>
										<td>'.substr($rows{'pos_title'},0,15).'....</td>
										<td>'.substr($rows['pos_description'],0,10).'...</td>
										<td>'.$rows{'pos_category'}.'</td>
										<td>'.$rows['user_first_name'].' '.$rows['user_last_name'].'</td>
										<td>'.ucfirst($rows['pos_status']).'</td>
										<td>'.($rows['pos_status'] == 'draft'? '<a href="post_list.php?new_status=published&id='.$rows['pos_id'].'" class="btn btn-primary btn-xs navbar-btn">Publish</a>': '<a href="post_list.php?new_status=draft&id='.$rows['pos_id'].'" class="btn btn-info btn-xs navbar-btn">Draft</a>').'</td>
										<td><a href="edit_post.php?edit_id='.$rows['pos_id'].'" class="btn btn-warning btn-xs navbar-btn">Edit</a></td>
										<td><a href="../post.php?pos_id='.$rows['pos_id'].'" class="btn btn-success btn-xs navbar-btn">View</a></td>
										<td><a href="post_list.php?del_id='.$rows['pos_id'].'" class="btn btn-danger btn-xs navbar-btn">Delete</a></td>
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
				$pagination_sql = "SELECT pos_id FROM tbl_post";
				$pre_pagination = mysqli_query($conn, $pagination_sql);
				$count = mysqli_num_rows($pre_pagination);
				$total_pages = ceil($count/$per_page);
				for($i=1;$i<=$total_pages;$i++){
					echo '<li><a href="post_list.php?$page='.$i.'">'.$i.'</a></li>';
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