<?php 
include 'config.php';
ob_start();
session_start();
include 'auth.php';

$sid = $_GET['id'];
$query = "select * from data where id='$sid'" or die(mysqli_error($con));
$result = mysqli_query($con,$query);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);


$timing = $mobile = $name = $pincode = $city = $state = $address = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $timing = test_input($_POST["timing"]);
    $mobile = test_input($_POST["mobile"]);
    $name = test_input($_POST["name"]);
    $pincode = test_input($_POST["pincode"]);
    $city = test_input($_POST["city"]);
    $state = test_input($_POST["state"]);
    $address = test_input($_POST["address"]);
  }
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>

<?php 

if (isset($_POST['submit'])) {

$timing = $_POST["timing"];
$mobile = $_POST["mobile"];
$name = $_POST["name"];
$_SESSION['nm'] = $_POST["name"];
$pincode = $_POST["pincode"];
$city = $_POST["city"];
$state = $_POST["state"];
$address = $_POST["address"];
$service = $_POST['service'];
$_SESSION['ser'] = $_POST['service'];
$emai = $_SESSION['emai'];
$custid = $_SESSION['id'];
$queryy = "insert into orders (service, pname, mobile, pincode, city, state, address, time, custid) values('$service', '$name', '$mobile', '$pincode', '$city', '$state', '$address', '$timing', '$custid')";
mysqli_query($con,$queryy) or die(mysqli_error($con));

$_SESSION['last_id'] = mysqli_insert_id($con);
$oid = $_SESSION['last_id'];
    header("location: order.php");


$sql = "select * from serviceman where service = '$service'";
$query1 = mysqli_query($con,$sql) or die(mysqli_error($con));
$row = mysqli_fetch_array($query1, MYSQLI_ASSOC);
$sername = $row['name'];
$mobile = $row['contact'];

    $to = $_SESSION['emai'];
    $from = "order@servicejoy.tk";
    $name = $_POST['name'];

    $message = "Helllo ".$name. "\n\n". "Your Order For " .$_SESSION['ser']." "."Sevice Booking Is Confirmed. Your Order Id Is :- ". $_SESSION['last_id']."."." " ."Thank You For Using Service Joy. You Can Find The Details Of Your Service Agent Below :-". "\n\n". "Person Name :- ". $sername. "\n". "Contact :- ". $mobile. "\n\n". "Thank You". "\n". "Service Joy";

    $headers  = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";
    $headers = "From:" . $from;

    $subject = $_SESSION['ser']." "."Service Booking Confirmation";

    mail($to,$subject,$message,$headers);
  }
?>


<!DOCTYPE html> 
<html lang="en">
<head>
  <title>Service Joy - India's No. 1 Home Services Provider</title>
  <style type="text/css">
    body {padding:0; margin:0; height:100%;}
    label{font-size: 20px;}
  </style>
<?php include 'headfiles.php'; ?>
</head>
<body style="background-image: url(img/wall1.jpg);background-repeat: no-repeat;background-size: cover;">
<?php include 'navbar.php'; ?>
<div class="container" style="margin-top: 120px; margin-bottom: 5%;">

<form id="frm" name="myForm" method="post">
<center><h3 class="col-md-8 text-info" style="font-size: 40px;"> <?php echo $row['name']; ?> </h3></center> <br><br>
<center><marquee>  </marquee></center>
<input type="hidden" name="service" value="<?php echo $row['name'];  ?>" >

<div class="row">
<div class="col-md-6">  
    <div class="form-group">
      <label for="timing"> <b> Select Timing For Service: </b></label>
      <select required autofocus="" class="form-control" name="timing">
        <option value="09:00AM-12:00PM">09:00 AM - 12:00 PM</option>
        <option value="12:00PM-03:00PM">12:00 PM - 03:00 PM</option>
        <option value="03:00PM-06:00PM">03:00 PM - 06:00 PM</option>
        <option value="06:00PM-09:00PM">06:00 PM - 09:00 PM</option>
      </select>
    </div>
</div>
<div class="col-md-6">  
    <div class="form-group">
      <label for="mobile"> <b> Mobile Number: </b></label>
      <input type="number" class="form-control" id="mobile" placeholder="Enter Mobile Number" name="mobile" required="" 
      >
    </div>
</div>
</div>

<div class="row">
<div class="col-md-6">  
    <div class="form-group">
      <label for="name"> <b> Name: </b></label>
      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" required="" 
      >
    </div>
</div>
<div class="col-md-6">  
    <div class="form-group">
      <label for="pincode"> <b> Pincode: </b></label>
      <input type="number" class="form-control" id="pincode" placeholder="Enter Pincode" name="pincode" required="" 
      >
    </div>
</div>
</div>

<div class="row">
<div class="col-md-6">  
    <div class="form-group">
      <label for="city"> <b> City: </b></label>
      <input type="text" class="form-control" id="city" placeholder="Enter City" name="city" required="" 
      >
    </div>
</div>
<div class="col-md-6">  
    <div class="form-group">
      <label for="state"> <b> State: </b></label>
      <input type="text" class="form-control" id="state" placeholder="Enter State" name="state" required="" 
      >
    </div>
</div>
</div>

<div class="row">
<div class="col-md-12">  
    <div class="form-group">
      <label for="address"> <b> Address: </b></label>
      <textarea class="form-control" name="address" rows="5" required="" style="resize: none; padding-right: 0px; padding-left: 0px;"> </textarea>
    </div>
</div>
</div>
    <button class="btn btn-primary" name="submit" id="submit" onclick="validateForm()">Proceed To Payment</button>
  </form>
</div>
<br><br>
<footer>
<?php include 'footer.php'; ?>
</footer>

<script type="text/javascript">
  function validateForm() {
  var x = document.forms["myForm"]["timing"].value;
  if (x == "") {
    alert("Timing must be filled out");
    return false;
  }

  var y = document.forms["myForm"]["mobile"].value;
  if (y == "") {
    alert("Mobile Number must be filled out");
    return false;
  }

  var z = document.forms["myForm"]["name"].value;
  if (z == "") {
    alert("Name must be filled out");
    return false;
  }

  var a = document.forms["myForm"]["pincode"].value;
  if (a == "") {
    alert("Pincode must be filled out");
    return false;
  }

  var b = document.forms["myForm"]["city"].value;
  if (b == "") {
    alert("City must be filled out");
    return false;
  }

  var c = document.forms["myForm"]["states"].value;
  if (c == "") {
    alert("State must be filled out");
    return false;
  }

  var d = document.forms["myForm"]["address"].value;
  if (d == "") {
    alert("Address must be filled out");
    return false;
  }
}
</script>
</body>
</html>