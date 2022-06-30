<?php 
include 'config.php';
session_start();
ob_start();
include 'auth.php';
if(isset($_POST['submit'])){
    $to = "rohitsood4445@gmail.com";
    $from = $_POST['email'];
    $name = $_POST['name'];
    $message = $name . " Wrote the following:" . "\n\n" . $_POST['message'];
    $message2 = "Here is a copy of your message To Service Joy" . $name . "\n\n" . $_POST['message'];

    $headers  = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";
    $headers = "From:" . $from;
    $headers2 = "From:" . $to;

    mail($to,"Service Joy Enquiry",$message,$headers);
    mail($from,"Service Joy Enquiry",$message2,$headers2); 
    echo '<div class="alert alert-danger" style="width: 52.3%; margin-top: 5%;">
    <strong>Mail Sent. Thank you </strong> we will contact you shortly.</div></center>';
  }
?>
<!DOCTYPE html> 
<html lang="en">
<head>
  <title>Service Joy - Contact Us</title>
<?php include 'headfiles.php'; ?>
  <style type="text/css">
    body {padding:0; margin:0; height:100%;}
  </style>
</head>
<body style="background-image: url(img/wall1.jpg);background-repeat: no-repeat;background-size: cover;">
<?php include 'navbar.php'; ?> 
<div class="container col-md-6" style="margin-top: 10%;">
   <h2 class="text-primary" style="font-size: 50px;">Contact Us</h2> 
  <form id="frm" method="post">
    <div class="form-group">
      <div class="form-group">
      <label for="email"> <b> Name: </b></label>
      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
      </div>
      <div class="form-group">
      <label for="email"> <b> Email: </b></label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
      </div>
      <div class="form-group">
      <label for="feedback"> <b> Message: </b></label> <br>
      <textarea rows="8" class="form-control" style="resize: none;" id="feedback" name="message"> </textarea>
      </div>
    </div>
    <button type="submit" class="btn btn-primary" id="submit" name="submit">Submit</button> <br><br><br>
  </form>
</div>

<footer>
<?php include 'footer.php'; ?>
</footer>
</body>
</html>