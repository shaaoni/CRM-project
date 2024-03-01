
<?php
session_start(); 
if(isset($_SESSION['user']) && isset($_SESSION['pas'])){
  include_once("./config/db.php");

  $uname = $_SESSION['user'];
  $paswd = $_SESSION['pas'];

  $sql = "SELECT * FROM workers INNER JOIN user_login ON workers.uname=user_login.uname where user_login.uname = '$uname' and user_login.pass =  '$paswd' ";
  $result = mysqli_query($conn,$sql);
  if(mysqli_num_rows($result)>0){
    $row = mysqli_fetch_assoc($result);
    $mail = $row['email']; 
    $empId = $row['user_id'];
  }

$fname = $lname = $cont = $adres = $pas = $qualif = $desig = "";

?>

<?php

  // $uname =  $_POST['uname'];
  $fname =  $_POST['fname'];
  $lname =  $_POST['lname'];
  $cont =  $_POST['cont'];
  $adres =  $_POST['adres'];
  // $pas =  $_POST['pass'];
  $qualif =  $_POST['qualif'];
  $desig =  $_POST['desig'];

  // $full_name=$fname.$lname;

  // $emp_id="emp-00";

  if(empty($fname) ||empty($lname) ||empty($cont) ||empty($adres) ||empty($qualif) ||empty($desig)){

        echo "emptyVar";
  }else{


// $sql= "INSERT INTO user_login (uname,full_name,email,pass) VALUES ('$uname', '$full_name','$mail','$pas' )";

$sql= "UPDATE workers SET fname = '$fname', lname = '$lname', contacts = '$cont', address = '$adres', qualification = '$qualif', designation = '$desig' WHERE email = '$mail' and user_id =  '$empId' ";

$sql2 = "UPDATE ";

        $myquery = mysqli_query($conn,$sql);

        if(!$myquery){

          echo 'An error occurred';
        }else{
          echo 'Details saved Successfully';

        $page = 'profile.php';
          header("Refresh:5, url=$page");

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