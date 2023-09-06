
<?php
session_start(); 
include_once("./config/db.php");



          //  $requestId=$request_row['request_id'];

          
          
if(isset($_SESSION['user']) && isset($_SESSION['pas'])){
  $user = $_SESSION['user'];
  $pas = $_SESSION['pas'];

$request = "";

?>

<?php

  $request =  $_POST["request"];
  $userid='emp-000';
  echo $request;

  if(empty($request)){

        echo "emptyVar";
  }else{

    if(isset($_POST['editRequest'])){

      $sq = "SELECT * FROM (workers INNER JOIN user_login ON user_login.id = workers.id)Where user_login.uname = '$user'and user_login.pass = '$pas' ";
          $result = mysqli_query($conn, $sq);

          $row = mysqli_fetch_assoc($result);
          $email = $row['email'];
          $user_id = $row['id'];
          $emp_userid =$userid.$user_id;

        $request_tbl= "SELECT request_id  FROM  user_requests";

$request_result = mysqli_query($conn, $request_tbl);
if(mysqli_num_rows($request_result)>0){

  while($request_row = mysqli_fetch_assoc($request_result)){

    $requestId=$request_row['request_id'];
   
 


      $sql = "UPDATE user_requests set user_request = '$request' where user_id= '$emp_userid' and request_id = '$requestId' ";
      $res = mysqli_query($conn,$sql);


      if($res){
        echo "update_success";
      }else{
        echo "update_error";
      }

 }

}

// ----------
    }else{


$sql = "SELECT * FROM (workers INNER JOIN user_login ON user_login.id = workers.id)Where user_login.uname = '$user'and user_login.pass = '$pas' ";
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);
    $email = $row['email'];
    $fname = $row['fname'];
    $lname = $row['lname'];
    $fullname = $fname." ".$lname;

    
    $user_id = $row['id'];
    $emp_userid =$userid.$user_id;

    $sql = "INSERT into user_requests(user_id,email_id,user_request,status)values('$emp_userid','$email','$request','pending' )";

    $res = mysqli_query($conn,$sql);
    if($res){
      echo "sent_successfully!";
    }
    else{
      echo "sent_error";
    }
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

