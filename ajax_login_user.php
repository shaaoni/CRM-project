<?php
include_once('./config/db.php');
 session_start();


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
    $un = $_SESSION['user'] = $row['uname'];
    $pas = $_SESSION['pas'] = $row['pass'];

    //echo $un;

    $sql = "UPDATE user_login SET status = 'active' WHERE uname= '$un' ";
    $result = mysqli_query($conn,$sql);

    $sql_at1 = "SELECT workers.user_id FROM user_login INNER JOIN workers ON workers.uname = user_login.uname WHERE user_login.uname = '$un' AND user_login.pass='$pas'";
    $result_at1= mysqli_query($conn,$sql_at1);
    $u_id = mysqli_fetch_assoc($result_at1);
    $uid = $u_id['user_id'];

    $sql_at2 = "SELECT login FROM attendance WHERE emp_id='$uid' AND date=CURDATE()";
    $result_at2 = mysqli_query($conn,$sql_at2);
    $login_num= mysqli_num_rows($result_at2);
    // $log_in = mysqli_fetch_assoc($result_at2);
    // $login_time = $log_in['login'];

    if($login_num<=0){
      $sql_at3 = "INSERT INTO attendance(emp_id,login) VALUES('$uid',CURTIME())";
      $result_at3 = mysqli_query($conn,$sql_at3);
    }
    else{
      $sql_at4 = "UPDATE attendance SET login = CURTIME() WHERE emp_id='$uid' AND date=CURDATE() ";
      $result_at4 = mysqli_query($conn,$sql_at4);
    }

    echo "success";
}
else{
  echo "Invaid User";
}

 //echo $result;


}
else{
  echo "Some error Occured";
}

?>