<?php
include_once('./config/db.php');
session_start();
if(isset($_SESSION['user']) && isset($_SESSION['pas'])){
  $un = $_SESSION['user'];
  $pas = $_SESSION['pas'];

    $sql = "UPDATE user_login SET status = 'inactive' WHERE uname= '$un' ";
    $result = mysqli_query($conn,$sql);

    $sql_at1 = "SELECT workers.user_id FROM user_login INNER JOIN workers ON workers.uname = user_login.uname WHERE user_login.uname = '$un' AND user_login.pass='$pas'";
    $result_at1= mysqli_query($conn,$sql_at1);
    $u_id = mysqli_fetch_assoc($result_at1);
    $uid = $u_id['user_id'];

    $sql_at2 = "UPDATE attendance SET logout = CURTIME() WHERE emp_id= '$uid'";
    $result_at2 = mysqli_query($conn,$sql_at2);

    unset($_SESSION['user']);
    unset($_SESSION['pas']);

   header('Location:index.php');
}
?>