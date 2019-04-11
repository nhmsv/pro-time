<?php

  require_once("header.php");

if($logged_in)
{
    unset($_SESSION['uid']);
    unset($_SESSION['Name']);
    unset($_SESSION['Email']);
    unset($_SESSION['Password']);
    unset($_SESSION['Department']);
    $_SESSION['logged_in'] = false;

    session_unset();
    session_destroy();

}
header("Location: index.php");