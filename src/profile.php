<?php require_once("include/DB.php"); ?>
<?php require_once("include/function.php"); ?>
<?php require_once("include/session.php"); ?>
<?php require_once("login_act.php"); ?>
<?php
//fetching the admin data
$adminid=$_SESSION["UserId"];
global $connectingdb;
$sql ="SELECT *FROM client WHERE id='$adminid'";
$stmt=$connectingdb->query($sql);
while($DataRows = $stmt->fetch()){
  $id=$DataRows['id']; //fetched this one for the edit option
  $Existingname= $DataRows['name'];
  $Existingemail= $DataRows['email'];
  $Existingpassword=$DataRows['password'];
  $Existingphone=$DataRows['phone'];
  $Existingtype=$DataRows['type'];
  $Existingimage=$DataRows['image'];

}

 ?>
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
         <li class="nav-item">
           <a class="nav-link" href="Categories.html">Categories</a>
         </li>
         <li class="nav-item ">
           <a class="nav-link" href="About.html">About Us</a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="Contact.html">Contact</a>
         </li>
         <li class="nav-item">
             <a class="nav-link" data-toggle="modal" data-target="#loginModal">Account</a>
           </li>
       </ul>
     </div>
   </div>
</nav>







<section class="py-5 text-center" id="profile">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Welcome <?php echo $Existingname ?> </h3>
      </div>
    </div>
  </div>
</section>

<div class="container">
    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<img src="upload/<?php echo $Existingimage; ?>" class="img-fluid rounded-circle" alt="image">
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle py-3">
					<div class="profile-usertitle-job">
              <?php echo $Existingemail ?>
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->

				<div class="profile-userbuttons py-3">
					<a class="btn btn-success btn-sm" href="update_client_info.php?id=<?php echo $id; ?>"> Edit</a>
					<button type="button" class="btn btn-danger btn-sm">View More</button>
				</div>
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
          <div class="">
            	<a href=""> Overview </a>
          </div>
          <div class="">
            <a href=""> Account Settings </a>
          </div>
          <div class="">
            <a href=""> Tasks </a>
          </div>
          <div class="">
            	<a href=""> Help </a>
          </div>
        </div>
				<!-- END MENU -->
			</div>
		</div>
		<div class="col-md-9">
            <div class="profile-content">
                  <h5 class="py-4 text-center font-weight-bold text-info">Your Information!</h5>

                      <form class="form-group" action="update_member.php" method="post">
                        <div class="form-group">
                        <label >Company Name</label>
                        <input type="text" name="cname" class="form-control" value=<?php echo $Existingname ?> required>
                      </div>
                      <div>
                        <label class="mt-1">Email</label>
                        <input type="email" name="email" class="form-control" value=<?php echo $Existingemail ?> required>
                      </div>
                      <div class=" mt-3">
                        <label for="">User Type</label>
                            <input type="text" name="type" class="form-control" value=<?php echo $Existingtype ?>>
                      </div>
                        <div class="form-group mt-3">
                            <label for="">Phone No.</label>
                            <input type="text" name="phn" class="form-control" value=<?php echo $Existingphone ?>>
                        </div>
                        <div class="form-group mt-3">
                            <label for="">Password</label>
                            <input type="text" name="phn" class="form-control" value=<?php echo $Existingpassword ?>>
                        </div>
            </form>
       </div>
		</div>
	</div>
</div>
<br>
<br>



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
