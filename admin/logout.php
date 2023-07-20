<?php

session_start();
if(isset($_SESSION['u_name']) && isset($_SESSION['u_pass'])){
	session_unset();
	session_destroy();
	header('Location:index.php');
}



?>