<?php
if (isset($_POST['sbm'])) {
  $id = $_POST['orderid'];
  $query = "delete from orders where id='$id'";
  $result = mysqli_query($con,$query)  or die(mysqli_error($con));
  header("location: myorders.php"); 
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Service Joy - India's No. 1 Home Services Provider</title>
  <style type="text/css">
  	body {padding:0; margin:0; height:100%;}
  </style>
<?php include 'headfiles.php'; ?>
</head>
<body style="background-image: url(img/wall1.jpg);background-repeat: no-repeat;background-size: cover;">
<?php include 'navbar.php'; ?>

<div class="container" style="margin-top: 150px; margin-bottom: 120px;">
<h3 class="text-danger" style="font-size: 50px;">My Orders</h3><br><br>

<table class="table table-striped table-bordered table-hover">
    <thead class="thead-dark">
      <tr>
        <th>S.No</th>
        <th>Service</th>
        <th>Timing</th>
        <th>Address</th>
        <th>Pincode</th>
        <th> <center> Status </center> </th>
        <th> <center> Action </center> </th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <?php 
         $i =1;
         while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) { ?>
        <td> <?php echo $i ?> </td>
        <td> <?php echo $row['service'] ?> </td>
        <td> <?php echo $row['time'] ?> </td>
        <td> <?php echo $row['address']; ?> </td>
        <td> <?php echo $row['pincode']; ?> </td>
        <td>
          <p name="edit" class="btn btn-primary"> Confirmed </p>
        </td>
        <td>
          <!-- <a name="delete" name="sbm" class="btn btn-danger" href="myorders.php?orderid=<?php echo $row['id']; ?>" >Cancel</a> -->
        </td>
      </tr>
      <?php $i++; } ?>
    </tbody>
  </table>

</div>

<footer>
<?php include 'footer.php'; ?>
</footer>
</body>
</html>