<?php
		session_start();
		include 'header.php';
		include "connect.php";
		$sql = "SELECT s.id,s.genre_id, s.artist_id ,s.name, s.price, s.file, s.image, g.name, a.name  from songs s, artists a, genre g where s.genre_id = g.id and s.artist_id = a.id";
         if( isset($_GET['search']) ){
            $name = mysqli_real_escape_string($con, htmlspecialchars($_GET['search']));
            $sql = "SELECT s.id,s.genre_id, s.artist_id ,s.name, s.price, s.file, s.image, g.name, a.name  from songs s  inner join artists a on s.artist_id = a.id inner join genre g on s.genre_id = g.id  where s.name like '%$name%' or a.name like '%$name%' ";
         }
	 	$result = mysqli_query($con,$sql);

?>
<div class="container bg-light">
<div class="infor">

<table  border="1px solid black;" align="center" style="margin-top: 10px; text-align: center;" >
	<tr>
		<th width="50px;">ID</th>
		<th width="200px;">Name</th>
	
		<th width="100px;">Price</th>
		<th width="100px;">Artist</th>
		<th width="100px;">Genre</th>
		<th width="200px;">File</th>
		<th width="200px;">Image</th>
		<th width="100px;"><a class="btn btn-primary btn-block" href="content_song.php?quanly=add_song">Add</a></th>
	</tr>
<?php while ($row = mysqli_fetch_array($result)) {

?>
	<tr>
		<td><?php echo $row['id']; ?> </td>
		<td><?php echo $row[3]; ?></td>
	
		<td><?php echo $row['price']; ?></td>
		<td><?php echo $row[8]; ?></td>
		<td><?php echo $row[7]; ?></td>
		<td><audio id='audio_1' controls style="width: 220px;" >
									<source src='audios/<?php echo $row['file'];?>' type="audio/mpeg" />
								</audio> </td>
		<td><img src="images/<?php echo $row['image']; ?>" style="max-width: 100px;"><td>
		<td><a class="btn btn-warning" href="content_song.php?quanly=edit_song&id=<?php echo $row['id']; ?>">Update</a>
			<a  class ="btn btn-danger" onclick="return window.confirm('Do you want to delete this song?');" href="content_song.php?quanly=delete_song&id=<?php echo $row['id']?>">Delete</a>
		</td>
	</tr>
<?php } ?>
	
</table>
<br>
<form action="admin.php" method = POST>
	<input type="submit" class="btn btn-primary" value="Back to Home">
</form>
</div>
</div>

<?php
 include 'footer.php';
?>




<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>