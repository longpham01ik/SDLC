<?php
	session_start();
    if($_SESSION['cart']){
        unset($_SESSION['cart']);
        $_SESSION['message'] = 'Cart cleared successfully';
        header('location: index.php');
       
       
    }
    else{
        $_SESSION['message'] = 'Cart is empty';
        header('location: index.php');
    }
?>