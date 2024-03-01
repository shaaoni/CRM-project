<?php

session_start();
if(isset($_SESSION['u_name']) && isset($_SESSION['u_pass'])){
	unset($_SESSION['u_name']);
	unset($_SESSION['u_pass']);
	// session_destroy();
	header('Location:admin_logout.php');
}



?>