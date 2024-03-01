<?php 
include_once("./config/db.php");
session_start(); 

if(isset($_SESSION['user']) && isset($_SESSION['pas'])){
  $user = $_SESSION['user'];
  $pas = $_SESSION['pas'];

// print_r($user);
// print_r($pas);

$sql = "SELECT * FROM user_login INNER JOIN workers ON user_login.uname = workers.uname WHERE user_login.uname= '$user' and user_login.pass= '$pas' ";
$result = mysqli_query($conn,$sql);


  $row = mysqli_fetch_assoc($result);



    $email = $row['email'];
    $fname = $row['fname'];
    $lname = $row['lname'];
    $fullname = $fname." ".$lname;

    $userid='emp-000';
    $user_id = $row['id'];
    $emp_userid =$userid.$user_id;

    $sql_req2 = "SELECT * FROM user_requests Where user_id= '$emp_userid' and email_id = '$email' ";
    $result_req2 = mysqli_query($conn,$sql_req2);
    //$req_row = mysqli_fetch_assoc($result_req2);
    // $req_id = $req_row['request_id'];

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

  <style type="text/css">
    .active_button{
      background-color: blue;
      color: white;
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
        <li class="active"><a href="dashboard.php">User Dashboard</a></li>
        <li><a href="calender.php">Calender</a></li>
        <!-- <li><a href="workers.php">Workers</a></li> -->
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
        <!-- <button id="show_application"> Applications</button> -->
      </div>
      
      <div class="row">
        <div class="col-sm-3">
          <div class="well" id="send_application">
            <h4 style="cursor: pointer;">Place Your Messages</h4>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well" id="send_application">
            <h4 id="show_application" style="cursor: pointer;">
             Applications</h4>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well" id="task_assigned">
            <h4 id="" style="cursor: pointer;">
             Tasks List</h4>
          </div>
        </div>
      </div>

<div id="appeal" style="display: none;"> 
<form action="" method="post" name="request_form" id="request_form">
 
  <textarea id="request"  name="request" placeholder="Enter your appeal" class="md-textarea form-control" rows="4" cols="50"></textarea>
  <br/>
  <input type="submit" name="submit" value="Submit Request" class="btn btn-primary">
</form>
</div>

<div id="edit_appeal" style="display: none;"> 
<form action="edit_request.php?rid=<?php echo $req_id;?>" method="post" name="edit_request_form" id="edit_request_form">
 
  <textarea id="editRequest"  name="editRequest" placeholder="" class="md-textarea form-control" rows="4" cols="50"></textarea>
  <br/>
  <input type="submit" name="submit" value="Edit Message" class="btn btn-primary">
</form>
</div>
<br>
<div id="application_table" style="display: none;">
         <table border="2px;" class="table table-success table-striped" id="worker_table">
           <thead style="border: 2px solid black;">
             <th colspan="2">Employee Id</th>
             <th colspan="2">Email</th>
             <th colspan="2">Name</th>
             <th colspan="2">Request</th>
             <th colspan="2">Action</th>
           </thead>
           <tbody id="tbody">
<?php
    
   if(mysqli_num_rows($result_req2)>0){
     $count = 0;
     while($user_req = mysqli_fetch_assoc($result_req2)){
        //$user_req = mysqli_fetch_assoc($result_req2);
        // $action = $req_row["status"];
        // $request = $req_row["user_request"];
        $action = $user_req["status"];
        $request = $user_req["user_request"];
        $req_id = $user_req['request_id'];
?>

    <tr>
        <td colspan="2"><?php echo $emp_userid; ?></td>
        <td colspan="2"><?php echo $email; ?></td>
        <td colspan="2"><?php echo $fullname; ?></td>
        <td colspan="2"><?php echo $request; ?></td>
        
<?php

      if($action==="approved"){
?>
        <td colspan="4">
         <label><?php echo '<label class="text-success">'.$action.'</label>'; ?></label>
        </td>
<?php

      }
      else if($action==="rejected"){
?>
        <td colspan="4">
         <label><?php echo '<label class="text-danger">'.$action.'</label>'; ?></label>
        </td>
<?php
      }
       else if($action==="pending"){
?>
        <td colspan="4">
         <label><?php echo '<label class="text-warning">'.$action.'</label>'; ?></label> | 
         <label> <a onclick="edit_req()" id="edit" style="cursor: pointer;">EDIT</a></label> | 
         <label> <a href="cancel_req.php?rid=<?php echo $req_id; ?>">CANCEL</a></label>
        </td>
<?php
      }
      else if($action=== "cancelled"){
?>
        <td colspan="4">
         <label><?php echo '<label class="text-dark">'.$action.'</label>'; ?></label>
        </td>
<?php
      }
?>
    </tr>
<?php
    }   
 } 
?>
           </tbody>
         </table>

      <div id="pagination" style="display: flex;">
            <button id="prev">Previous</button>&nbsp
            <div id="pagination_div">
              
            </div>
          <!-- <span id="page"></span> -->
          &nbsp
          <button id="next">Next</button>
      </div>

      </div>
      <br>
      <div id="task_table" style="display: none;">
        <table border="2px;" class="table table-success table-striped" id="worker_table">
          <thead style="border: 2px solid black;">
              <th colspan="2">S. No.</th>
              <th colspan="2">Employee ID</th>
              <th colspan="4">Email</th>
              <th colspan="6">Task Descripton</th>
              <th colspan="2">Deadline</th>
          </thead>
          <tbody id="task_body">
<?php

  $sql = "SELECT user_id FROM workers WHERE uname='$user'";
  $result = mysqli_query($conn,$sql);
  $user_data = mysqli_fetch_assoc($result);
  $user_id = $user_data['user_id'];
  // echo $user_id;

  $sql_task= "SELECT * FROM emp_task WHERE emp_id='$user_id'";
  $result = mysqli_query($conn,$sql_task);

  if(mysqli_num_rows($result)>0){
    $id=0;
    while($row_task=mysqli_fetch_assoc($result)){
      $id = $id+1;
      $emp_id = $row_task['emp_id'];
      $email = $row_task['email'];
      $task_desc = $row_task['task_desc'];
      $deadline = $row_task['deadline'];

?>

        <tr>
          <td colspan="2"><?php echo $id; ?></td>
          <td colspan="2"><?php echo $emp_id; ?></td>
          <td colspan="4"><?php echo $email; ?></td>
          <td colspan="6"><?php echo $task_desc; ?></td>
          <td colspan="2"><?php echo $deadline; ?></td>
        </tr>

<?php
    }
  }
?>    
          </tbody>
        </table>
            <div id="t_pagination" style="display: flex;">
                <button id="t_prev">Previous</button>&nbsp
                <div id="t_pagination_div">
                  
                </div>
              <!-- <span id="page"></span> -->
              &nbsp
              <button id="t_next">Next</button>
          </div>
      </div>
<br>
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

$(document).ready(function(){
  $("#task_assigned").click(function(){
      $("#task_table").toggle(350);
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

document.getElementById('editRequest').innerHTML = "<?php echo $request; ?>";
 } 

// <script type="text/javascript">
$(document).ready(function(){
    $("#edit").click(function(){
        $("#edit_appeal").toggle(350);
      });
  });

</script>

<script type="text/javascript">
  $(document).ready(function() {
    var rowsShown = 2; // Number of rows to display per page
    var rowsTotal = $('#tbody tr').length; // Total number of rows
    var numPages = rowsTotal / rowsShown; // Calculate the number of pages

    for (var i = 0; i < numPages; i++) {
        var pageNum = i + 1;
        $('#pagination_div').append('<button class="page-btn" rel="' + i + '">' + pageNum + '</button> ');
    }

    $('#tbody tr').hide(); // Hide all rows
    $('#tbody tr').slice(0, rowsShown).show(); // Show the first set of rows

    $('#pagination_div button:first').addClass('active_button'); // Mark the first page as active

    $('#pagination_div button').click(function() {
        $('#pagination_div button').removeClass('active_button'); // Remove active class from all buttons
        $(this).addClass('active_button'); // Add active class to the clicked button

        var pageNum = $(this).attr('rel');
        var start = pageNum * rowsShown;
        var end = start + rowsShown;

        $('#tbody tr').hide(); // Hide all rows
        $('#tbody tr').slice(start, end).show(); // Show the selected rows
    });

    $('#next').click(function () {
    var currentPage = $('.page-btn.active_button').attr('rel');
    //console.log(parseInt(currentPage));
    if (currentPage < numPages - 1) {
        var nextPage = parseInt(currentPage) + 1;
        var back_row = parseInt(currentPage);
        $('#pagination_div button').removeClass('active_button');
        $('#pagination_div button[rel="' + nextPage + '"]').addClass('active_button');
        var start = nextPage * rowsShown;
        var end = Math.min((start + rowsShown), rowsTotal);
       
        $('#tbody tr').hide();
        $('#tbody tr').slice(start, end).show();
    }
    
});

      $('#prev').click(function () {
      var currentPage = $('.page-btn.active_button').attr('rel');
      //console.log(parseInt(currentPage));
      if (currentPage > 0) {
          var prevPage = parseInt(currentPage) - 1;
          $('#pagination_div button').removeClass('active_button');
          $('#pagination_div button[rel="' + prevPage + '"]').addClass('active_button');
          var start = prevPage * rowsShown;
          var end = start + rowsShown;

          $('#tbody tr').hide();
          $('#tbody tr').slice(start, end).show();
      }
      
    });
});

</script>

<script type="text/javascript">
  $(document).ready(function() {
    var rowsShown = 2; // Number of rows to display per page
    var rowsTotal = $('#task_body tr').length; // Total number of rows
    var numPages = rowsTotal / rowsShown; // Calculate the number of pages

    for (var i = 0; i < numPages; i++) {
        var pageNum = i + 1;
        $('#t_pagination_div').append('<button class="page-btn" rel="' + i + '">' + pageNum + '</button> ');
    }

    $('#task_body tr').hide(); // Hide all rows
    $('#task_body tr').slice(0, rowsShown).show(); // Show the first set of rows

    $('#t_pagination_div button:first').addClass('active_button'); // Mark the first page as active

    $('#t_pagination_div button').click(function() {
        $('#t_pagination_div button').removeClass('active_button'); // Remove active class from all buttons
        $(this).addClass('active_button'); // Add active class to the clicked button

        var pageNum = $(this).attr('rel');
        var start = pageNum * rowsShown;
        var end = start + rowsShown;

        $('#task_body tr').hide(); // Hide all rows
        $('#task_body tr').slice(start, end).show(); // Show the selected rows
    });

    $('#t_next').click(function () {
    var currentPage = $('.page-btn.active_button').attr('rel');
    //console.log(parseInt(currentPage));
    if (currentPage < numPages - 1) {
        var nextPage = parseInt(currentPage) + 1;
        var back_row = parseInt(currentPage);
        $('#t_pagination_div button').removeClass('active_button');
        $('#t_pagination_div button[rel="' + nextPage + '"]').addClass('active_button');
        var start = nextPage * rowsShown;
        var end = Math.min((start + rowsShown), rowsTotal);
       
        $('#task_body tr').hide();
        $('#task_body tr').slice(start, end).show();
    }
    
});

      $('#t_prev').click(function () {
        var currentPage = $('.page-btn.active_button').attr('rel');
        //console.log(parseInt(currentPage));
        if (currentPage > 0) {
            var prevPage = parseInt(currentPage) - 1;
            $('#t_pagination_div button').removeClass('active_button');
        $('#t_pagination_div button[rel="' + prevPage + '"]').addClass('active_button');
            var start = prevPage * rowsShown;
            var end = start + rowsShown;

            $('#task_body tr').hide();
            $('#task_body tr').slice(start, end).show();
        }
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
