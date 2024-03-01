<!DOCTYPE html>
<html>
<head>
	<title>User Login</title>
  <link rel="stylesheet" type="text/css" href="./assets/css/index_user.css">
  
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script type="text/javascript" src="./assets/js_User/index_user.js"></script>

  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
  
</head>
<body>
	<center>
		<nav class="form_nav">
			
			<form id="form_data" action="#" name="form_data">
				<h2>Log In</h2>
				<h5>User</h5>
				<label>Username: </label><input type="text" name="username" id="username"><br><br>
				<label>Password: </label><input type="text" name="password" id="password"><br><br>
				<input type="submit" name="submit" value="Log In" style="cursor: pointer;">

			</form>

    

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
        url: "ajax_login_user.php",
        success: function(data){
          console.log(data);
          
          if(data.trim()==="success"){
            window.location.href ="dashboard.php";
          }
          // else{
          //   window.location.href="index.php";
          // }
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
          username: "Please enter your username",
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