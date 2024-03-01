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
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
 <!--  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->


  <link rel="stylesheet" type="text/css" href="css/workers.css">
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>

  

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
<style type="text/css">
  
  .hide{
      /*visibility: hidden;*/
      display: none;
  }
  .show{
      /*visibility: visible;*/
      display: table-row-group;
  }
  .active_felx{
    display: flex;
  }

  .active_emp{
    height: 10px;
    width: 10px;
    border-radius: 50%;
    background-color: green;
    border: 2px solid green;
  }
  .inactive_emp{
    height: 10px;
    width: 10px;
    border-radius: 50%;
    background-color: red;
    border: 2px solid red;
  }

  .active_button{
    background-color: blue;
    color: white;
  }

  .page-btn{
    border: 2px solid grey;
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
        <li><a href="client.php">Clients</a></li>
        <li class="active"><a href="workers.php">Workers</a></li>
        <!-- <li><a href="projects.php">Projects</a></li> -->
        <!-- <li><a href="#">Properties</a></li> -->
        <!-- <li><a href="leads.php">Leads</a></li> -->
        <li><a href="calendar.php">Time sheet</a></li>
        <li><a href="#">Billing & Invoices</a></li>
        <!-- <li><a href="#">Agreements</a></li>
        <li><a href="#">Masters</a></li> -->
        <li><a href="logout.php">Log Out</a></li>
        <hr style="background-color: black;">
        <li><a href="profile.php">Account Settings</a></li>
      </ul><br>
    </div>
    <br>
    
    <div class="col-sm-9">
      <div class="well">
        <nav > <!-- class="navigation_bar" -->
        <button id="mybtn" class="mybtn" onclick="addmodal()"><h4>Add Worker</h4></button> &nbsp &nbsp &nbsp
        <button id="list_worker">List Worker</button>&nbsp &nbsp &nbsp
        <button id="Search"> Search </button>&nbsp &nbsp &nbsp
        <button id="request">Requests</button>&nbsp &nbsp &nbsp
        </nav>
            <div id="myModal" class="modal">
              <!-- Modal content -->
              <div class="modal-content">
                <span class="close">&times;</span>
                <p>
                  <center>
                    <nav class="form_nav">
                      <h2>Register</h2>

    <form name="regis" id="regis">
        User Name: <input type="text" name="uname" required><br><br>
        First name: <input type="text" name="fname" required><br><br>
        Last name: <input type="text" name="lname" required><br><br>
        ID: <input type="text" name="Id" required><br><br>
        Date of Joining: <input type="date" name="doj" required><br><br>
        E-mail: <input type="email" name="admin_adrs" required><br><br>
        Password: <input type="password" name="pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"  required><br><br>
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
<div id="search_div" style="display: none;" onkeyup="SearchByName()"><input type="text" name="search" placeholder="Search Here (Type Name)" id="search" class="form-control"></div>

<p class="hide" id="noData_list">no data found</p><br>

    <div class="row">
        <div class="col-sm-12">
  <div class="well" id="list_table">
         
              
<table border="2px;" class="table table-success table-striped" id="worker_table">
    <thead style="border: 2px solid black;" id="tb">

      <th colspan="2"><b>Serial NO </b></th>
      <th colspan="2"><b>Employee Id</b></th>
      <th colspan="4"><b>Name</b></th>
      <th colspan="2"><b>Username</b></th>
      <th colspan="4"><b>Email</b></th>
      <th colspan="4"><b>Password</b></th>
      <th colspan="2"><b>Contacts</b></th>
      <th colspan="2"><b>Address</b></th>
      <th colspan="4"><b>Date of Joining</b></th>
      <!-- <th colspan="4">Qualification</th> -->
      <th colspan="4"><b>Designation</b></th>
      <th colspan="2"><b>Action</b></th>
      
    </thead>
      <tbody id="tbody"> 
        <?php
        $selct = "SELECT * FROM workers INNER JOIN user_login ON workers.uname = user_login.uname ";
        $result = mysqli_query($conn,$selct);
        if(mysqli_num_rows($result) > 0){
             $id=0;
                   while ($row = mysqli_fetch_assoc($result)) {
                   $id++;
                   $name = $row['fname']." ".$row['lname'];
                   $active_status = $row['status'];
                   $worker_id = $row['id'];
                 //print_r($active_status);

                   ?>
                      <tr id="<?php echo $worker_id;?>" >
                       
                        <td colspan="2">
                      <div class="active_felx">
                        <?php

                        echo $id;
                        if($row['status']==="active"){
              ?><span class="active_emp"></span><?php
                        }
                        else if($row['status']==="inactive"){
              ?><span class="inactive_emp"></span><?php
                        }
                        ?>
                      </div>
                        </td>

                        <td colspan="2"> <?php echo $row['user_id']; ?></td>
                        <td colspan="4"> <?php echo $name; ?></td>
                        <td colspan="2"> <?php echo $row['uname']; ?> </td>
                        <td colspan="4"> <?php echo $row['email']; ?> </td>
                        <td colspan="4"> <?php echo $row['pass']; ?> </td>
                        <td colspan="2"> <?php echo $row['contacts']; ?> </td>
                        <td colspan="2"> <?php echo $row['address']; ?> </td>
                        <td colspan="4"> <?php echo $row['doj']; ?> </td>
                        <!-- <td colspan="4"> <?php //echo $row['qualification']; ?> </td> -->
                        <td colspan="4"> <?php echo $row['designation']; ?> </td>
                        <td colspan="8">

                          <a href="edit_user.php?uid=<?php echo $worker_id;?>"
                           style="cursor: pointer;">
                           <i class="bi bi-pen-fill" style="color: green;"></i>
                            </a>|
                            <i class="bi bi-trash-fill remove"
                             style="color: red; cursor: pointer;"
                              onclick="del(this)">
                            </i>

                        </td>
                      </tr>
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

    <div id="pagination" style="display: flex;">
      <button id="prev">Previous</button>&nbsp
      <div id="pagination_div">
        
      </div>
    <!-- <span id="page"></span> -->
    &nbsp
    <button id="next">Next</button>
</div>

          <!-- <h3>Pagination</h3> -->
          </div>
        </div>
      
      </div>

<div style="display: none;" id="request_table">
  
  <table border="2px;" class="table table-success table-striped" id="worker_table">
           <thead style="border: 2px solid black;">
             <th colspan="2">Serial No</th>
             <th colspan="2">Employee Id</th>
             <th colspan="2">Email</th>
             <th colspan="2">Name</th>
             <th colspan="4">Request</th>
             <!-- <th colspan="2">Status</th> -->
             <th colspan="6">Action</th>
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
        $status = $row["status"];

?>

    <tr>
        <td colspan="2"><?php echo $count ?></td>
        <td colspan="2"><?php echo $emp_userid; ?></td>
        <td colspan="2"><?php echo $email; ?></td>
        <td colspan="2"><?php echo $fullname; ?></td>
        <td colspan="4"><?php echo $request; ?></td>
        <!-- <td colspan="2"><?php // echo $status; ?></td> -->
        <?php if($status==='pending'){ ?>
        <td colspan="6">
          <label class="text-warning"> Pending </label> |
          <a href="accept_req.php?uid=<?php echo $user_id;?>"><label> Accept </label></a> |
          <a href="reject_req.php?uid=<?php echo $user_id;?>"><label> Reject </label></a>
          <!-- | <label class="text-dark"> Cancelled </label> -->
        </td>
          <?php 
        }

        else if($status==='cancelled') {

        ?>
          <td colspan="6">
          <!-- <label class="text-dark"> Pending </label> |
          <label class="text-dark"> Accept </label> | 
          <label class="text-dark"> Reject </label> |  -->
          <label class="text-danger">Cancelled</label>
        </td>

        <?php

        }

        else if($status==='approved'){

          ?>

        <td colspan="6">
          <!-- <label class="text-dark"> Pending </label> | -->
          <label class="text-success"> Accepted </label>
          <!-- | <label class="text-dark"> Reject </label> | 
          <label class="text-dark"> Cancelled </label> -->
        </td>

        <?php

        }else if($status==='rejected'){
      ?>
        <td colspan="6">
          <!-- <label class="text-dark"> Pending </label> |
          <label class="text-dark"> Accept </label> | -->
          <label class="text-success"> Rejected </label>
          <!-- <label class="text-dark"> Cancelled </label> -->
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

         <div id="t_pagination" style="display: flex;">
            <button id="t_prev">Previous</button>&nbsp
            <div id="t_pagination_div">
              
            </div>
          <!-- <span id="page"></span> -->
          &nbsp
          <button id="t_next">Next</button>
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
<!-- registration form submit -->
<!-- paginationo code -->

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
    $("#regis").validate({
        submitHandler: function(form) {
            // Your AJAX code for form submission can go here
            $.ajax({
                data: $(form).serialize(),
                type: "post",
                url: "insert_worker.php",
                success: function(data) {
                    //alert("localhost says: " + data);
                    console.log(data);
                    if(data.trim()==="iserted_workerinsert_user"){
                      alert("Inserted Successfully!!");
                    }
                    else if(data.trim()==="iserted_workerfailed_user"){
                      alert("Successfully added to database but login will fail");
                    }
                    else if(data.trim()==="failed_workerinsert_user"){
                      alert("Failed adding to database but login will work");
                    }
                    else{
                       alert("Insertion Failed");
                    }
                },
                error: function(data) {
                    alert('There was some error performing the AJAX call!');
                    console.log(data);
                }
            });
        }
    });
});

</script>

<!--end  registration form submit -->
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

            function del(){
              confirm('are you want to delete this item');

            }

</script>

<script type="text/javascript">
  
    function del(element) {
        var id = $(element).parents("tr").attr("id");

        if (confirm('Are you sure to remove this record ?')) {
            $.ajax({
                url: 'delete_user.php',
                type: 'GET',
                data: { id: id },
                error: function () {
                    alert('Something is wrong');
                },
                success: function (data) {
                    $("#" + id).remove();
                    alert("Record removed successfully");
                }
            });
        }
    }

    // Event binding for .remove elements (executed once)
    $(document).ready(function () {
        $(".remove").click(function () {
            del(this);
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