<?php

		include "connect.php";
		$sql = "delete from songs where id = '$_GET[id]'";
		$delete_query= mysqli_query($con,$sql);
		if($delete_query){
			echo "<script>alert('delete successfully')</script>";
		}
		
		header('location:content_song.php?quanly=song_manage');
?>