
<?php
		
		if(isset($_GET["function"]))
		{
			$row = $_GET["function"];
		}
		else
			$row = "";
		if ($row == "customer_manage") {
			include("customer_manage.php");
		}else if ($row == "customer_add") {
			include("customer_add.php");
		}else if ($row == "customer_edit") {
			include("customer_edit.php");
		}else if($row == "customer_delete"){
			include("customer_delete.php");
		}
?>
