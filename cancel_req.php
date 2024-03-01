<?php

session_start(); 
include_once("./config/db.php");
if(isset($_SESSION['user']) && isset($_SESSION['pas'])){
  $user = $_SESSION['user'];
  $pas = $_SESSION['pas'];
?>

<?php


if (isset($_GET['rid'])) {
    $rid = $_GET['rid'];
    //$request =  $_POST["editRequest"];

    $sql = "UPDATE user_requests set status = 'cancelled' where request_id = '$rid' ";
    $result = mysqli_query($conn,$sql);
    if($result){
    	//alert("Message Updated");
    	echo 'Cancelled sucessfully';
    }
    else{
    	//alert("Some error occured");
    	echo" Some error occured";
    }
   
} else {
    echo "No data received.";
}

$page = 'dashboard.php';
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

