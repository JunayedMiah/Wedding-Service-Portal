<?php require_once("include/DB.php"); ?>
<?php require_once("include/function.php"); ?>
<?php require_once("include/session.php"); ?>
<?php
if (isset($_POST["Submit"])){
$name = $_POST["org_name"] ;
$email = $_POST["email"] ;
$password= $_POST["password"] ;
$conpassword= $_POST["conpassword"] ;
$phone= $_POST["phone"] ;
$image= $_FILES["image"]["name"] ; //Selcting only the name of the image
$target = "upload/".basename($_FILES["image"]["name"]); //Showing the directory


if(empty($name) || empty($email) || empty($password) || empty($phone)  ) {
  $_SESSION["ErrorMessage"]="All fields must be filled out";
  Redirect_to("admin_register.php");
}elseif (strlen($name)<2) {
  $_SESSION["ErrorMessage"]="Organization Name must be greater than 2 characters";
  Redirect_to("admin_register.php");
}elseif (strlen($name)>40) {
  $_SESSION["ErrorMessage"]="Organization Name must be less than 40 characters";
  Redirect_to("admin_register.php");

}elseif ($password != $conpassword) {
  $_SESSION["ErrorMessage"]="Password and Confirmation Password must be same";
  Redirect_to("admin_register.php");

}elseif (CheckadminnameExistsOrNot($name)) {
  $_SESSION["ErrorMessage"]="This Name is already taken.Please try with Something Else ";
  Redirect_to("admin_register.php");

}elseif (CheckadminemailExistsOrNot($email)) {
  $_SESSION["ErrorMessage"]="This Email already Exists.Please try another one ";
  Redirect_to("admin_register.php");

}else {
   //Query to insert info into database
   $sql="INSERT INTO admin(name,email,password,phone,image)";
   $sql .="VALUES(:NamE,:EmaiL,:PassWord,:PhonE,:ImagE)";
   $stmt = $connectingdb->prepare( $sql);
   $stmt->bindValue(':NamE',$name );
   $stmt->bindValue(':EmaiL',$email);
   $stmt->bindValue(':PassWord',$conpassword);
   $stmt->bindValue(':PhonE',$phone);
   $stmt->bindValue(':ImagE',$image);
   $Execute=$stmt->execute();
   move_uploaded_file($_FILES["image"]["tmp_name"],$target); //To fetch the file in to the destination

   if($Execute){
    $_SESSION["SuccessMessage"] = "Registered Succesfully";
    Redirect_to("admin_register.php");
  }else{
    $_SESSION["ErrorMessage"]="Something went wrong. Please Try again";
    Redirect_to("admin_register.php");
  }
}
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
             <a class="nav-link" data-toggle="modal" data-target="#loginModal">Account</a>
           </li>
       </ul>
     </div>
   </div>
</nav>


<!--Registration Form-->

<section class="py-5" id="registration" >
  <div class="container">
    <h2 class="py-4 text-center text-danger bg-dark">Admin Registration</h2>
    <div class="row">
      <div class="col-lg-6">
        <?php
              echo ErrorMessage();
              echo SuccessMessage();
         ?>
        <form class="form-group" action="admin_register.php" method="post" enctype="multipart/form-data"> <!--enctype for image extraction-->
          <!--
          <div class="form-group">
          <label for="">First Name</label>
          <input type="text" name="first_name" class="form-control" value="">
        </div> -->
          <!--
          <div class="form-group">
          <label for="">Last Name</label>
          <input type="text" name="last_name" class="form-control" value="">
           </div>-->
           <div class="form-group">
           <label for="">Name</label>
           <input type="text" name="org_name" class="form-control" value="">
         </div>
          <div class="form-group">
          <label for="">Email</label>
          <input type="text" name="email" class="form-control" value="">
          </div>
          <div class="form-group">
          <label for="">Password</label>
          <input type="password" name="password" class="form-control" value="">
          </div>
          <div class="form-group">
          <label for="">*Retype Password</label>
          <input type="password" name="conpassword" class="form-control" value="">
          </div>

      </div>

      <div class="col-lg-6 ">

          <div class="form-group ml-3">
          <label for="">Phone</label>
          <input type="text" name="phone" class="form-control" value="">
          </div>

          <div class="form-group ml-3 mt-2">
            <label for="imageselect">Select Image</label>
            <div class="custom-file">
            <input class="custom-file-input" type="file" name="image" id="imageselect" class="form-control" value="">
            <label for="imageselect" class="custom-file-label">Enter an Image</label>
            </div>
          </div>

          <div class="ml-3 pt-3">
            <input type="submit" name="Submit" class="btn btn-primary" value="Submit">
          </div>

            </div>


      </form>

      </div>
    </div>
  </div>
</section>





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
  <script src="js/navbar-fixed.js"></script>
</body>
</html>
