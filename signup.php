<?php
include 'config.php';
if(isset($_POST['sbm'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    if(mysqli_query($con , "insert into user(name ,email ,password) values ('$name','$email','$password')")){
     $message = "yes";
     header("location: login.php");
    }else {
      $error ="yes";
    }
} 
?>

<!DOCTYPE html> 
<html lang="en">
<head>
  <title>B4U - Signup</title>
<?php include 'headfiles.php'; ?>
  <style type="text/css">
    body {padding:0; margin:0; height:100%;}
  </style>
</head>
<body style="background-image: url(img/wall1.jpg);background-repeat: no-repeat;background-size: cover;">
<?php include 'navbar.php'; ?>
<div class="container col-md-6" style="margin-top: 100px; margin-bottom: 80px;">
  <h2 class="text-primary" style="font-size: 50px;">Signup</h2> <br><br>

  <div class="offset-lg-3 col-lg-6">
      <?php if(!empty($message)){?>
       <br><br>
      <div class="alert alert-success">
  <strong>Success!</strong> you are registered !!!.
</div>
<?php } else if (!empty($error)){ ?>
 <br><br>
<div class="alert alert-danger">
  <strong>Error !</strong> something went wrong .
</div>

<?php }?>
</div>

  <form id="frm" method="post">
    <div class="form-group">
      <label for="name"> <b> Name: </b></label>
     <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" required="true">
    </div>

    <div class="form-group">
      <label for="email"> <b> Email: </b></label>
     <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required="true">
    </div>

    <div class="form-group">
      <label for="pwd"> <b> Password: </b></label>
     <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required="true">
    </div>
<br>
    <button type="submit" class="btn btn-primary" name="sbm" id="submit">Submit</button>
    <a href="login.php" class="btn btn-primary">Login</a>
  </form>
</div>

<footer>
<?php include 'footer.php'; ?>
</footer>
</body>
</html>