<?php
		include "connect.php";
		$sql = "DELETE FROM users WHERE id = '$_GET['id']";
		mysqli_query($con,$sql)
		header('location:content_customer.php?function=customer_manage');
?>