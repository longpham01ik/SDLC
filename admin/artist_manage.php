<?php
		session_start();
		include 'header.php';
		include "connect.php";
		$sql = "select * from artists ";
		 if( isset($_GET['search']) ){
            $name = mysqli_real_escape_string($con, htmlspecialchars($_GET['search']));
            $sql = "select * from users where username ='$name' or fullname = '$name'";
		 }
		 $result = mysqli_query($con,$sql);


?>

<div class="container bg-light"
<div class="infor">

<table  border="1px solid black;" align="center" style="margin-top: 10px; text-align: center;" >
	<tr">
		<th width="50px;">ID</th>
		<th width="200px;">Full name</th>
		<th width="200px;">Email</th>
		<th width="100px;">DoB</th>


		<th width="100px;"><a class="btn btn-primary btn-block" href="#">Add</a></th>
	</tr>
<?php while ($row = mysqli_fetch_array($result)) {

?>
	<tr>
		<td><?php echo $row['id']; ?> </td>
		<td><?php echo $row['name']; ?></td>
		<td><?php echo $row['email']; ?> </td>
		<td><?php echo $row['dob']; ?></td>
        <td><a class="btn btn-warning" href="artist_content.php?function=artist_edit&id=<?php echo $row['id']; ?>">Update</a>
			<a  class ="btn btn-danger" onclick="return window.confirm('Do you want to delete this account?');" href="artist_content.php?function=artist_delete&id=<?php echo $row['id']?>">Delete</a>
		</td>
	

	</tr>
<?php } ?>
	
</table>
<br>
<form action="admin.php" method = POST>
	<input type="submit" class="btn btn-primary" value="Back to Home">
</form>
</div>
></div>

<?php
 include 'footer.php';
?>






<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
