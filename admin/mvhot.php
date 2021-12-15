<?php
		include "connect.php";
	 	$sql = "SELECT songs.id, songs.name, songs.image, songs.price, songs.file,artists.name from songs inner join artists on songs.artist_id = artists.id";
         if( isset($_GET['search']) ){
            $name = mysqli_real_escape_string($con, htmlspecialchars($_GET['search']));
            $sql = "SELECT  songs.id, songs.name, songs.image, songs.price, songs.file,artists.name from songs inner join artists on  songs.artist_id = artists.id where songs.name like '%$name%' or artists.name like '%$name%' ";
         }
	 	$result = $con->query($sql);



?>

<!-- list product -->


<div class="container">
    <div class="row mt-4">
        <h2 class="list-product-title">MV Hot</h2>
        <div class="list-product-subtitle">
            <p>All the hottest MV today</p>
        </div>
        <div class="product-group">
            <div class="row">
                <?php
					while($row = mysqli_fetch_array($result))
				
					{
					?>
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="card card-product mb-3">
                        <img class="card-img-top" src="images/<?php  echo $row['image'];?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row[1];?></h5>
                            <p class="card-text">Artist: <?php  echo $row[5];?></p>
                            <p class="card-price">Price: $<?php echo $row['price'];?></p>
                            <audio id='<?php echo $row['id']?>' controls style="width: 220px;" autostart=0>

                                <source src='images/<?php echo $row['file'];?>' />
                            </audio>
                            <button class="btn btn-primary play" id="<?php echo $row['id'];?>"
                                onclick='btn(this)'>Listen</button>

                            <button class="btn btn-danger" style="float:right;"> Add to Cart</button>
                        </div>
                    </div>
                </div>
                <?php  } ?>
            </div>
        </div>
    </div>



</div>
<!-- end list product -->

<script>
function btn(x) {
    var btn = document.getElementById(x.id)
    var audio = document.getElementById(x.id)

    if (btn.innerText == "Listen") {
        btn.innerText = "Stop";
        audio.play();

    } else {
        btn.innerText = "Listen";
        audio.pause();

    }

}
</script>