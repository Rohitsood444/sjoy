<?php 
ob_start();
session_start();
include 'config.php';
?>

<!DOCTYPE html> 
<html lang="en">
<head>
  <title>Service Joy - India's No. 1 Home Services Provider</title>
<?php include 'headfiles.php'; ?>
<style type="text/css">
body {padding:0; margin:0; height:100%; background-color: #f4f8ff;}
a:hover{
  text-decoration: none;
}

 .carousel-inner img {
      width: 100%;
      height: 550px;
  }
  @media screen and (max-width: 767px) {
.aa {height: 220px !important;}
.bb {font-size: 40px !important;}
.cc {font-size: 30px !important;}
}
</style>
</head>
<body>

<?php include 'navbar.php'; ?>
<?php include 'carousel.php'; ?>

<div class="container">
  <h3 class="display-1 text-white text-center text-danger bb">Service Joy</h3> <br>
  <h3 class="display-5 text-white text-center text-primary cc">Online Home Services Provider</h3> <br> <br>

  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-12">

<?php
$query = "select * from data LIMIT 5" or die(mysqli_error($con));
$result = mysqli_query($con,$query);
while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
?>

  <center>

   <a href="address.php?id=<?php echo $row['id'];  ?>">
      <img src="img/<?php echo $row['image'] ?>" class="img-thumbnail img-responsive" style="height: 200px; width: 300px;"> <br> 
    <caption> <?php echo $row['name']. "<br><br><br><br>"; } ?> </caption> </a>

  </center>
    </div>

    <div class="col md-6">
      <?php
$queryy = "select * from data ORDER BY id DESC LIMIT 5" or die(mysqli_error($con));
$resultt = mysqli_query($con,$queryy);
while ($roww = mysqli_fetch_array($resultt,MYSQLI_ASSOC)){
?>
    <center> 
      <a href="address.php?id=<?php echo $roww['id'];  ?>">
      <img src="img/<?php echo $roww['image'] ?>" class="img-thumbnail img-responsive"
      style="height: 200px; width: 300px;"> <br> </center>
    <center> <caption> <?php echo $roww['name']. "<br><br><br><br>"; } ?> </caption> </center> </center>
    </div>

  </div>
</div>  

<footer>
<?php include 'footer.php'; ?> 
</footer>
</body>
</html>