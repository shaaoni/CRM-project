<?php
session_start();

   echo "401 login failed.<br>";
 echo "you haven't logged in yet.<br><br>";
 session_unset();
 session_destroy();
?>

<a href="index.php"> Login here.</a>