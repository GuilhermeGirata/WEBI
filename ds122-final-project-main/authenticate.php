<?php
  session_start();
  
  if (isset($_SESSION["user_id"]) && isset($_SESSION["user_name"]) && isset($_SESSION["user_email"]) && isset($_SESSION["user_complete_name"]) && isset($_SESSION["reg_date"])) {
    $login = true;
    $user_id = $_SESSION["user_id"];
    $user_name = $_SESSION["user_name"];
    $user_email = $_SESSION["user_email"];
    $user_complete_name = $_SESSION["user_complete_name"];
    $reg_date = $_SESSION["reg_date"];

  }
  else{
    $login = false;
  }

?>
