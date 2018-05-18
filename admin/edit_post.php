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
	$error = '';
	if(isset($_POST['submit_post'])){
		$title = strip_tags($_POST['title']);
		$date = date('Y-m-d h:i:s');
		if($_FILES['image']['name'] != ''){
			$image_name = $_FILES['image']['name'];
			$image_tmp = $_FILES['image']['tmp_name'];
			$image_size = $_FILES['image']['size']; 
			$image_ext = pathinfo($image_name, PATHINFO_EXTENSION);
			$image_path = '../images/'.$image_name;
			$image_db_path = 'images/'.$image_name;
			
			if($image_size < 10000000){
				if($image_ext == 'jpg' || $image_ext == 'png' || $image_ext == 'gif'){
					if(move_uploaded_file($image_tmp,$image_path)){
						$ins_sql = "INSERT INTO tbl_post (pos_title, pos_description, pos_image, pos_category, pos_status, pos_date, pos_author) VALUES ('$title', 
						'$_POST[description]', '$image_db_path', '$_POST[category]', '$_POST[status]', '$date', '$_SESSION[user]')";
						
						if(mysqli_query($conn,$ins_sql)){
							header('post_list.php');
						} else{
							$error = '<div class="alert alert-danger">The query was not executed.</div>';
						}
					} else {
						$error = '<div class="alert alert-danger">Sorry, image was not uploaded!</div>';
					}
					
				} else {
					$error = '<div class="alert alert-danger">Image format is not supported!</div>';
				}
			}else{
				$error = '<div class="alert alert-danger">Image size is bigger than 1 mb.</div>';
			}
		} else {
			$ins_sql = "INSERT INTO tbl_post (pos_title, pos_description, pos_category, pos_status, pos_date, pos_author) VALUES ('$title', 
						'$_POST[description]', '$_POST[category]', '$_POST[status]', '$date', '$_SESSION[user]')";
			if(mysqli_query($conn,$ins_sql)){
				header('post_list.php');
			} else{
				$error = '<div class="alert alert-danger">The query was not executed.</div>';
			}
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
	<?php echo $error; ?>
	<?php
	
	if(isset($_GET['edit_id'])){
	$sel_sql = "SELECT * FROM tbl_post WHERE pos_id = '$_GET[edit_id]'";
	$pre_sql = mysqli_query($conn, $sel_sql);
	while($rows = mysqli_fetch_assoc($pre_sql)){ ?>
			<div class="page-header"><h1><?php echo $rows['pos_title']; ?></h1></div>
		<div class="container-fluid">
		<form class="form-horizontal" action="new_post.php" method="post" enctype="multipart/form-data">
		<img src="../<?php echo $rows['pos_image']; ?>" width="100px">
			<div class="form-group">
				
				<label for="image">Upload an Image</label>
				<input id="image" name="image" type="file" class="btn btn-primary">
			</div>
			<div class="form-group">
				<label for="title">Title</label>
				<input id="title" name="title" type="text" value="<?php echo $rows['pos_title']; ?>" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="category">Category</label>
				<select id="category" name="category" class="form-control"required>
					<option value="">Select Category</option>
					<?php
						$sel_sql = "SELECT * FROM tbl_category";
						$pre_sql = mysqli_query($conn, $sel_sql);
						while($c_rows = mysqli_fetch_assoc($pre_sql)){
							echo '<option value="'.$c_rows['cat_name'].'">'.ucfirst($c_rows['cat_name']).'</option>';
						}
					?>
				</select>
			</div>
			<div class="form-group">
				<label for="description">Description</label>
				<textarea id="description" name="description" class="form-control"><?php echo $rows['pos_description']; ?></textarea>
			</div>
			<div class="form-group">
				<label for="status">Status</label>
				<select id="status" name="status" class="form-control">
					<option value="draft">Draft</option>
					<option value="published">Published</option>
				</select>
			</div>
			<div class="form-group">
				<label></label>
				<input type="submit" value="Submit Your Post" name="submit_post" class="btn btn-danger btn-block">
			</div>
		</form>
		</div>
	<?php } 
	} else{
		echo '<div class="alert alert-danger">Please select a post to edit!</div>';
	}
	?>
	</div>
	<footer></footer>
		<script src="/bootstrap/js/jquery.js"></script>
	<script src="/bootstrap/bootstrap/js/bootstrap.js"></script>
	</body>
</html>


