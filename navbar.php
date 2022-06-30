<nav class="navbar navbar-expand-lg bg-dark navbar-dark static-top"> 
  <a class="navbar-brand" href="index.php">Service Joy</a>
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
   </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-white" href="contact.php">Contact Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="about.php">About Us</a>
      </li>
    </ul>

<div class="collapse navbar-collapse flex-row-reverse" id="collapsibleNavbar">
 <?php if (isset($_SESSION['id'])) { 
      ?>

  

<div class="dropdown">
    <button style="height: 40px; vertical-align: top;" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
    <?php  echo "<a class='btn' style='color: white'> Welcome ".$_SESSION['name']." </a>"; ?> 
    </button>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="chngpass.php">Change Password</a>
      <a class="dropdown-item" href="myorders.php">My Orders</a>
      <a class="dropdown-item" href="logout.php">Logout</a>
    </div>
  </div>

  <?php }

 else { ?>

<a href="login.php" class="btn btn-primary text-white">Login</a> &nbsp;
<a href="signup.php" class="btn btn-primary text-white">SignUp</a>
<?php } ?>
</div>

</div>
</nav>