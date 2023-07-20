<?php 

session_start(); 
if(isset($_SESSION['u_name']) && isset($_SESSION['u_pass'])){

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Workers</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <link rel="stylesheet" type="text/css" href="./css/workers.css">

  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>


  
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
        <li><a href="workers.html">User</a></li>
        <!-- <li><a href="#">Activity</a></li> -->
        <li><a href="#">Log Out</a></li> -->
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav hidden-xs">
      <h2>Logo</h2>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="dashboard.php">Admin Dashboard</a></li>
        <li><a href="#">Calender</a></li>
        <li><a href="workers.php">Workers</a></li>
        <li><a href="#">Time sheet</a></li>
        <li><a href="#">Billing & Invoices</a></li>
        <li><a href="logout.php">Log Out</a></li>
        <hr>
        <li><a href="profile.php">Account Settings</a></li>
      </ul><br>
    </div>
    <br>
    
    <div class="col-sm-9">
      <div> <!-- class="well" -->
        <nav class="navigation_bar">
        <button id="mybtn" onclick="addmodal()"><h4>Add Workers(+)</h4></button> &nbsp &nbsp &nbsp
        <button id="mybtn"> Search </button>
        </nav>


            <div id="myModal" class="modal">
              <!-- Modal content -->
              <div class="modal-content">
                <span class="close">&times;</span>
                <p>
                  
                  <center>
                    <nav class="form_nav">
                      <h2>Register</h2>
                      <form action="" method="post" name="regis" id="regis">
User Name: <input type="text" name="uname" id="uname"><br><br>
First name: <input type="text" name="fname" id="fname"><br><br>
Last name: <input type="text" name="lname" id="lname"><br><br>
Id: <input type="text" name="Id" id="Id"><br><br>
Date of Joining: <input type="Date" name="doj" id="doj"><br><br>
E-mail: <input type="text" name="email" id="email"><br><br>
Password: <input type="text" name="pass" id="pass"><br><br>
          <input type="submit" name="submit" value="Register">

                      </form>
                    </nav>
                  </center>

                </p>
              </div>
            </div>


            <div id="err_modal" class="err_mdl">
              <!-- Modal content -->
              <div class="err_content">
                <span class="close_err">&times;</span>
                <p>
                  <center>
                    <label id="err_text" class="err_class"></label>
                  </center>
                </p>
              </div>
            </div>


      </div>
      <br><br>
      <div class="row">
        <div class="col-sm-3">
          <div class="well">
            <h4>Employees</h4>
            <p>1 Million</p> 
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h4>Applications</h4>
            <p>100 Million</p> 
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h4>Messages</h4>
            <p>10 Million</p> 
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h4>Bounce</h4>
            <p>30%</p> 
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

<script type="text/javascript">
  
var modal = document.getElementById("myModal");
var btn = document.getElementById("mybtn");
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

</script>
<script type="text/javascript">

$(function() {
  $("form[name='regis']").validate({
    rules: {
      uname: "required",
      fname: "required",
      lname: "required",
      Id: "required",
      doj: "required",
      email: {
        required: true,
        email: true
      },
      pass: {
        required: true,
        minlength: 8
      }
    },
    messages: {
      uname: "Please enter your username",
      fname: "Please enter your firstname",
      lname: "Please enter your lastname",
      Id: "Please enter your Id number",
      doj: "Please enter your date of joining",
      pass: {
        required: "Please provide a password",
        minlength: "Your password must be at least 8 characters long"
      },
      email: "Please enter a valid email address"
    },
    submitHandler: function(form) {
      form.submit();
    }
  });
});
  
</script>

<script type="text/javascript">
var span2 = document.getElementsByClassName("close_err")[0];
document.getElementById("err_text").innerHTML = "Please fill up all the fields.";
var err = document.getElementById("err_modal");
function addError(){
    err.style.display = "block";
}

span2.onclick = function() {
    err.style.display = "none";
}
</script>

<script type="text/javascript">

 $(document).ready(function() {

      $("#regis").submit(function(e) {
        e.preventDefault();

        $.ajax({
             data: $("#regis").serialize(),
             type: "post",
             url: "insert_worker.php",

             success: function(data){
                  // alert("localhost says: " + data);
                  console.log(data);
                  if(data.trim()==="emptyVar"){
                    alert("Data not found");
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