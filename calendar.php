<?php 

session_start(); 
if(isset($_SESSION['u_name']) && isset($_SESSION['u_pass'])){

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Calendar</title>
  <meta charset="utf-8">
  
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <link rel="stylesheet" type="text/css" href="./css/dashboard.css">

  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>

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
        <li class="active"><a href="#">Admin Dashboard</a> <?php echo $username; ?></li>
        <li><a href="user.html">User</a></li>
        <!-- <li><a href="#">Activity</a></li> -->
        <li><a href="logout.php">Log Out</a></li> -->
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
        <li><a href="workers.php">Workers</a></li>
        <!-- <li><a href="projects.php">Projects</a></li> -->
        <!-- <li><a href="#">Properties</a></li> -->
        <!-- <li><a href="leads.php">Leads</a></li> -->
        <li class="active"><a href="calendar.php">Time sheet</a></li>
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
        <center><h1>Calender</h1></center>
      </div>
      <div class="row" id="calendar">
     
      </div>
    </div>
  </div>
</div>

</body>
</html>

<script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth'
        });
        calendar.render();
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
