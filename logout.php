<?php 

//  destroy the session object and redirect user to login page
  session_start();
  session_destroy();
  header("location:login.php")
?>