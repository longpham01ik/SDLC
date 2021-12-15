<?php

		include "admin/connect.php";
	 	
         if( isset($_GET['text']) ){
            
            $name = $con -> real_escape_string($_GET['text']);
         
            $sql = "SELECT  songs.id, songs.name, songs.image, songs.price, songs.file,artists.name FROM songs INNER JOIN artists ON songs.artist_id = artists.id WHERE songs.name LIKE '%$name%' or artists.name LIKE '%$name%'";
		 }
		 else{
			$sql = "SELECT  songs.id, songs.name, songs.image, songs.price, songs.file,artists.name FROM songs INNER JOIN artists ON songs.artist_id = artists.id ";
		 }
	 	$result = $con->query($sql);



?>

<!-- list product -->


<div class="container">
    <?php 
	
if(isset($_SESSION['message'])){
    ?>
    <script>
    alert('<?php echo $_SESSION['message'] ?>')
    </script>
    <?php
    unset($_SESSION['message']);
}	?>
    <div class="row mt-4">
        <h2 class="list-product-title">MV Hot</h2>
        <div class="list-product-subtitle">
            <p>All the hottest Songs today</p>
        </div>
        <div class="product-group">
            <div class="row">
                <?php
					while($row = mysqli_fetch_array($result))
					{
					?>
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="card card-product mb-3">
                        <form class="form-songs" action="" method="post">
                            <img class="card-img-top" name="image" src="images/<?php  echo $row['image'];?>">
                            <div class="card-body">
                                <h5 class="card-title" name="title"><?php echo $row[1];?></h5>
                                <p class="card-text" name="artist_name">Artist: <?php  echo $row[5];?></p>
                                <p class="card-price" name="price">Price: $<?php echo $row['price'];?></p>
                                <audio <?php if(!isset($_SESSION['checkout'])){?> ontimeupdate="myAudio(this)" controlsList="nodownload"  <?php }?>name="file"
                                    id='audio<?php echo $row['id'];?>' controls style="width: 220px;" type="audio/mpeg">
                                    <source src='audios/<?php echo $row['file'];?>' />
                                </audio>

                            </div>
                            <span class="pull-right" style="background-color: navy;
							color: white;
							margin-right: 20px;  border-radius:5px"> <span class="glyphicon glyphicon-plus"></span><a
                                    href="addtocart.php?id=<?php echo $row['id']; ?>"
                                    style="color:white;font-size:16px; text-decoration:none" href="">Add to Cart</a></span>
                        </form>

                    </div>
                </div>
                <?php  } ?>
            </div>
        </div>
    </div>



</div>
<!-- end list product -->

<script type="text/javascript">
function myAudio(event) {
    if (event.currentTime > 25) {   
        event.currentTime = 0;
        event.pause();
        alert("Purchase to listen full songs")
    }
}
</script>


</script>