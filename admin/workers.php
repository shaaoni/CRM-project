<?php 
session_start(); 
if(isset($_SESSION['u_name']) && isset($_SESSION['u_pass'])){
  include_once("../config/db.php");

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

  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous"> -->
<style type="text/css">
  
  .hide{
      /*visibility: hidden;*/
      display: none;
  }
  .show{
      /*visibility: visible;*/
      display: table-row-group;
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
    <div class="col-sm-3 sidenav hidden-xs" style="height: 700px;">
      <h2>Logo</h2>
      <ul class="nav nav-pills nav-stacked">
        <li><a href="dashboard.php">Admin Dashboard</a></li>
        <li><a href="#">Clients</a></li>
        <li class="active"><a href="workers.php">Workers</a></li>
        <li><a href="#">Projects</a></li>
        <li><a href="#">Properties</a></li>
        <li><a href="#">Leads</a></li>
        <li><a href="calendar.php">Time sheet</a></li>
        <li><a href="#">Billing & Invoices</a></li>
        <li><a href="#">Agreements</a></li>
        <li><a href="#">Masters</a></li>
        <li><a href="logout.php">Log Out</a></li>
        <hr style="background-color: black;">
        <li><a href="profile.php">Account Settings</a></li>
      </ul><br>
    </div>
    <br>
    
    <div class="col-sm-9">
      <div> <!-- class="well" -->
        <nav class="navigation_bar">
        <button id="mybtn" onclick="addmodal()"><h4>Add Worker</h4></button> &nbsp &nbsp &nbsp
        <button id="list_worker">List Worker</button>&nbsp &nbsp &nbsp
        <button id="Search"> Search </button>&nbsp &nbsp &nbsp
        <button id="request">Requests</button>
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
<div id="search_div" style="display: none;" onkeyup="SearchByName()"><input type="text" name="search" placeholder="type name" id="search"></div>

<p class="hide" id="noData_list">no data found</p><br>

    <div class="row">
        <div class="col-sm-12">
          <div class="well" id="list_table" style="display: none;">
            <p>
              
<table border="2px;" class="table table-success table-striped" id="worker_table">
    <thead style="border: 2px solid black;" id="tb">

      <th colspan="2">Serial NO</th>
      <th colspan="2">Employee Id</th>
      <th colspan="4">Name</th>
      <th colspan="2">Username</th>
      <th colspan="4">Email</th>
      <th colspan="4">Password</th>
      <th colspan="2">Contacts</th>
      <th colspan="2">Address</th>
      <th colspan="4">Date of Joining</th>
      <th colspan="4">Qualification</th>
      <th colspan="4">Designation</th>
      <!-- <th colspan="4">Logged In/Out</th>
      <th colspan="4">Login time</th>
      <th colspan="4">Logout time</th> -->
    </thead>
    <tbody id="tbody"> 
    <?php
    $selct = "SELECT * FROM workers INNER JOIN user_login ON workers.uname = user_login.uname ";
    $result = mysqli_query($conn,$selct);
    if(mysqli_num_rows($result) > 0){
         $id=0;
               while ($row = mysqli_fetch_assoc($result)) {
               $id=$id+1;
               $name = $row['fname']." ".$row['lname'];
               ?>
                  <tr>
                    <td colspan="2"><?php echo $id; ?></td>
                    <td colspan="2"><?php echo $row['user_id']; ?></td>
                    <td colspan="4"> <?php echo $name; ?> </td>
                    <td colspan="2"> <?php echo $row['uname']; ?> </td>
                    <td colspan="4"> <?php echo $row['email']; ?> </td>
                    <td colspan="4"> <?php echo $row['pass']; ?> </td>
                    <td colspan="2"> <?php echo $row['contacts']; ?> </td>
                    <td colspan="2"> <?php echo $row['address']; ?> </td>
                    <td colspan="4"> <?php echo $row['doj']; ?> </td>
                    <td colspan="4"> <?php echo $row['qualification']; ?> </td>
                    <td colspan="4"> <?php echo $row['designation']; ?> </td>
               <?php 
             } 
          ?>
          <?php 
        }
           else{
              echo '<tr>';
              echo '<td>'.'data not available'.'</td>';
              echo '</tr>';
           }
    ?>
</tbody>

  </table>
            </p> 
          </div>
        </div>
        <!-- <div class="col-sm-4">
          <div class="well">
            <p>Text</p> 
          </div>
        </div> -->
      </div>

<div style="display: none;" id="request_table">
  
  <table border="2px;" class="table table-success table-striped" id="worker_table">
           <thead style="border: 2px solid black;">
             <th colspan="2">Serial No</th>
             <th colspan="2">Employee Id</th>
             <th colspan="2">Email</th>
             <th colspan="2">Name</th>
             <th colspan="2">Request</th>
             <!-- <th colspan="2">Status</th> -->
             <th colspan="4">Action</th>
           </thead>
           <tbody>
<?php

    $sql_req1 = "SELECT * FROM workers INNER JOIN user_requests ON user_requests.user_id = workers.user_id ";
    $result_req1 = mysqli_query($conn, $sql_req1);
    
    $userid='emp-000';
    
    // $sql_req2 = "SELECT * FROM user_requests Where user_id= '$emp_userid' and email_id = '$email' ";
    // $result_req2 = mysqli_query($conn,$sql_req2);
    
    if(mysqli_num_rows($result_req1)>0){
      $count = 0;
      while($row = mysqli_fetch_assoc($result_req1)){

        $count = $count+1;
        $user_id = $row['id'];
        $emp_userid =$userid.$user_id;
        $email = $row['email'];
        $fname = $row['fname'];
        $lname = $row['lname'];
        $fullname = $fname." ".$lname;
        $request = $row["user_request"];
        // $status = $row["status"];

?>

    <tr>
        <td colspan="2"><?php echo $count ?></td>
        <td colspan="2"><?php echo $emp_userid; ?></td>
        <td colspan="2"><?php echo $email; ?></td>
        <td colspan="2"><?php echo $fullname; ?></td>
        <td colspan="2"><?php echo $request; ?></td>
        <!-- <td colspan="2"><?php // echo $status; ?></td> -->
        
        <td colspan="4">
          Pending |
          <a href="req_accept.php?uid=<?php echo $user_id;?>"> Accept </a>|
          <a href="req_reject.php?uid=<?php echo $user_id;?>"> Reject</a>
          <!-- <a href="status_reqst.php?uid=<?php //echo $user_id;?>">Click to send data</a> -->
        </td>
    </tr>

<?php


      }
    }
    
?>
           </tbody>

         </table>


</div>

      <div class="row">
        <div class="col-sm-3">
          <div class="well">
            <h4>Employees</h4>
            <p> 1 million </p> 
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
<script type="text/javascript"> 

  $(document).ready(function(){
    $("#list_worker").click(function(){
      $("#list_table").toggle(1000);
    });
});

  $(document).ready(function(){
    $("#Search").click(function(){
      $("#search_div").toggle(350);
    });
});

  $(document).ready(function(){
    $("#request").click(function(){
      $("#request_table").toggle(1000);
    });
});

</script>

<script type="text/javascript">
  
            function SearchByName(){
                var resultFound;
                  var x = document.getElementById('noData_list');
                  let filter = document.getElementById('search').value.toUpperCase();
                  let mt= document.getElementById('worker_table');
                  let tr = mt.getElementsByTagName('tr');

                  for(var i=0; i<tr.length; i++){
                    let td = tr[i].getElementsByTagName('td')[2];

                    if(td){
                      let textvalue = td.textContent || td.innerHTML;

                      if(textvalue.toUpperCase().indexOf(filter)>-1){
                        resultFound = true;
                        tr[i].style.display="";
                      }
                      
                      else{
                        tr[i].style.display ="none";
                      }
                    }
                  }
                  if(!resultFound){
                    //document.getElementById("resultFound").style.display="";
                    error();
                  }
                  else{
                    if(document.getElementById("noData_list").style.display===""){
                      omitError();
                    }
                  }
            }

            function error(){
                var el = document.getElementById("noData_list");
              // Removing class
                el.classList.remove("hide");
              // add class
                el.classList.add("show");
              }


              function omitError(){
                var el = document.getElementById("noData_list");
              // Removing class
                el.classList.remove("show");
              // add class
                el.classList.add("hide");
            }

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