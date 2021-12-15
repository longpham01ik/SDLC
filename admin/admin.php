<?php
session_start();
include 'header.php';
include 'banner.php';
?>

<div class="container">
   <div class="jumbotron">
      <div class="card">
         <h2>Admin area <span class="fas fa-user"></span></h2>

         <h3>Choose function</h3>
      </div>
      <div class="card">
        <form action="song_manage.php" method="POST">
        <input type="submit" class="btn btn-primary btn-block" value="Song management"> <br>
        </form> <br>
        <form action="customer_manage.php" method="POST">
        <input type="submit" class="btn btn-primary btn-block" value="User management"> <br>
        </form> <br>
        <form action="artist_manage.php" method="POST">
        <input type="submit" class="btn btn-primary btn-block" value="Artist management"> <br>
        </form> <br>
      </div>
      <div class="card">
         <div class="card-body">
         </div>
      </div>
   </div>
</div>

 <?php
include 'footer.php';
?>