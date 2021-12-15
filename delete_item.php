<?php
	session_start();

	//remove the id from our cart array
	$key = array_search($_GET['id'], $_SESSION['cart']);	
	unset($_SESSION['cart'][$key]);
	
	$_SESSION['message'] = "Product deleted from cart";
	header('location: cart.php');
?>