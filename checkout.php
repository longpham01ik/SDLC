<?php
	session_start();
    if(isset($_SESSION['login'])){
        $_SESSION['message'] = 'check out successfully';
     
        $_SESSION['checkout'] = true;
        header('location: cart.php');
  
    }
    else{
        $_SESSION['message'] = 'login first';
        header('location: cart.php');
        
    }
?>