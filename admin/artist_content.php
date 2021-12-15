
<?php
		
		if(isset($_GET["function"]))
		{
			$row = $_GET["function"];
		}
		else
			$row = "";
		if ($row == "artist_manage") {
			include("artist_manage.php");
		}else if ($row == "artist_add") {
			include("artist_add.php");
		}else if ($row == "artist_edit") {
			include("artist_edit.php");
		}else if($row == "artist_delete"){
			include("artist_delete.php");
		}
?>
