<?php
ob_start();
session_start();
include 'config.php';
include 'auth.php';
$id = $_SESSION['id'];
if (isset($_POST['sbm'])) {
  $oldpass = $_POST['opwd'];
  $newpass = $_POST['npwd'];
  $cpass = $_POST['cpwd'];

  $query = "select * from user where id='$id'" or die(mysqli_error($con));
  $result = mysqli_query($con,$query);
  $out = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $row = mysqli_num_rows($result);
  if ($row>0 && $oldpass == $out['password']) {
    if ($newpass == $cpass) {
      mysqli_query($con,"update user set password='$newpass' where id='$id'") or die(mysqli_error($con));
      header("location: index.php");
     }
    else{
    echo '<center><div class="alert alert-danger" style="width: 52.3%; margin-top: 5%;"><strong>Oops!</strong>New Password & Confirm Password Does Not Match.</div></center>';
      }
    }
   else{
    echo '<center><div class="alert alert-danger" style="width: 52.3%; margin-top: 5%;"><strong>Oops!Old Password Does Not Match.</div></center>';
   }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title> Service Joy - Change Password </title>
  <?php include 'headfiles.php'; ?>
  <style type="text/css">
    body {padding:0; margin:0; height:100%;}
  </style>
</head>
<body style="background-image: url(img/wall1.jpg);background-repeat: no-repeat;background-size: cover;">
  <?php include 'navbar.php'; ?>
    <div class="container col-md-6" style="margin-top: 100px; margin-bottom: 80px;">
    <h2 class="text-primary" style="font-size: 50px;"> Change Password </h2> <br><br>
    	<form class="formm" method="post">
    <div class="form-group">
      <b><label for="pwd">Old Password:</label></b>
      <input type="password" required="" class="form-control" id="opwd" placeholder="Enter Old password"
        name="opwd"> 
    </div>
    <div class="form-group">
      <b><label for="pwd">New Password:</label></b>
      <input type="password" required="" class="form-control" id="npwd" placeholder="Enter New password"
        name="npwd"> 
    </div>
    <div class="form-group">
      <b><label for="cpwd">Confirm Password:</label></b>
    <input type="password" required="" class="form-control" id="cpwd" placeholder="Enter Confirm password"
      name="cpwd"> 
    </div>
    <input name="sbm" type="submit" class="btn btn-primary" name="submit" id="submit" value="submit"/>
    	</form>
    </div>

    <footer>
    <?php include 'footer.php'; ?>
    </footer>
</body>
</html>