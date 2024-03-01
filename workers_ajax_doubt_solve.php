<script type="text/javascript">
  
alert("everything okay?");

</script>










<!-- <!DOCTYPE html>
<html>
<head>
  <title>ajax test</title> --> 
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<form action="#" id="form">
  <input type="text" name="fname" id="fname">
  <input type="text" name="lname" id="lname">
  <input type="submit" name="submit" value="Submit" id="submit">
</form> -->


<!-- <script type="text/javascript">
  
 $(document).ready(function() {

      $("#form").submit(function(e) {
        e.preventDefault();

        $.ajax({
             data: $("#form").serializeArray(),
             type: "post",
             url: "insert_worker.php",

             success: function(data){
                  alert("Data Save: " + data);
                  console.log(data);
                  //return true;
             },
              error: function() {
            alert('There was some error performing the AJAX call!');
            }

        });

     });
});
</script> -->


<!-- </body>
</html>
 -->



<!-- url: "./dataflow/insert_worker.php", -->



   <!-- $(document).ready(function() {

      $("#form_data").submit(function(e) {
        e.preventDefault()
      

        $.ajax({
             data: $("#form_data").serializeArray(),
             type: "post",
             url: "ajax_login.php",
             processData: false,
            contentType: false,
            cache: false,
             success: function(data){
              
              //$("#success").html(data);
              // window.location='sdf.php';
                   alert(data);
                  console.log(data);
                 
               return true;
             },
              error: function() {
            alert('There was some error performing the AJAX call!');
            }

        });

     });
}); -->







<!-- // function auth(event) {
    //       event.preventDefault();

    //       var username = document.getElementById("username").value;
    //       var password = document.getElementById("password").value;

    //       if (username === "admin123" && password === "admin") {
    //            window.location.replace("dashboard.php");
    //       } else {
    //           alert("Invalid information");
    //           return;
    //       }
    // } -->






    <?php
// session_start();
// include_once('../config/db.php');

?>

<?php

  // $decoded = json_decode($_POST['data'],true);

  // echo $decoded;


//   $fname =  $_POST['fname'];
//   $lname =  $_POST['lname'];


// $sql= "INSERT INTO testing (first_nm,last_nm) VALUES ('$fname','$lname') ";

//         $myquery = mysqli_query($conn,$sql);

//         if(!$myquery){

//           echo 'An error occurred';
//         }else{
//           echo 'Inserted Successfully';

//         // $page = 'workers.php';
//         //   header("Refresh:5, url=$page");

//         }
?>

<!-- <script type="text/javascript">
        
        var er = document.getElementById("err_modal");
        var er_span = document.getElementsByClassName("close_err")[0];
        er.style.display = "none";
        document.getElementById('err_text').innerHTML = "Please fill out all the fields";

        span.onclick = function() {
            er.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == er) {
                  er.style.display = "none";
            }
        }

    </script>