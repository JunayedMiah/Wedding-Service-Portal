<?php require_once("include/DB.php"); ?>
<?php require_once("include/function.php"); ?>
<?php require_once("include/session.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/uikit.min.css">
  <link rel="stylesheet" href="fontawesome/css/all.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="shortcut icon" type="image/x-icon" href="img/Wedding Couple.png">
  <title>Wedding Service</title>
</head>
<body>
  <!--NavBar-->
 <nav class="navbar navbar-dark navbar-expand-md " uk-sticky="top: 200; animation: uk-animation-slide-top; bottom: #sticky-on-scroll-up">
   <!--navbar-expand-md for horizontal nav on medium to upper --> <!--navbar-dark for text white -->
   <div class="container">
     <a href="index.html" class="navbar-brand">Wedding Service</a>
     <button class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#navbarnav">
       <!--navbar-toggler to bring toggler on small device -->
       <!--data-target="#nav1" to call an id nav1 form div below.... small device -->
       <span class="navbar-toggler-icon"></span>
       <!--navbar-toggler-icon to bring toggler icon on small device -->

     </button>
     <div id="navbarnav" class="collapse navbar-collapse">
       <!--collapse to remove home,... from nav.. small device fact -->
       <ul class="navbar-nav ml-auto"><!--navbar-nav to remove bulletpoint from nav -->
         <li class="nav-item ">    <!--active to make the home icon actv in nav-->
           <a class="nav-link" href="index.html">Home</a>
         </li>
         <li class="nav-item active">
           <a class="nav-link" href="Categories.html">Categories</a>
         </li>
         <li class="nav-item ">
           <a class="nav-link" href="About.html">About Us</a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="Contact.html">Contact</a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="login_UI.php">Account</a>
           </li>
           <li class="nav-item">
               <a class="nav-link" href="admin_login.php">Admin</a>
             </li>
       </ul>
     </div>
   </div>
</nav>

<!--Page Header-->
<section id="Community-Service-page-header" class="text-light text-center mb-5">
  <div class="container">
    <div class="row">
      <div class="col pt-5">
        <h2 class="text-light">Community Centers</h2>
        <p class="lead">Check Out Our Every Community Center</p>
      </div>
    </div>
  </div>
</section>

<!--PhP for fetching main section-->
<?php
global $connectingdb;
$sql = "SELECT *FROM client WHERE type='community'";
$stmt = $connectingdb->query($sql);
while($DataRows = $stmt->fetch()){
  $id = $DataRows["id"];
  $name = $DataRows["name"];
  $email = $DataRows["email"];
  $phone = $DataRows["phone"];
  $image = $DataRows["image"];

?>
<!--Main Section-->
<section class="comu py-2" id="center">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 my-4">
        <img src="upload/<?php echo $image; ?>" alt="Sorry" class="img-fluid rounded">
      </div>
      <div class="col-lg-6 text-center ">
        <h3><?php echo $name; ?></h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto, consequuntur.</p>
        <h4>Address</h4>
        <p>House #100, Uttara, Dhaka</p>
        <h4>Email</h4>
        <p><?php echo $email; ?></p>
        <h4>Phone</h4>
        <p><?php echo $phone;  ?></p>
        <div class="d-flex flex-row justify-content-center">
          <div>
            <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
          </div>
          <div>
            <a href="#"><i class="fab fa-twitter"></i></a>
          </div>
          <div>
            <a href="#"><i class="fab fa-youtube"></i></a>
          </div>
        </div>
        <div class="">
          <button type="button" href="" name="button" class="btn btn-outline bg-primary">Read More </button>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="container">
  <div class="row">
    <div class="col-lg-4">

    </div>
    <div class="col-lg-4">
      <hr class="bg-info">
    </div>
    <div class="col-lg-4">

    </div>
  </div>
</div>





<?php } ?>



<!--Copyright-->
<section id="copyright" class="text-center py-3 text-light">
  <div class="container">
    <div class="row">
      <div class="col">
        <p class="lead mb-0">Copyright 2019 &copy; Kh Shohag</p>
      </div>
    </div>
  </div>
</section>

<!-- popup for login -->
<div class="modal mt" id="loginModal">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">User Login</h5>
          <button class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">

          <form>
            <div class="form-group">
              <label for="userename">Username</label>
              <input class="form-control" type="text" placeholder="Enter Name">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input class="form-control" type="password" placeholder="Enter Password">
            </div>
          </form>

        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button class="btn btn-warning">Login</button>

        </div>
        <hr>
        <p class="mx-2 px-2">Don't have an account?? </p>
        <p class="mx-2 mt-0 px-2">Click to <a href="Register.html">Register</a></p>


      </div>
    </div>
  </div>
<!-- popup for login -->





  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/uikit.min.js"></script>
  <script src="js/uikit-icons.min.js"></script>
</body>
</html>
