 <?php
include '../config.php';
ob_start();
session_start();
if (isset($_POST['sbm'])) {
  
   $username = $_POST['username'];
   $password = $_POST['password'];
$sql = "select * from admin where username='$username' and password='$password'" or die(mysqli_error($con));
  $query = mysqli_query($con,$sql);
$row = mysqli_num_rows($query);
  if ($row == 1) {
  $result = mysqli_fetch_array($query, MYSQLI_ASSOC);
   $_SESSION['id'] = $result['id'];
   $_SESSION['username'] = $result['username'];
   header("location: data.php");
   }
   else{
    echo '<center><div class="alert alert-danger" style="width: 52.3%; margin-top: 5%;"><strong>Oops!</strong> Wrong Login Credentials.</div></center>';
   }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title> Admin </title>
  <?php include '../headfiles.php'; ?>
</head>
<body>
<?php include 'header.php' ?>
    <div class="container" style="margin-top: 120px";>
    	<h2 class="col-md-8 offset-3"> Admin Section </h2><br><br>
    	<form class="form" method="post">
        <div class="row">
          <div class="col-md-6 offset-3">
    		<div class="form-group">
      <label for="username">Username:</label>
      <input type="text" required="" class="form-control" id="username" placeholder="Enter User Name" name="username">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" required="" class="form-control" id="password" placeholder="Enter password"
      name="password">
    </div>
    <div class="form-group form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Remember me
      </label>
    </div>
    <input name="sbm" type="submit" class="btn btn-primary" value="submit" />
    	
    </div>
  </div>
</form>
</body>
</html>