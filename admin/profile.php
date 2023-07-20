<?php 
include_once('../config/db.php');
session_start(); 
if(isset($_SESSION['u_name']) && isset($_SESSION['u_pass'])) {

  $uname= $_SESSION['u_name'];
  $password = $_SESSION['u_pass'];
  $fullname = $_SESSION['full_name'];
  $email = $_SESSION['email_id'];
  $pic=$_SESSION['profilePic'];

?>
<!-- <img src="../img/<?php // echo  $pic; ?>"> -->
<?php

if(isset($_POST['update'])){

  $fulnm_update = $_POST['fullname'];
  $unm_update = $_POST['username'];
  $pas_update =  md5($_POST['pas']);

  $check = getimagesize($_FILES["pro_pic"]["tmp_name"]);
    if ($check !== false) {
        $date = date('H:i:s Y');

        $temp = $_FILES["pro_pic"]["tmp_name"];
        $extension = pathinfo($_FILES["pro_pic"]["name"], PATHINFO_EXTENSION); 
        $filename = uniqid() . '.' . $extension;
        $folder = "../img/" . $filename;

        $sql = "SELECT img FROM admin WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        // print_r($result);
        $row = mysqli_fetch_assoc($result);
        // print_r($$row);
        $previousImage = "../img/" . $row['img'];

        $sql = "UPDATE admin SET img = '$filename', full_name = '$fulnm_update' , username = '$unm_update', pass = '$pas_update' WHERE email = '$email'";
        $stmt = mysqli_query($conn, $sql);

        if ($stmt) {
            // Delete the previous image if it exists
            if (file_exists($previousImage)) {
                unlink($previousImage);
            }

            move_uploaded_file($temp, $folder);

            $Image = "../img/" . $filename;
            $pic = $_SESSION['profilePic'] = $Image;

            $uname= $_SESSION['u_name'] = $unm_update;
            $password = $_SESSION['u_pass'] = $pas_update;
            $fullname = $_SESSION['full_name'] = $fulnm_update;

            echo "File updated successfully.";
        } else {
            echo "There was an error updating this file.";
        }
    } else {
        echo "File was not an image.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <link rel="stylesheet" type="text/css" href="./css/profile_admin.css">
  
</head>
<body>

<nav class="navbar navbar-inverse visible-xs">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Admin Dashboard</a></li>
        <li><a href="user.html">User</a></li>
        <!-- <li><a href="#">Activity</a></li> -->
        <li><a href="#">Log Out</a></li> -->
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav hidden-xs dashboard">
      <!-- <label  class="label"><h2>Profile</h2></label> -->
      <br>
      <ul class="nav nav-pills nav-stacked">

        <nav id="profile_pic"><img src="../img/<?php echo  $pic; ?>" style="width: 150px; height: 150px; border-radius: 50%; margin: 5px;" ></nav><br>
        <!-- padding-left: -10px;-->
        <div id="profile_details">
          <label class="label">Shrabanti Bagchi</label>
        </div><br>
        <div id="profile_details">
          <label class="label">Full Stack Developer</label>
        </div><br>
        <div class="links">

          <img class= "twitter" src="../img/twitter1.PNG">&nbsp &nbsp
          <img class= "meta" src="../img/meta.PNG">&nbsp &nbsp
          <img class= "linkedin" src="../img/in.PNG">&nbsp &nbsp
          <img class= "insta" src="../img/insta4.PNG">&nbsp &nbsp
          
        </div>
        <hr>
        <li><a href="dashboard.php" style="color: #0000ff;">Dashboard</a></li>
        <li><a href="logout.php" style="color: #0000ff;">Log Out</a></li>
        <li><a href="profile.php" style="color: #0000ff;">Account Settings</a></li>
      </ul><br>
    </div>
    <br>
    
    <div class="col-sm-9">
      <div class="well profile_nav">
        <button id="mybtn"><h4>Overview</h4></button> &nbsp &nbsp &nbsp
        <select id="mybtn">
          <option><button id="mybtn"><h4>Edit  Profile</h4></button></option>
          <option><button id="mybtn"><h4>Edit Info</h4></button></option>
          <option><button id="mybtn"><h4>Security Settings</h4></button></option>
        </select>  &nbsp &nbsp &nbsp 
        <button id="mybtn"><h4>Change Password</h4></button> &nbsp &nbsp &nbsp 

        <p></p>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="well">
            <form action="#" method="post" enctype="multipart/form-data">
              <label>Full Name: </label><input type="text" name="fullname" value="<?php echo $fullname; ?>"><br><br>
              <label>Username: </label><input type="text" name="username" value="<?php echo $uname; ?>"><br><br>
              <label>Password: </label><input type="text" name="pas" value="<?php echo $password; ?>"><br><br>
              <label>Image: </label><input type="file" name="pro_pic" id="pro_pic"><br><br>
              <input type="submit" name="update" value="UPDATE">

            </form>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <div class="well">
            <p>Text</p> 
            <p>Text</p> 
            <p>Text</p> 
          </div>
        </div>
        <div class="col-sm-4">
          <div class="well">
            <p>Text</p> 
            <p>Text</p> 
            <p>Text</p> 
          </div>
        </div>
        <div class="col-sm-4">
          <div class="well">
            <p>Text</p> 
            <p>Text</p> 
            <p>Text</p> 
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-8">
          <div class="well">
            <p>Text</p> 
          </div>
        </div>
        <div class="col-sm-4">
          <div class="well">
            <p>Text</p> 
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>

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