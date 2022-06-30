<?php 
include 'config.php';
ob_start();
session_start();
include 'auth.php';
?>
<!DOCTYPE html> 
<html lang="en">
<head>
  <title>Service Joy - India's No. 1 Home Services Provider</title>
<?php include 'headfiles.php'; ?>
<style type="text/css">
body {padding:0; margin:0; height:100%;}
</style>
</head>
<body style="background-image: url(img/wall1.jpg);background-repeat: no-repeat;background-size: cover;">
<?php include 'navbar.php'; ?> <br><br><br>

<div class="container" style="margin-top: 10px; margin-bottom: 50px;">
 <center> <img src="img/emoji.png" class="img-responsive img-fluid" style="width: 200px; height: 200px;"></center>

 <h3 class="text-primary text-center" style="font-size: 50px;"> <?php echo "Thank You ". $_SESSION['nm']; ?> </h3> <br>

   <h4 class="text-primary text-center" style="font-size: 40px;"> <?php echo "Your Service For ". $_SESSION['ser']. " Has Been Confirmed";  ?> </h4> <br>

   <h4 class="text-primary text-center" style="font-size: 40px;"> <?php echo "Your Order ID Is ". $_SESSION['last_id'];  ?> </h4> <br>

</div> 

<footer>
<?php include 'footer.php'; ?> 
</footer>
</body>
</html>