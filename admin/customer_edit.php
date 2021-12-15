
<?php
session_start();
  include 'header.php';
	include "connect.php";
				$sql = "select * from users where id = '$_GET[id]' ";
					$result = mysqli_query($con,$sql);
					$row = mysqli_fetch_array($result);

			if(isset($_POST["process"]))
			{
        $fullname = mysqli_escape_string($con,$_POST["fullname"]);
        
        $email = mysqli_escape_string($con,$_POST["email"]);
        
        $phone = mysqli_escape_string($con,$_POST["phone"]);
        
        $username = mysqli_escape_string($con,$_POST["username"]);
        
        $password = mysqli_escape_string($con,$_POST["password"]); 
        $address = mysqli_escape_string($con,$_POST["address"]); 
        $admin = mysqli_escape_string($con,$_POST["role"]); 
        

        $sql = "update users set fullname='$fullname', email='$email',phone='$phone',username='$username', address ='$address', password='$password', role='$admin' where id ='$_GET[id]'";
        mysqli_query($con,$sql);
        echo "<script>alert('Update account successfully!')</script>";
        echo "<script>window.open(window.location.href,'_self')</script>";
            }

?>
<div class="container">
  <div><h2 style="color: blue; padding-top: 20px;">Edit Account</h2></div>
    <form action="" method="post" class="form-container" enctype="multipart/form-data">
        <table border="1px" ">
          <tr>
            <td>Fullname</td>
            <td><input type="text" name="fullname" value="<?php echo $row['fullname']; ?>"></td>
          </tr>
          <tr>
            <td>Email</td>

            <td><input type="tetx" name="email" value="<?php echo $row['email']; ?>"></td>
          </tr>
          <tr>
            <td>Phone</td>
            <td><input type="text" name="phone" value="<?php echo $row['phone']; ?>"></td>
          </tr>
          <tr>
            <td>Address</td>
            <td><input type="text" name="address" value="<?php echo $row['address']; ?>"></td>
          </tr>
          <tr>
            <td>Username</td>
            <td><input type="text" name="username" value="<?php echo $row['username']; ?>"></td>
          </tr>
          <tr>
            <td>Password</td>
            <td><input type="password" name="password" value="<?php echo $row['password']; ?>"></td>
          </tr>
          
                
        </table> <br>
        <p>Role:</p>
        <input type="radio" name="role" value="admin" id="admin">
        <label for="admin">Admin</label>
        <input type="radio" name="role" value="user" id="user">
        <label for="user">User</label>
         <br>
        <input type="submit"  class="btn btn-success" name="process" value="Update Account" > <hr>
        
      </form> 
      <form action="customer_manage.php" method="POST">
            <input type="submit" class="btn btn-primary" value="Back to User Management">
        </form>
    </div>
    
</div>

<?php
  include 'footer.php';
?>