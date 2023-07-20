<!DOCTYPE html>
<html>
<head>
  <title>Admin Login</title>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <link rel="stylesheet" type="text/css" href="./css/index.css">

  <script type="text/javascript" src="./js/index_admin.js"></script>
  
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>

</head>
<body>
  <center>
    <nav class="form_nav">
      
      <form action="" id="form_data" name="form_data">
        <h2>Log In</h2>
        <h5>Admin</h5>
        <label>Username: </label><input type="text" name="username" id="username"><br><br>
        <label>Password: </label><input type="password" name="password" id="password"><br><br>
        <input type="submit" name="submit" value="Log In">

      </form>
      <div id="result"></div>
      <div id="success"></div>
    </nav>
  </center>

</body>

<script type="text/javascript">

 
$(document).ready(function(){
    $("#form_data").submit(function(e){
      e.preventDefault();
      $.ajax({
        data:$("#form_data").serialize(),
        type: "post",
        url: "ajax_login.php",
        success: function(data){
          console.log(data);
          
          if(!data.trim()=="success"){
            window.location.href ="index.php";
          }
          else{
            window.location.href="dashboard.php";
          }
        },
        error: function() {
          alert('There was some error performing the AJAX call');
        }
      });
    });
  });

</script>

<script type="text/javascript">

$(function() {
  $("form[name='form_data']").validate({
    rules: {
      username: "required",
      password: {
        required: true
      }
    },
    messages: {
      username: "Please enter your firstname",
      password: {
        required: "Please provide a password"
      }
    },
    submitHandler: function(form) {
      form.submit();
    }
  });
});


</script>

</html>

