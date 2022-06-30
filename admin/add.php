<?php
ob_start();
session_start();
include '../config.php';
include '../auth.php';

if (isset($_POST['sbm'])) {
 
  $fname = $_FILES['image']['name'];
  $ftemp = $_FILES['image']['tmp_name'];
  if(move_uploaded_file($ftemp, "../img/$fname")){
  $name = $_POST['name'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $query = "insert into data (name, description, image, price) values('$name', '$description', '$fname', '$price')" or die(mysqli_error($con));

  $result = mysqli_query($con,$query);
  header("location: data.php");
  } 
  else{
    echo '<center><div class="alert alert-danger" style="width: 52.3%; margin-top: 5%;"><strong>Oops!</strong>Pls Upload Image</div></center>';
  }
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Data</title>
    <?php include '../headfiles.php'; ?>
    <style type="text/css">
      #description{resize: none;}
      body {padding:0; margin:0; height:100%;}
    </style>
</head>
<body>
<?php include 'header.php'; ?>
<div class="container" style="margin-top: 120px;">
  <div class="row">
  <div class="col-md-6 offset-3">
  <form method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" class="form-control" id="title" placeholder="Enter Title" name="name" required="">
    </div>
    <div class="form-group">
      <label for="description">Description:</label> 
      <textarea class="form-control" id="description" name="description" class="tex" rows="4" cols="67" required=""> 
      </textarea>
    </div>
    <div class="form-group">
      <label for="image">Choose Image:</label>
      <input type="file" class="form-control" id="image" name="image" required="">
    </div>
    <div class="form-group">
      <label for="size">Price:</label>
      <input type="text" class="form-control" id="price" placeholder="Enter Price" name="price">
    </div>
    <input name="sbm" type="submit" id="submit" class="btn btn-primary" value="Submit"/>
  </form>
    </div>
  </div>
  </div>
</div>
</body>
</html>