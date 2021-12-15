<?php
session_start();
 include 'admin/connect.php';
 include 'header.php';
?>

<div class="container">
    <div id="shopping_cart" align="left">
        <?php 
	    if(isset($_SESSION['login'])){
		
          echo "<b>Customer: </b> " . $_SESSION['login'];
          echo "<hr>";
		
		}else{
		
			echo "<b>Customer: Guest</b> ";
		}
	  ?>

    </div>
    <h3>Cart detail</h3>

    <form action="">
        <table class="table table-bordered table-striped">
            <thead>
                <th></th>
                <th>Name</th>
                <th>Artist</th>
                <th>Sample</th>
                <th>Image</th>
                <th>Price</th>

            </thead>
            <tbody>
                <?php
						//initialize total
						$total = 0;
						if(!empty($_SESSION['cart'])){
						//connection
						$conn = new mysqli('localhost', 'root', '', 'music');
							
						$sql = " SELECT  songs.id, songs.name, songs.image, songs.price, songs.file,artists.name FROM songs INNER JOIN artists ON songs.artist_id = artists.id WHERE songs.id IN (".implode(',',$_SESSION['cart']).")";
						$query = $conn->query($sql);
							while($row = $query->fetch_array()) {
								?>
                <tr>
                    <td>
                        <a href="delete_item.php?id=<?php echo $row[0]; ?>" class="btn btn-danger btn-sm"><span
                                class="glyphicon glyphicon-trash"></span></a>
                    </td>
                    <td><?php echo $row[1]; ?> </td>
                    <td><?php echo $row[5]; ?> </td>
                    <td>
                        <audio <?php if(!isset($_SESSION['checkout'])){?> ontimeupdate="myAudio(this)" controlsList="nodownload"  <?php }?> id='audio<?php echo $row[0]; ?>' controls style="width: 220px;"
                            type="audios/mpeg">
                            <source src='audios/<?php echo $row[4];?>' />
                        </audio>
                    </td>
                    <td><img src="images/<?php echo $row[2]; ?>" style="max-width: 100px;"></td>
                    <td> $<?php echo $row[3]?> </td>

                    <?php $total += $row['price']; ?>
                </tr>
                <?php
								
							}
						}
						else{
							?>
                <tr>
                    <td colspan="4" class="text-center">No Item in Cart</td>
                </tr>
                <?php
						}

					?>
                <tr>
                    <td colspan="5" align="right"><b>Total</b></td>
                    <td><b>$<?php echo number_format($total, 2); ?></b></td>
                </tr>
            </tbody>
        </table>
        <a href="index.php" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>

        <a href="delete_cart.php" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Clear Cart</a>
        <a href="checkout.php" id="check" 
        
            class="btn btn-success"><span class="glyphicon glyphicon-check"></span>
            Payment</a>
</div>
<?php 
	
  if(isset($_SESSION['message'])){
      ?>
<script>
alert('<?php echo $_SESSION['message'] ?>')
</script>
<?php
      unset($_SESSION['message']);
  }	?>
<?php

include 'footer.php';
?>

<script type="text/javascript">

function myAudio(event) {
    if (event.currentTime > 25) {   
        event.currentTime = 0;
        event.pause();
        alert("Purchase to listen full songs")
    }
}

</script>
