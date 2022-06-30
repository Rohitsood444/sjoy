 <?php
include 'config.php';
ob_start();
session_start();
if (isset($_POST['sbm'])) {
  
   $email = $_POST['email'];
   $password = $_POST['password'];
$sql = "select * from user where email='$email' and password='$password'" or die(mysqli_error($con));
  $query = mysqli_query($con,$sql);
$row = mysqli_num_rows($query);
  if ($row == 1) {
  $result = mysqli_fetch_array($query, MYSQLI_ASSOC);
   $_SESSION['id'] = $result['id'];
   $_SESSION['name'] = $result['name'];
   $_SESSION['emai'] = $result['email'];
   header("location: index.php");
   }
   else{
    echo '<center><div class="alert alert-danger" style="width: 52.3%; margin-top: 5%;"><strong>Oops!</strong> Wrong Login Credentials.</div></center>';
   }
}
?>


<!DOCTYPE html> 
<html lang="en">
<head>
  <title>Service Joy - Login</title> 
<?php include 'headfiles.php'; ?>
  <style type="text/css">
body {padding:0; margin:0; height:100%;}
  </style>
</head>
<body style="background-image: url(img/wall1.jpg);background-repeat: no-repeat;background-size: cover;">
<?php include 'navbar.php'; ?>
<div class="container col-md-6" style="margin-top: 80px; margin-bottom: 80px;">
  <h2 class="text-primary" style="font-size: 50px;">Login</h2> <br><br>
  <form id="frm" method="post">
    <div class="form-group">
      <label for="email"> <b> Email: </b></label>
      <input type="email" required="true" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="pwd"> <b> Password: </b></label>
      <input type="password" required="true" class="form-control" id="pwd" placeholder="Enter password" name="password">
    </div>

    <button type="submit" name="sbm" id="submit" class="btn btn-primary">Submit</button>
    <a href="signup.php" class="btn btn-primary">SignUp</a>
  </form>
</div>

<footer>
<?php include 'footer.php'; ?>
</footer>
</body>
</html>