<?php 
include_once("../config/db.php");
session_start();

// Check if ID is set in the URL or POST data
$tid = $_GET['tid'];

// Retrieve existing data from the database based on ID
$sql = "SELECT * FROM emp_task WHERE task_id = $tid";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0) {
    // Output data of each row
    while ($tasks = mysqli_fetch_assoc($result)) {
    	//print_r($row); 
        // Assign retrieved data to variables
      $task_id = $tasks['task_id'];
      $task_desc = $tasks['task_desc'];
      $emp_id = $tasks['emp_id'];
      $email = $tasks['email'];
      $date_ddln = $tasks['deadline'];
      $date = $tasks['date'];

      $timestamp = strtotime($date);
      $formattedDate = date('d-m-Y', $timestamp);

      $timestamp_ddln = strtotime($date_ddln);
      $formattedDate_ddln = date('d-m-Y', $timestamp_ddln);

        
        // Update query
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
            //$user_id = $_POST['userId_update'];
            $emp_id = $_POST['eid_update'];
            $email = $_POST['mail_update'];
            $task_desc = $_POST['desc_update'];
            $date_ddln = $_POST['ddln_update'];
            $date = $_POST['date_update'];
  

            $update_sql = "UPDATE emp_task SET 
                            emp_id = '$emp_id', 
                            email = '$email', 
                            task_desc = '$task_desc', 
                            deadline = '$date_ddln'
                            WHERE task_id  = $tid";

            $result2 = mysqli_query($conn,$update_sql);
            if ($result2) {
                echo "<br/><span class='btn btn-success'>Record updated successfully</span>" ;
               header("Refresh:5; ");
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }

    }
} else {
    echo "No results found for ID: " . $tid;
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit User Information</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"  crossorigin="anonymous">
</head>
<body>

	<div class="container">
  <div class="row">
    <div class="col-md-6 offset-md-3">
    	<h1>Edit Task Assigning Informations !</h1>
      <form method="post">

        <div class="form-group row">
          <label for="username" class="col-sm-4 col-form-label">Employee ID:</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="username" name="eid_update" value="<?php echo $emp_id; ?>">
          </div>
          &nbsp;&nbsp;
        </div>
        <div class="form-group row">
          <label for="firstName" class="col-sm-4 col-form-label">Email:</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="firstName" name="mail_update" value="<?php echo $email; ?>">
          </div>
          &nbsp;&nbsp;
        </div>
        <div class="form-group row">
          <label for="lastName" class="col-sm-4 col-form-label">Task Description:</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="lastName" name="desc_update" value="<?php echo $task_desc; ?>">
          </div>&nbsp;&nbsp;
        </div>
        <div class="form-group row">
          <label for="contactNumber" class="col-sm-4 col-form-label">Date:</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="contactNumber" name="date_update" value="<?php echo $formattedDate; ?>">
          </div>&nbsp;&nbsp;
        </div>
        <div class="form-group row">
          <label for="address" class="col-sm-4 col-form-label">Deadline:</label>
          <div class="col-sm-8">
            <input type="date" class="form-control" id="address" name="ddln_update" value="<?php echo $formattedDate_ddln; ?>">
          </div>&nbsp;&nbsp;
        </div>
        <input type="submit" class="btn btn-primary" name="submit" value="UPDATE">
      </form>
      &nbsp;&nbsp;
    </div>
  </div>
</div>

</body>
</html>

