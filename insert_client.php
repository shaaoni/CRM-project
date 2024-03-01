
<?php
session_start(); 
if(isset($_SESSION['u_name']) && isset($_SESSION['u_pass'])){
  include_once("../config/db.php");

$clfname = $cllname = $cpname = $contact = $pname= $prj_dsc = $email = $date = "";

?>

<?php

  $clfname =  $_POST['clfname'];
  $cllname = $_POST['cllname'];
  $cpname = $_POST['cpname'];
  $contact = $_POST['contact'];
  $pname =  $_POST['pname'];
  $email = $_POST['email']; 
  $prj_dsc =  $_POST['pdsc'];
  // $date =  $_POST['dt'];
  //$full_name= $fname." ".$lname;

  //$emp_id="emp-000".$id;

  // echo $clfname;
  // echo $cllname;
  // echo $cpname;
  // echo $contact;
  // echo $pname;
  // echo $email;
  // echo $prj_dsc;
  // echo $date;

  if(empty($clfname) ||empty($cllname) ||empty($cpname) ||empty($contact) ||empty($pname) ||empty($email) ||empty($prj_dsc) ){

        echo "emptyVar";
  }

  else{

    $sql = " INSERT INTO client_details(client_fname, client_lname, cmp_name, contact, email, project_name, project_dsc) VALUES ('$clfname','$cllname', '$cpname', '$contact', '$email', '$pname', '$prj_dsc')";

    $result = mysqli_query($conn,$sql);
    if($result){
      echo "successfull";
    }
    else{
      echo "failed";
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

