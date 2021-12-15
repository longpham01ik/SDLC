<?php
session_start();

if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}


include 'header.php';
include 'banner.php';

include 'mvhot.php';
include 'footer.php'
?>