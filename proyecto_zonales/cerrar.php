<?php
  
  session_start();
//  echo $_SESSION['user'];
  unset($_SESSION['user']);
//  echo $_SESSION['user'];
  session_destroy();
  header("Location: index.php");

?>