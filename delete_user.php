<?php

session_start();
if(isset($_SESSION['u_name']) && isset($_SESSION['u_pass'])){
  include_once("../config/db.php");

	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
	     $sql = "DELETE FROM workers WHERE id='$id' ";
	     $result = mysqli_query($conn,$sql);
		 echo 'Deleted successfully.';
	}

}
else{

  echo "401 login failed.<br>";
  echo "you haven't logged in yet.<br><br>";
?>

<a href="index.php"> Login here.</a>

<?php
}

?>