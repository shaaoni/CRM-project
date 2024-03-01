<?php

session_start();
if(isset($_SESSION['u_name']) && isset($_SESSION['u_pass'])){
  include_once("../config/db.php");

	if(isset($_GET['tid']))
	{
		$tid = $_GET['tid'];
	     $sql = "DELETE FROM emp_task WHERE task_id='$tid' ";
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