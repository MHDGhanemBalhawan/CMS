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
	$result ='';
	if(isset($_GET['del_id'])){
		$del_sql = "DELETE FROM tbl_category WHERE cat_id = '$_GET[del_id]'";
		if(mysqli_query($conn, $del_sql)){
			$result = '<div class="alert alert-danger">You deleted category id no '.$_GET['del_id'].'</div>';
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
	<div class="col-lg-8" style="padding-top:30px;">

		<div class="col-lg-8">
		<?php echo $result; ?>

			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3>Categories</h3>
				</div>
				<div class="panel-body">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>No</th>
								<th>Category Name</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
						<?php 
							$sel_sql = "SELECT cat_id, cat_name FROM tbl_category";
							$pre_sql = mysqli_query($conn, $sel_sql);
							$number = 1;
							while($rows = mysqli_fetch_assoc($pre_sql)){
								echo '							<tr>
								<td>'.$number.'</td>
								<td>'.ucfirst($rows['cat_name']).'</td>
								<td><a href="edit_category.php?cat_id='.$rows['cat_id'].'" class="btn btn-warning btn-xs">Edit</td>
								<td><a href="category_list.php?del_id='.$rows['cat_id'].'" class="btn btn-danger btn-xs">Delete</td>
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

	</div>
	
	<footer></footer>
		<script src="/bootstrap/js/jquery.js"></script>
	<script src="/bootstrap/bootstrap/js/bootstrap.js"></script>
	
	</body>
	
	
	
	
	
	
</html>


