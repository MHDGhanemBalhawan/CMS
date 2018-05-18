<?php	session_start();
	include '../includes/db.php';
	if(isset($_POST['submit_login'])){
		if(!empty($_POST['email']) && !empty($_POST['password'])){
			$get_email = mysqli_real_escape_string($conn, $_POST['email']);
			$get_password = mysqli_real_escape_string($conn, $_POST['password']);
			$sel_sql = "SELECT user_email, user_password FROM tbl_user WHERE user_email = '$get_email' AND user_password = '$get_password'";
			
			if($result = mysqli_query($conn,$sel_sql)){
				if(mysqli_num_rows($result) == 1){
				//create session user and password from the login details
					$_SESSION['user'] = $get_email;
					$_SESSION['password'] = $get_password;
					header('Location: ../admin/index.php');
				}else{
					header('Location: ../index.php?login_error=wrong');
				}
			}else{
				header('Location: ../index.php?login_error=query_error');
			}
		}else{
			header('Location: ../index.php?login_error=empty');
		}
	}else{}
?>