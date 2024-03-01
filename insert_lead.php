
<?php
session_start(); 
 if(isset($_SESSION['u_name']) && isset($_SESSION['u_pass'])){
   include_once("../config/db.php");

$fname = $lname = $id = $uname = $doj = $mail = $pas = "";

  $uname =  $_POST['uname'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $id = $_POST['Id'];
  // $doj =  $_POST['doj'];
  $mail = $_POST['admin_adrs']; 
  $pas =  $_POST['pass'];

if(empty($fname)||empty($lname)||empty($id)||empty($uname)||empty($mail)||empty($pas)){

  echo "emtyvar";
}
else{

  $userId = "lead-000".$id;

  $sql = "INSERT INTO leads_details(user_id, uname, fname, lname, mail) VALUES ('$userId', '$uname', '$fname', '$lname', '$mail')";
  $result = mysqli_query($conn,$sql);
  if($result){
    echo "iserted_worker";
  }
  else{
    echo "failed_worker";
  }

  $sql_login = "INSERT INTO user_login(uname,pass)VALUES('$uname','$pas')";
  $res = mysqli_query($conn,$sql_login);
  if($res){
    echo "insert_user";
  }
  else{
    echo "failed_user";
  }

}
?>


<?php 
    
} //end session and if'submit' block
else{

  echo "401 login failed.<br>";
  echo "you haven't logged in yet.<br><br>";
?>

<a href="index.php"> Login here.</a>

<?php
}

?>