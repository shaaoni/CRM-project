<?php 

session_start(); 
include_once("./config/db.php");
if(isset($_SESSION['user']) && isset($_SESSION['pas'])){
    $user = $_SESSION['user'];
    $pas = $_SESSION['pas'];

    $sql = "SELECT * FROM user_login INNER JOIN workers ON workers.uname=user_login.uname  WHERE user_login.uname= '$user' and user_login.pass= '$pas' ";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
          $all = mysqli_fetch_assoc($result);
           // print_r($all);
          $email = $all['email'];
          // $previousImage = "./img/".$all['img'];
          $fname = $all['fname'];
          $lname = $all['lname'];
          $fullname = $fname." ".$lname;
          $uname = $all['uname'];
          $password = $all['pass'];
        }

?>

<?php

if(isset($_POST['update'])){

  $fname_update = $_POST['frst_nm'];
  $lname_update = $_POST['lst_nm'];
  $unm_update = $_POST['username'];
  $pas_update =  $_POST['pasw'];

  $check = getimagesize($_FILES["pro_pic"]["tmp_name"]);
    if ($check !== false) {
        $date = date('H:i:s Y');

        $temp = $_FILES["pro_pic"]["tmp_name"];
        $extension = pathinfo($_FILES["pro_pic"]["name"], PATHINFO_EXTENSION); 
        $filename = uniqid() . '.' . $extension;
        $folder = "./img/" . $filename;
        $sql = "SELECT img FROM workers WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        
        $row = mysqli_fetch_assoc($result);
        
        $previousImage = "./img/" . $row['img'];

        $sql = "UPDATE workers SET img = '$filename', fname = '$fname_update', lname = '$lname_update' uname = '$unm_update', pass = '$pas_update' WHERE email = '$email'";
        $stmt = mysqli_query($conn, $sql);

        if ($stmt) {
          if(!$previousImage){

          }
           else if (file_exists($previousImage)) {
                unlink($previousImage);
            }

            move_uploaded_file($temp, $folder);

            $Image = "./img/" . $filename;
            $pic = $Image;
            $uname= $_SESSION['user'] = $unm_update;
            $password = $_SESSION['pas'] = $pas_update;
            $fullname = $fulnm_update;
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

  <link rel="stylesheet" type="text/css" href="./assets/css/profile_user.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>

<style type="text/css">
  .modal {
    display: none; 
    position: fixed; 
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%; 
    height: 100%; 
    overflow: auto;
    background-color: rgb(0,0,0); 
    background-color: rgba(0,0,0,0.4);  Black w/ opacity 
    padding-left: 165px;
    padding-right: 165px;
}

.modal-content {
  margin: 14px auto;
  background-color: #fefefe;
  padding: 0px;
    padding-right: 40px;
     padding-left: 40px;
    width: 50%;
    height: auto;
}

.err_mdl{
  display: none;
  position: fixed; 
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%; 
  height: 100%; 
  overflow: auto; 
  background-color: rgb(0,0,0); 
  background-color: rgba(0,0,0,0.4); 
  padding-left: 165px;
    padding-right: 165px;
}

.err_content{
  background-color: #fefefe;
  margin: 15% auto;
  padding: 0px;
  padding-right: 40px;
  padding-left: 40px;
  width: 300px;
  height: 26px;
  color: red;
}

</style>

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
        <li class="active"><a href="dashboard.php">Employee Dashboard</a></li>
        
        <li><a href="profile.php" style="color: #0000ff;">Account Settings</a></li>
        <li><a href="logout_user.php" style="color: #0000ff;">Log Out</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav hidden-xs dashboard">
      
      <br>
      <ul class="nav nav-pills nav-stacked">

        <?php

              if($Image == ""){
                
            ?>

<nav id="profile_pic"><img  style="width: 150px; height: 150px; border-radius: 50%; margin: 5px;" ></nav><br>

            <?php
              }
              else{
            ?>

<nav id="profile_pic"><img src="<?php echo $pic; ?>" style="width: 150px; height: 150px; border-radius: 50%; margin: 5px;" ></nav><br>

            <?php
              }
            ?>

        <div id="profile_details">
          <label class="label">Shrabanti Bagchi</label>
        </div><br>
        <div id="profile_details">
          <label class="label">Full Stack Developer</label>
        </div><br>
        <div class="links">

          <img class= "twitter" src="./img/twitter1.PNG">&nbsp &nbsp
          <img class= "meta" src="./img/meta.PNG">&nbsp &nbsp
          <img class= "linkedin" src="./img/in.PNG">&nbsp &nbsp
          <img class= "insta" src="./img/insta4.PNG">&nbsp &nbsp
          
        </div>
        <hr>
        <li><a href="logout_user.php" style="color: #0000ff;">Log Out</a></li>
        <li><a href="profile.php" style="color: #0000ff;">Account Settings</a></li>
      </ul><br>
    </div>
    <br>
    
    <div class="col-sm-9">
      <div class="well profile_nav">
        <button id="mybtn"><h4>Overview</h4></button> &nbsp &nbsp &nbsp
          
        <button id="mybtn1" onclick="addmodal()"><h4>Edit Info</h4></button> &nbsp &nbsp &nbsp 
          
        <button id="mybtn"><h4>Change Password</h4></button> &nbsp &nbsp &nbsp 

        <p><input type="text" name="seach" value="search"></p>
      </div>


<div id="myModal" class="modal">
              
              <div class="modal-content">
                <span class="close">&times;</span>
                <p>
                  
                  <center>
                    <nav class="form_nav">
                      <h2>Update Details</h2>
                      <form action="" method="post" name="edit_details" id="edit_details">
First Name: <input type="text" name="fname" id="fname" value="<?php echo $fname; ?>"><br><br>
Last Name: <input type="text" name="lname" id="lname" value="<?php echo $lname; ?>"><br><br>
Contact: <input type="text" name="cont" id="cont"><br><br>
Address: <input type="text" name="adres" id="adres"><br><br>
Qualification: <input type="text" name="qualif" id="qualif"><br><br>
Designation: <input name="desig" rows="5" cols="40" id="desig"></input><br><br>
            <input type="submit" name="submit" value="Save">

                      </form>
                    </nav>
                  </center>

                </p>
              </div>
            </div>


            <div id="err_modal" class="err_mdl">
              
              <div class="err_content">
                <span class="close_err">&times;</span>
                <p>
                  <center>
                    <label id="err_text" class="err_class"></label>
                  </center>
                </p>
              </div>
            </div>

      <div class="row">
        <div class="col-sm-6">
          <div class="well">
            

            <form action="#" method="post" enctype="multipart/form-data">
              <label>First Name: </label><input type="text" name="frst_nm" value="<?php echo $fname; ?>"><br><br>
              <label>Last Name: </label><input type="text" name="lst_nm" value="<?php echo $lname; ?>"><br><br>
              <label>Username: </label><input type="text" name="username" value="<?php echo $uname; ?>"><br><br>
              <label>Password: </label><input type="text" name="pasw" value="<?php echo $password; ?>"><br><br>
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

<script type="text/javascript">
  
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("mybtn1");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
// addmodal(){
//   modal.style.display = "block";
// }

// btn.onclick = function() {
//   modal.style.display = "block";
// }

function addmodal(){
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}


$(function() {
  $("form[name='edit']").validate({
    rules: {
      fname: "required",
      lname: "required",
      cont: "required",
      adres: "required",
      qualif: "required",
      desig: "required"
    },
    messages: {
      fname: "Please enter your firstname",
      lname: "Please enter your lastname",
      cont: "Please enter your Contact",
      adres: "Please enter your address",
      qualif: "Please enter your qualification",
      desig: "Please enter your designation"
    },
    submitHandler: function(form) {
      form.submit();
    }
  });
});
  
function addError(){
      var span2 = document.getElementsByClassName("close_err")[0];
      document.getElementById("err_text").innerHTML = "Please fill up all the fields.";
      var err = document.getElementById("err_modal");
      err.style.display = "block";

      span2.onclick = function() {
        err.style.display = "none";
      }

}

 $(document).ready(function() {

      $("#edit_details").submit(function(e) {
        e.preventDefault();

        $.ajax({
             data: $("#edit_details").serializeArray(),
             type: "post",
             url: "user_info.php",

             success: function(data){
                  alert("localhost says: " + data);
                  console.log(data);
                  if(data.trim()==="emptyVar"){
                    // alert("empty");
                    addError();
                    setTimeout(function(){
                        window.location.reload();
                    }, 5000);
                  }
                  //return true;
             },
              error: function() {
            alert('There was some error performing the AJAX call!');
            }

        });

     });
});

</script>


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
