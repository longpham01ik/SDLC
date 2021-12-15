
<?php
session_start();
  include 'header.php';
	include "connect.php";

			if(isset($_POST["process"]))
			{
        $fullname = $_POST['fullname'];        
        $email = $_POST['email'];        
        $phone = $_POST['phone'];        
        $username = $_POST['username'];        
        $password = $_POST['password'];        
        $address = $_POST['address'];        
        $admin = $_POST['role'];  
        

        $sql = "insert into users(fullname, email, phone, username, password, address, role) values ( '$fullname', '$email', '$phone', '$username', '$password', '$address', '$admin')";
        mysqli_query($con,$sql);
        echo "<script>alert('Add account successfully!')</script>";
        echo "<script>window.open(window.location.href,'_self')</script>";
            }

?>
<div class="container">
  <div><h2 style="color: blue; padding-top: 20px;">Add New User</h2></div>
    <form action="" method="POST" class="form-container" enctype="multipart/form-data">
        <table border="1px" ">
          <tr>
            <td>Fullname</td>
            <td><input type="text" name="fullname" </td>
          </tr>
          <tr>
            <td>Email</td>

            <td><input type="tetx" name="email" ></td>
          </tr>
          <tr>
            <td>Phone</td>
            <td><input type="text" name="phone" ></td>
          </tr>
          <tr>
            <td>Address</td>
            <td><input type="text" name="address" ></td>
          </tr>
          <tr>
            <td>Username</td>
            <td><input type="text" name="username" ></td>
          </tr>
          <tr>
            <td>Password</td>
            <td><input type="password" name="password" ></td>
          </tr>
          
                
        </table> <br>
        <p>Role:</p>
        <input type="radio" name="role" value="admin" id="admin">
        <label for="admin">Admin</label>
        <input type="radio" name="role" value="user" id="user">
        <label for="user">User</label>
         <br>
        <input type="submit"  class="btn btn-success" name="process" value="Add User" > <hr>
        
      </form> 
      <form action="customer_manage.php" method="POST">
            <input type="submit" class="btn btn-primary" value="Back to User Management">
        </form>
    </div>
    
</div>

<?php
  include 'footer.php';
?>