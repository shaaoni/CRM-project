<?php 
include_once("../config/db.php");
session_start();

// Check if ID is set in the URL or POST data
$id = $_GET['uid'];

// Retrieve existing data from the database based on ID
$sql = "SELECT * FROM workers WHERE ID = $id";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0) {
    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
    	//print_r($row); 
        // Assign retrieved data to variables
        $user_id = $row['user_id'];
        $uname = $row['uname'];
        $fname = $row['fname'];
        $lname = $row['lname'];
        $contacts = $row['contacts'];
        $address = $row['address'];
        $doj = $row['doj'];
        $email = $row['email'];
        $qualification = $row['qualification'];
        $designation = $row['designation'];

        
        // Update query
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
            //$user_id = $_POST['userId_update'];
            $uname = $_POST['uname_update'];
            $fname = $_POST['fname_update'];
            $lname = $_POST['lname_update'];
            $contacts = $_POST['contacts_update'];
            $address = $_POST['address_update'];
           
            $email = $_POST['email_update'];
            $qualification = $_POST['qua_update'];
            $designation = $_POST['designation_update'];

            $update_sql = "UPDATE workers SET 
                             
                            uname = '$uname', 
                            fname = '$fname', 
                            lname = '$lname', 
                            contacts = '$contacts', 
                            address = '$address', 
                            
                            email = '$email', 
                            qualification = '$qualification', 
                            designation = '$designation' 
                            WHERE id  = $id";

            if ($conn->query($update_sql) === TRUE) {
                echo "<br/><span class='btn btn-success'>Record updated successfully</span>" ;
               header("Refresh:5; ");
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }

    }
} else {
    echo "No results found for ID: " . $id;
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
    	<h1>Edit User Informations !</h1>
      <form method="post">
        <div class="form-group row">
          <label for="username" class="col-sm-4 col-form-label">User Name:</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="username" name="uname_update" value="<?php echo $uname; ?>">
          </div>
          &nbsp;&nbsp;
        </div>
        <div class="form-group row">
          <label for="firstName" class="col-sm-4 col-form-label">First Name:</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="firstName" name="fname_update" value="<?php echo $fname; ?>">
          </div>
          &nbsp;&nbsp;
        </div>
        <div class="form-group row">
          <label for="lastName" class="col-sm-4 col-form-label">Last Name:</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="lastName" name="lname_update" value="<?php echo $lname; ?>">
          </div>&nbsp;&nbsp;
        </div>
        <div class="form-group row">
          <label for="contactNumber" class="col-sm-4 col-form-label">Contact Number:</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="contactNumber" name="contacts_update" value="<?php echo $contacts; ?>">
          </div>&nbsp;&nbsp;
        </div>
        <div class="form-group row">
          <label for="address" class="col-sm-4 col-form-label">Address:</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="address" name="address_update" value="<?php echo $address; ?>">
          </div>&nbsp;&nbsp;
        </div>
        <div class="form-group row">
          <label for="email" class="col-sm-4 col-form-label">Email Id:</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="email" name="email_update" value="<?php echo $email; ?>">
          </div>&nbsp;&nbsp;
        </div>
        <div class="form-group row">
          <label for="qualification" class="col-sm-4 col-form-label">Qualification:</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="qualification" name="qua_update" value="<?php echo $qualification; ?>">
          </div>&nbsp;&nbsp;
        </div>
        <div class="form-group row">
          <label for="designation" class="col-sm-4 col-form-label">Designation:</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="designation" name="designation_update" value="<?php echo $designation; ?>">
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

