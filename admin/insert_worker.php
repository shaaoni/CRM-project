
<?php
session_start(); 
if(isset($_SESSION['u_name']) && isset($_SESSION['u_pass'])){
include_once('../config/db.php');

$fname = $lname = $id = $uname = $doj = $mail = $pas = "";

?>

<?php

  $uname =  $_POST['uname'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $id = $_POST['Id'];
  $doj =  $_POST['doj'];
  $mail = $_POST['email']; 
  $pas =  $_POST['pass'];

  $full_name= $fname." ".$lname;

  $emp_id="emp-00".$id;

  if(empty($uname) ||empty($doj) ||empty($mail) ||empty($pas) ||empty($fname) ||empty($lname) ||empty($id) ){

        echo "emptyVar";
  }else{


$sql1= "INSERT INTO user_login (uname,full_name,email,pass) VALUES ('$uname', '$full_name','$mail','$pas' )";

$sql2= "INSERT INTO workers (user_id,uname,fname,lname,doj,email,pass) VALUES ('$emp_id','$uname','$fname', '$lname','$doj','$mail','$pas')";

        $myquery = mysqli_query($conn,$sql1);
        $result = mysqli_query($conn,$sql2);

        if(!$myquery){

          echo 'An error occurred while inserting in user_login';
        }
        if(!$result){
          echo 'An error occurred while inserting in workers';
        }
        if($myquery && $result){
          echo 'Inserted Successfully';

        $page = 'workers.php';
          header("Refresh:3, url=$page");
        }
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

