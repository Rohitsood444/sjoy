<?php
ob_start();
session_start();
include '../config.php';
include '../auth.php';
$id = $_GET['edit_id'];
$query = "select * from data where id='".$_GET['edit_id']."'" or die(mysqli_error($con));
$result = mysqli_query($con,$query);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
?>

<?php
if (isset($_POST['sbm'])) {
  $id = $_GET['edit_id'];
  $fname = $_FILES['image']['name'];
  $ftemp = $_FILES['image']['tmp_name'];
  if(move_uploaded_file($ftemp, "../img/$fname")){
  $name = $_POST['name'];
  $description = $_POST['description'];
  $price = $_POST['price'];

  $query = "update data set name='$name', description='$description', image='$fname' ,price='$price' where id='$id'";
  $result = mysqli_query($con,$query)  or die(mysqli_error($con));
  header("location: data.php");
}
  else{
  $id = $_GET['edit_id'];
  $title = $_POST['name'];
  $description = $_POST['description'];
  $price = $_POST['price'];

  $query = "update data set name='$title', description='$description', price='$price' where id='$id'" or die(mysqli_error($con));

  $result = mysqli_query($con,$query);
  header("location: data.php");
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
    </style>
</head>
<body>
<?php include 'header.php'; ?>
<div class="container col-md-6" style="margin-top: 100px;">
  <form method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" class="form-control" id="title" placeholder="Enter Title" name="name"
      value="<?php echo $row['name'] ?>">
    </div>
    <div class="form-group">
      Description: <textarea class="form-control" id="description" name="description" rows="4" cols="67"> <?php echo $row['description'] ?>
      </textarea>
    </div>
    <div class="form-group">
      <label for="image">Choose Image:</label>
      <img src="../img/<?php echo $row['image']; ?>" width='70px' height='50px' />
      <input type="file" name="image" class="form-control" id="image">
    </div>
    <div class="form-group">
      <label for="price">Price:</label>
      <input type="number" class="form-control" id="price" placeholder="Enter Price" name="price" required=""
      value="<?php echo $row['price'] ?>">
    </div>
    <input name="sbm" type="submit" class="btn btn-primary" value="Submit"/>
  </form>
    </div>
</div>
</body>
</html>