<?php
ob_start();
session_start();
include '../config.php';
include '../auth.php';
if (isset($_POST['sbm'])) {
  $oldpass = $_POST['opwd'];
  $newpass = $_POST['npwd'];
  $cpass = $_POST['cpwd'];

  $query = "select * from admin where id='$id' and username='$username'" or die(mysqli_error($con));
  $result = mysqli_query($con,$query);
  $out = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $row = mysqli_num_rows($result);
  if ($row>0 && $oldpass == $out['password']) {
    if ($newpass == $cpass) {
      mysqli_query($con,"update admin set password='$newpass' where id='$id'") or die(mysqli_error($con));
      header("location: data.php");
      $id = $_SESSION['id'];
$username = $_SESSION['username'];
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
	<title> Admin </title>
  <?php include '../headfiles.php'; ?>
  <style type="text/css">
    body {padding:0; margin:0; height:100%;}
  </style>
</head>
<body>
  <?php include 'header.php'; ?>
    <div class="container" style="margin-top: 120px;">
    <h2 class="col-md-8 offset-3"> Change Password </h2> <br><br>
      <div class="row">
        <div class="col-md-6 offset-3 col-sm-6 offset-3">
    	<form class="formm" method="post">
    <div class="form-group">
      <label for="pwd">Old Password:</label>
     <input type="password" required="" class="form-control" id="opwd" placeholder="Enter Old password" name="opwd">
    </div>
    <div class="form-group">
      <label for="pwd">New Password:</label>
      <input type="password" required="" class="form-control" id="npwd" placeholder="Enter New password" name="npwd">
    </div>
    <div class="form-group">
      <label for="cpwd">Confirm Password:</label>
    <input type="password" required="" class="form-control" id="cpwd" placeholder="Enter Confirm password" name="cpwd">
    </div>
    <input name="sbm" type="submit" class="btn btn-primary" value="submit" id="submit">
    	</form>
    </div>
  </div>
</div>
</body>
</html>