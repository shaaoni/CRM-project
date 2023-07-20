<?php

session_start();
if(isset($_SESSION['user']) && isset($_SESSION['pas'])){
	session_unset();
	session_destroy();
	header('Location:index.php');
}else{
	header('Location:dashboard.php');
}



?>