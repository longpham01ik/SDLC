
<?php
		
		if(isset($_GET["quanly"]))
		{
			$row = $_GET["quanly"];
		}
		else
			$row = "";
		if ($row == "song_manage") {
			include("song_manage.php");
		}else if ($row == "add_song") {
			include("add_song.php");
		}else if ($row == "edit_song") {
			include("edit_song.php");
		}else if($row == "delete_song"){
			include("delete_song.php");
		}
?>
