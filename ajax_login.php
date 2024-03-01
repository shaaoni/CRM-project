<?php
 session_start();
include_once('../config/db.php');


 if(isset($_POST['username']) && isset($_POST['password']) ){

 
  $username = $_POST['username'];  
  $password = $_POST['password'];

  // echo $username;
  // echo $password;

  $selct = "SELECT * FROM admin where  username = '$username' and BINARY  pass= '$password' ";
  $result = mysqli_query($conn,$selct);

  if($row = mysqli_fetch_array($result)){

  	$_SESSION['u_name'] = $row['username'];
  	$_SESSION['u_pass'] = $row['pass'];
    $_SESSION['full_name'] = $row['full_name'];
    $_SESSION['email_id'] = $row['email'];
    $_SESSION['profilePic'] = $row['img'];
	// echo $_SESSION['u_name'];
	// echo $_SESSION['u_pass'];

    // $sql = "UPDATE admin SET "

  	echo "success";
  }else{
  	echo "Invalid User";
  }
}
else{
  echo "Some error Occurred";
}


?>
