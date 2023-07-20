<?php
 session_start();
include_once('./config/db.php');

//$username = $pass = "";


if(isset($_POST['username']) && isset($_POST['password']) ){

  $username = $_POST['username'];
  $password = $_POST['password'];

  // echo $uname;
  // echo $pass;

  $selct = "SELECT * FROM user_login where  uname = '$username' and BINARY  pass= '$password' ";
  $result = mysqli_query($conn,$selct);

  // if(empty($username)|| empty($pass)){
  //   echo "Please fill up all the fields";
  // }else{

  if(mysqli_num_rows($result)>0){
    $row = mysqli_fetch_assoc($result);
    $_SESSION['user'] = $row['uname'];
    $_SESSION['pas'] = $row['pass'];
    // $_SESSION['mail'] = $row['email'];

    echo "success";

    // if(isset($_SESSION['user']) && isset($_SESSION['pas'])){

    //   // header('Location:dashboard.php');
    //   // echo "success";

    //   exit;

    // }else{

    //   echo 'Some Error occurd';

    // }

  // }else{

  //   echo 'Either Username or Password is Incorrect';

  //   header("Refresh:4");

  // }

}

 //echo $result;


}

?>