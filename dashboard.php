<?php 

session_start(); 
include_once("./config/db.php");
if(isset($_SESSION['user']) && isset($_SESSION['pas'])){
  $user = $_SESSION['user'];
  $pas = $_SESSION['pas'];


// $sql = "SELECT * FROM (user_login INNER JOIN workers ON user_login.id = workers.id)WHERE user_login.uname= '$user' and user_login.pass= '$pas' ";
// $result = mysqli_query($conn,$sql);

// if(mysqli_num_rows($result)>0){
//   $row = mysqli_fetch_assoc($result);

// }

    $sql_req1 = "SELECT * FROM (workers INNER JOIN user_login ON user_login.id = workers.id)Where user_login.uname = '$user'and user_login.pass = '$pas' ";
    $result_req1 = mysqli_query($conn, $sql_req1);

    $row = mysqli_fetch_assoc($result_req1);
    $email = $row['email'];
    $fname = $row['fname'];
    $lname = $row['lname'];
    $fullname = $fname." ".$lname;

    $userid='emp-000';
    $user_id = $row['id'];
    $emp_userid =$userid.$user_id;

    $sql_req2 = "SELECT * FROM user_requests Where user_id= '$emp_userid' and email_id = '$email' ";
    $result_req2 = mysqli_query($conn,$sql_req2);

// $edit = "SELECT user_request from user_requests where user_id= '$emp_userid' and email_id = '$email' ";
// $res = mysqli_query($conn,$edit_req);
// $r= mysqli_fetch_assoc($result_req2);
// $req = $r['user_request'];
//echo $req;

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>USER DASHBOARD</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="./assets/css/dashboard_user.css">
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
        <li class="active"><a href="#">User Dashboard</a></li>
        <li><a href="user.html">User</a></li>
        <!-- <li><a href="#">Activity</a></li> -->
        <li><a href="logout_user.php">Log Out</a></li> -->
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav hidden-xs">
      <h2>Logo</h2>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="#section1">User Dashboard</a></li>
        <li><a href="#">Calender</a></li>
        <li><a href="workers.php">Workers</a></li>
        <li><a href="#">Time sheet</a></li>
        <li><a href="#">Billing & Invoices</a></li>
        <li><a href="logout_user.php">Log Out</a></li>
        <hr style="background-color: black;">
        <li><a href="profile.php">Account Settings</a></li>
      </ul><br>
    </div>
    <br>
    
    <div class="col-sm-9">
      <div class="well row" style=" display: flex;">
        <div>

        <h4>Welcome: <?php echo $row['uname'] ?></h4>
        <p>mail-id: <?php echo $row['email'];  ?></p>
      </div>&nbsp &nbsp &nbsp &nbsp
        <button id="show_application"> Applications</button>
      </div>
      <div id="application_table" style="display: none;">
         <table border="2px;" class="table table-success table-striped" id="worker_table">
           <thead style="border: 2px solid black;">
             <th colspan="2">Employee Id</th>
             <th colspan="2">Email</th>
             <th colspan="2">Name</th>
             <th colspan="2">Request</th>
             <th colspan="2">Action</th>
           </thead>
           <tbody>
<?php
    
    if(mysqli_num_rows($result_req2)>0){
     // $count = 0;
      while($user_req = mysqli_fetch_assoc($result_req2)){
        $action = $user_req["status"];
        $request = $user_req["user_request"];

?>

    <tr>
        <td colspan="2"><?php echo $emp_userid; ?></td>
        <td colspan="2"><?php echo $email; ?></td>
        <td colspan="2"><?php echo $fullname; ?></td>
        <td colspan="2"><?php echo $request; ?></td>
        <td colspan="4">
          <?php echo $action; ?> | 
          <button onclick="edit_req()" id="edit">Edit</button> | 
          <a href="cancel_req.php">CANCEL</a>
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
            <h4>Workers</h4>
            <p>1 Million</p> 
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well" id="send_application">
            <h4 style="cursor: pointer;">Place Your Messages</h4>
            <!-- <p>100 Million</p>  -->
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

<div id="appeal" style="display: none;"> 
<form action="" method="post" name="request_form" id="request_form">
 
  <textarea id="request"  name="request" placeholder="Enter your appeal" class="md-textarea form-control" rows="4" cols="50"></textarea>
  <br/>
  <input type="submit" name="submit" value="Submit Request" class="btn btn-primary">
  <input type="submit" name="editRequest" value="Edit Request" class="btn btn-primary">
</form>
</div>
<br>

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
  
$(document).ready(function(){
  $("#send_application").click(function(){
      $("#appeal").toggle(350);
    });
});

$(document).ready(function(){
  $("#show_application").click(function(){
      $("#application_table").toggle(350);
    });
});


</script>
<script type="text/javascript">
  
$(document).ready(function(){
  $("#request_form").submit(function(e){
    e.preventDefault();

    $.ajax({
      data: $("#request_form").serialize(),
       type: "post",
       url: "insert_request.php",
       success: function(data){
        console.log(data);
        if(data.trim()==="emptyVar"){
          alert("Please type some appeal");
        }
        if(data.trim()==="update_success"){
          alert("Request updated successfully!!");
        }
        if(data.trim()==="update_error"){
          alert("Request updation failed!!");
        }
        if(data.trim()==="sent_successfully"){
          alert("Request sent successfully");
        }
        if(data.trim()==="sent_error"){
          alert("Failed sending request");
        }
       },
       error: function(){
        alert("There was some error calling this ajax");
       }
    });
  });

});

</script>

<script type="text/javascript">
  
function edit_req(){

document.getElementById('request').innerHTML = "<?php echo $request; ?>";
 } 

// <script type="text/javascript">
$(document).ready(function(){
    $("#edit").click(function(){
        $("#appeal").toggle(350);
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
