<?php
include 'config.php';
session_start();
ob_start();
include 'auth.php';
?>

<!DOCTYPE html> 
<html lang="en">
<head>
  <title>B4U - Contact Us</title>
  <style type="text/css">
  	body {padding:0; margin:0; height:100%;}
  </style>
<?php include 'headfiles.php'; ?>
</head>
<body style="background-image: url(img/wall1.jpg); background-repeat: no-repeat; background-size: cover;">
<?php include 'navbar.php'; ?>
<div class="container" style="margin-top: 10%; margin-bottom: 100px;">
  <center> <h2 class="text-dark" style="font-size: 50px;">  About Us  </h2> </center>
<br><br>
  <center>
  <div class="jumbotron">
    <p class="text-dark">
   Service Joy Is The India's No. 1 Trusted Home Services provider. We Provide Quality Services At Very Reasonable & Competitive Prices. Our Head Office Is In Ludhiana. We Provide All Kinds Of Home Services :- Construction, Home Cleaning, Painting, Beauty, Appliance Repairs, Pest Control, Plumbing, Electrical, Carpentry services. Our Customer Support Service Is Available 24*7 Days.
    </p>
  </div>
  </center>
</div>
<br><br><br>
<footer>
<?php include 'footer.php'; ?>
</footer>
</body>
</html>