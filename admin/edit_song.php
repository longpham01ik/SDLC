
<?php
session_start();
include 'connect.php';
include 'header.php';
include 'banner.php';
$edit_song=mysqli_query($con, "select * from songs where id= '$_GET[id]'");
$fetch_edit=mysqli_fetch_array($edit_song);
?>
<div class="container mt-3">
    <div class="form_box">

      <form action="" method="post" enctype="multipart/form-data">
      
      <table align="center" width="100%">
        
      <tr>
        <td colspan="7">
        <h2>Edit Song</h2>
        <div class="border_bottom"></div><!--/.border_bottom -->
        </td>
      </tr>
      
      <tr>
        <td><b>Song Title:</b></td>
        <td><input type="text" name="name" size="60" value="<?php echo $fetch_edit['name'];?>" required/></td>
      </tr>
      
      <tr>
        <td><b>Song Genre:</b></td>
        <td>
        <select name="genre_id">
        <option>Select genre</option>
        
        <?php 
        $get_genre ="select * from genre";
    
    $run_genre = mysqli_query($con, $get_genre);
    
    while($row_genre=mysqli_fetch_array($run_genre)){
        $genre_id = $row_genre['id'];
      
	  $genre_name = $row_genre['name'];
	  if($fetch_edit['id']==$genre_id){
		  echo "<option value='$fetch_edit[id]' selected>$genre_name</option>";
	  }
	  else{

		echo "<option value='$genre_id'>$genre_name</option>";
	  }
      
     
    }
        ?>
      </select>
        </td>
        
      </tr>
      
      <tr>
        <td><b>Song Artist:</b></td>
        <td>
        <select name="artist_id">
        <option>Select artist</option>
      <?php
        $get_artist = "select * from artists";
    
    $run_artist = mysqli_query($con, $get_artist);
    
   	 while($row_artist = mysqli_fetch_array($run_artist)){
          $artist_id = $row_artist['id'];
        
		$artist_name = $row_artist['name'];
		if($fetch_edit['id']== $artist_id){
			echo "<option value ='$fetch_edit[id]' selected>$artist_name</option>";
		}
		else{
			echo "<option value='$artist_id'>$artist_name</option>";
		}
        
        
    }
    
    ?>
      </select>
        </td>
        
      </tr>
    
        <tr>
      <td><b>Song Image: </b></td>
      <td>
		<input type="file" name="image"/>
		<div>
			<img src="images/<?php echo $fetch_edit['image']?>" alt="" width="100" height="100">
		</div>
	  </td>
	  
    </tr>
    <tr>
      <td><b>Song File: </b></td>
      <td><input type="file" name="sound" /></td>
    </tr>
    <tr>
        <td valign="top"><b>Song Price:</b></td>
        <td><input type="text" name="price" value="<?php echo $fetch_edit['price'];?>"></td>
    </tr>
    
    <tr>
        <td></td>
        <td colspan="7"><input  class ="btn btn-success"type="submit" name="insert_post" value="Save"/></td>
    </tr>
      </table>
      
      </form>
      <form action="song_manage.php">
        <input type="submit" class= "btn btn-primary" value = "Back To Home">
      </form>
  </div><!-- /.form_box -->

</div>

<?php 

if(isset($_POST['insert_post'])){
$name = $_POST['name'];
$genre = $_POST['genre_id'];
$artist = $_POST['artist_id'];
$price = $_POST['price'];



// Getting the image from the field
$image  = $_FILES['image']['name'];
$image_tmp = $_FILES['image']['tmp_name'];
 $file  = $_FILES['sound']['name'];
$file_tmp = $_FILES['sound']['tmp_name'];


move_uploaded_file($image_tmp,"images/$image");
move_uploaded_file($file_tmp,"images/$file");

$update_query = "update  songs set name='$name', genre_id='$genre', artist_id='$artist', image='$image', file='$file',price='$price' where id = '$_GET[id]'";

$update_song = mysqli_query($con, $update_query);

if($update_song){
 echo "<script>alert('Song Has Been Edited successfully!')</script>";
 echo "<script>window.open(window.location.href,'_self')</script>";

//echo "<script>window.open('index.php?insert_product','_self')</script>";
}

}
?>

<?php
  include 'footer.php';
?>












<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>