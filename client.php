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

  <script type="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>

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
        <li class="active"><a href="client.php">Clients</a></li>
        <li><a href="workers.php">Workers</a></li>
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
        <nav>
        <button id="mybtn" onclick="addmodal()"><h4>Add Client</h4></button> &nbsp &nbsp &nbsp
        <button id="list_worker">List Clients</button>&nbsp &nbsp &nbsp
        <button id="Search"> Search </button>&nbsp &nbsp &nbsp
        <!-- <button id="request">Requests</button> -->
        </nav>
            <div id="myModal" class="modal">
              <!-- Modal content -->
              <div class="modal-content">
                <span class="close">&times;</span>
                <p>
                  <center>
                    <nav class="form_nav">
                      <h2>Register</h2>
                      <form action="" method="post" name="client_regis" id="client_regis">
Client First name: <input type="text" name="clfname" id="clfname"><br><br>
Client Last name: <input type="text" name="cllname" id="cllname"><br><br>
Company name: <input type="text" name="cpname" id="cpname"><br><br>
Contact: <input type="text" name="contact" id="contact"><br><br>
E-mail: <input type="email" name="email" id="email" required pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}">
Project Name: <input type="text" name="pname" id="pname"><br><br>
Project Description: <input type="text" name="pdsc" id="pdsc"><br><br>
<!-- Date : <input type="Date" name="dt" id="dt"><br><br> -->
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
            <p>
              
<table border="2px;" class="table table-success table-striped" id="client_table">
    <thead style="border: 2px solid black;" id="tb">

      <th colspan="2">Serial NO</th>
      <th colspan="2">Client Name</th>
      <th colspan="2">Contact</th>
      <th colspan="4">Mail Id</th>
      <th colspan="4">Company Name</th>
      <th colspan="2">Project Name</th>
      <th colspan="4">Project Description</th>
      <th colspan="4">Date of Submission</th>

    </thead>
    <tbody id="tbody"> 
    <?php
    $selct = "SELECT * FROM client_details";
    $result = mysqli_query($conn,$selct);
    if(mysqli_num_rows($result) > 0){
         $id=0;
               while ($row = mysqli_fetch_assoc($result)) {
               $id=$id+1;
               $name = $row['client_fname']." ".$row['client_lname'];
               ?>
                  <tr>
                    <td colspan="2"> <?php echo $id; ?></td>
                    <td colspan="2"> <?php echo $name; ?> </td>
                    <td colspan="2"> <?php echo $row['contact']; ?> </td>
                    <td colspan="4"> <?php echo $row['email']; ?> </td>
                    <td colspan="4"> <?php echo $row['cmp_name']; ?> </td>
                    <td colspan="2"> <?php echo $row['project_name']; ?> </td>
                    <td colspan="4"> <?php echo $row['project_dsc']; ?> </td>
                    <td colspan="4"> <?php echo $row['date_sbmn']; ?> </td>

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
          <div id="pagination_div"> </div>
          <!-- <span id="page"></span> -->
          &nbsp
          <button id="next">Next</button>
      </div>
            </p> 
          </div>
        </div>
        <!-- <div class="col-sm-4">
          <div class="well">
            <p>Text</p> 
          </div>
        </div> -->
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
      clfname: "required",
      cllname: "required",
      cpname: "required",
      contact: "required",
      pname: "required",
      pdsc: "required",
      email: {
        required: true,
        email: true
      }
    },
    messages: {
      clfname: "Please enter client's firstname",
      cllname: "Please enter client's lastname",
      cpname: "Please enter company name",
      contact: "Please enter contact",
      pname: "Please enter project name",
      pdsc: "Please enter project description",
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

      $("#client_regis").submit(function(e) {
        e.preventDefault();
        console.log(e);
        $.ajax({
             data: $("#client_regis").serialize(),
             type: "post",
             url: "insert_client.php",
             //console.log(data);
             success: function(data){
                  //alert("localhost says: " + data);
                  console.log(data);
                  if(data.trim()==="emptyVar"){
                    alert("Data not found");
                    // setTimeout(function(){
                    //     window.location.reload();
                    // }, 5000);
                  }
                  if(data.trim()==="successfull"){
                    alert("Inserted Successfully");
                  }
                  if(data.trim()==="failed"){
                    alert("Insertion failed in user login");
                  }
                  //return true;
             },
              error: function(data) {
            alert('There was some error performing the AJAX call!');
            console.log(data);
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
                  let mt= document.getElementById('client_table');
                  let tr = mt.getElementsByTagName('tr');

                  for(var i=0; i<tr.length; i++){
                    let td = tr[i].getElementsByTagName('td')[5];

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