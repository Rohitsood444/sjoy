<?php
ob_start();
session_start();
include '../config.php';
include '../auth.php';
$query = "select * from data" or die(mysqli_error($con));
$result = mysqli_query($con,$query);
?>

<!-- deleting data -->
<?php
 if (!empty($_GET['del_id'])) {
    mysqli_query($con,"delete from data where id='".$_GET['del_id']."'") or die();
   header("location: data.php");
 }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Data</title>
    <?php include '../headfiles.php'; ?>
    <style type="text/css">
      th,td{max-width: 150px;}
      td{word-wrap: break-word;}
    </style>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<?php include "header.php"; ?>
<div class="container" style="margin-top: 100px;">
  <table class="table table-striped table-bordered table-hover">
    <thead class="thead-dark">
      <tr>
        <th>S.No</th>
        <th>Title</th>
        <th>Description</th>
        <th>Image</th>
        <th>Price</th>
        <th> <center> Action </center> </th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <?php 
         $i =1;
         while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) { ?>
        <td> <?php echo $i ?> </td>
        <td> <?php echo $row['name'] ?> </td>
        <td> <?php echo $row['description'] ?> </td>
        <td> <img style="width: 200px; height: 130px;" src="../img/<?php echo $row['image']; ?>"> </td>
        <td> <?php echo $row['price']; ?> </td>
        <td>
          <a name="edit" class="btn btn-primary" href="edit.php?edit_id=<?php echo $row['id']; ?>">Edit</a> |
          <a name="delete" class="btn btn-danger" href="data.php?del_id=<?php echo $row['id']; ?>" >Delete</a>
        </td>
      </tr>
      <?php $i++; } ?>
    </tbody>
  </table>
</div>
</body>
</html>