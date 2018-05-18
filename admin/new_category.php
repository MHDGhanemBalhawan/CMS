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
	if(isset($_POST['submit_category'])){
		$category = strip_tags($_POST['category']);
		$ins_sql = "INSERT INTO tbl_category (cat_name) VALUE ('$category')";
		if(mysqli_query($conn,$ins_sql)){
			$result = '<div class="alert alert-success">You created new category named '.$category.'</div>';
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
	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
	<script>tinymce.init({ selector:'textarea' });</script>
	
	</head>
	<body>
	<?php include 'includes/header.php'; ?>
	<?php include 'includes/sidebar.php'; ?>
	<div class="col-lg-8">
	<?php echo $result; ?>
		<div class="page-header"><h1>New Category</h1></div>
		<div class="container-fluid">
		<form class="form-horizontal col-lg-5" action="new_category.php" method="post">
			<div class="form-group">
				<label for="category">Title</label>
				<input id="category" type="text" name="category" class="form-control">
			</div>
			<div class="form-group">
				<label></label>
				<input type="submit" value="Add New Category" name="submit_category" class="btn btn-danger btn-block">
			</div>
		</form>
		</div>
	
	</div>
	
	
	
	<footer></footer>
		<script src="/bootstrap/js/jquery.js"></script>
	<script src="/bootstrap/bootstrap/js/bootstrap.js"></script>
	
	</body>
	
	
	
	
	
	
</html>


