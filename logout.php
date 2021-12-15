<?php
include 'admin/connect.php';
session_start();
//destroy the session
//session_unset();

foreach($_SESSION as $key => $value)
{

    if ($key !== 'cart')
    {

      unset($_SESSION[$key]);

    }

}

//redirect to login page
header("location: login.php");
?>