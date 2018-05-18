<?php SESSION_start();
	
	if(session_destroy()){
	header('Location:../index.php');
	}
	
?>