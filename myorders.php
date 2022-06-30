<?php
ob_start();
session_start();
include 'config.php';
include 'auth.php';
$custid =  $_SESSION['id'];

$query = "select * from orders where custid = '$custid'";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
?>

<?php
 if (!empty($_GET['orderid'])) {
    mysqli_query($con,"delete from orders where id='".$_GET['orderid']."'") or die();
   header("location: myorders.php");

   $message = "Helllo ".$name. "\n\n". "Your Order For " .$_SESSION['ser']." "."Sevice Under Order Id Is :- ".$_GET['orderid']."."." " ."Thank You For Using Service Joy." . "\n\n". "Thank You". "\n". "Service Joy";

    $headers  = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";
    $headers = "From:" . $from;

    $subject = $_SESSION['ser']." "."Service Cancellation";

    mail($to,$subject,$message,$headers);
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
        <th>Order No.</th>
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
         while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) { ?>
        <td> <?php echo $row['id']; ?> </td>
        <td> <?php echo $row['service']; ?> </td>
        <td> <?php echo $row['time']; ?> </td>
        <td> <?php echo $row['address']; ?> </td>
        <td> <?php echo $row['pincode']; ?> </td>
        <td>
          <p name="edit" class="btn btn-primary"> Confirmed </p>
        </td>
        <td>
          <a name="delete" name="sbm" class="btn btn-danger" href="myorders.php?orderid=<?php echo $row['id']; ?>" >Cancel</a>
        </td>
      </tr>
      <?php  } ?>
    </tbody>
  </table>

</div>

<footer>
<?php include 'footer.php'; ?>
</footer>
</body>
</html>