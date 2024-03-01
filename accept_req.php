<?php

session_start(); 
if(isset($_SESSION['u_name']) && isset($_SESSION['u_pass'])){
  include_once("../config/db.php");
?>

<?php


if (isset($_GET['uid'])) {
    $uid = $_GET['uid'];
    //$request =  $_POST["editRequest"];
    $user_req_id = 'emp-00'.$uid;

    $sql = "UPDATE user_requests set status = 'approved' where user_id = '$user_req_id' ";
    $result = mysqli_query($conn,$sql);
    if($result){
    	//alert("Message Updated");
    	echo 'Approved sucessfully';
    }
    else{
    	//alert("Some error occured");
    	echo" Some error occured";
    }
   
} else {
    echo "No data received.";
}

$page = 'workers.php';
    header("Refresh:3, url=$page");

?>

<?php

}
else{

  echo "401 login failed.<br>";
  echo "you haven't logged in yet.<br><br>";
?>

<a href="index.php"> Login here.</a>

<?php
}

?>

