<?php
		session_start();
		include 'header.php';
		include "connect.php";
		$sql = "SELECT * from users";
		 if( isset($_GET['search']) ){
            $name = mysqli_real_escape_string($con, htmlspecialchars($_GET['search']));
            $sql = "SELECT * from users where username ='$name' or fullname = '$name'";
		 }
		 $result = mysqli_query($con,$sql);


?>

<div class="container bg-light">
    <div class="infor">
        <table border="1px solid black;" align="center" style="margin-top: 10px; text-align: center;">
            <tr">
                <th width="50px;">ID</th>
                <th width="200px;">Full name</th>
                <th width="200px;">Email</th>
                <th width="100px;">Phone</th>

                <th width="200px;">Address</th>

                <th width="200px;">Username</th>
                <th width="200px;">Password</th>
                <th width="200px;">Role</th>

                <th width="100px;"><a class="btn btn-primary btn-block"
                        href="content_customer.php?function=customer_add">Add</a></th>
                </tr>
                <?php while ($row = mysqli_fetch_array($result)) {

				?>
                <tr>
                    <td><?php echo $row['id']; ?> </td>
                    <td><?php echo $row['fullname']; ?></td>
                    <td><?php echo $row['email']; ?> </td>
                    <td><?php echo $row['phone']; ?></td>

                    <td><?php echo $row['address']; ?></td>

                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['password']; ?></td>
                    <td><?php echo $row['role'];?></td>
                    <td><a class="btn btn-warning"
                            href="content_customer.php?function=customer_edit&id=<?php echo $row['id']; ?>">Update</a>
                        <a class="btn btn-danger"  onclick="return window.confirm('Do you want to delete this account?');"
                            href="content_customer.php?function=customer_delete&id=<?php echo $row['id']?>">Delete</a>
                    </td>
                </tr>
                <?php } ?>

        </table>
        <br>
        <form action="admin.php" method=POST>
            <input type="submit" class="btn btn-primary" value="Back to Home">
        </form>
    </div>

</div>

<?php
 include 'footer.php';
?>


<script>
if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}
</script>