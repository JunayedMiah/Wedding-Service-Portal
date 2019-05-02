<?php require_once("include/DB.php"); ?>
<?php require_once("include/function.php"); ?>
<?php require_once("include/session.php"); ?>
<?php confirm_login(); ?>
<?php
//fetching the admin data
$adminid=$_SESSION["UserId"];
global $connectingdb;
$sql ="SELECT *FROM admin WHERE id='$adminid'";
$stmt=$connectingdb->query($sql);
while($DataRows = $stmt->fetch()){
  $id=$DataRows['id']; //fetched this one for the edit option
  $Existingname= $DataRows['name'];
  $Existingemail= $DataRows['email'];
  $Existingpassword=$DataRows['password'];
  $Existingphone=$DataRows['phone'];
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
             <a class="nav-link" href="login_UI.php">Account</a>
           </li>
           <li class="nav-item  active">
               <a class="nav-link" href="admin_login.php">Profile</a>
             </li>
         <li class="nav-item">
           <a class="nav-link" href="admin_logout.php">Logout</a>
         </li>

       </ul>
     </div>
   </div>
</nav>

<!--Page Header-->
<section id="admin_check" class="text-light text-center mb-5">
  <div class="container">
    <div class="row">
      <div class="col pt-5">
        <h2 class="text-light">Admin Panel</h2>
        <p class="lead text-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, saepe.</p>
      </div>
    </div>
  </div>
</section>

<!--Main Section-->
<!--Image-->
<section id="admin_avatar" class="pt-5 pb-3 ">
<div class="container">
  <div class="row">
    <div class="col text-center">
      <?php
      echo ErrorMessage();
      echo SuccessMessage();
      ?>
    </div>
  </div>
  <div class="row ">

  <div class="col-md-4 ">

  </div>

    <div class="col-md-4 bg-dark text-center">
      <h2 class="py-2 text-light">Welcome Back Admin</h2>
      <img src="upload/<?php echo $Existingimage; ?>" class="img-fluid rounded p-2 pb-4" width="270px" height="250px" alt="image">
      <p class="lead text-light">Name: <?php echo $Existingname; ?> </p>
    </div>
  </div>
</div>
</section>
<!--Client Table-->
<section class="">
<div class="container py-2 mb-4">
  <div class="row">
    <div class="col">

      <h1 class="text-danger text-center bg-dark py-2" >Client Table</h1>
      <table class="table table-striped table-hover">
        <thead class="thead-dark">
          <tr>
          <th class="py-2">#</th>
          <th class="py-2">id</th>
          <th class="py-2">Name</th>
          <th class="py-2">Category</th>
          <th class="py-2">Banner</th>
          <th class="py-2">Email</th>
          <th class="py-2">Phone</th>
          <th class="py-2">Action</th>
        </tr>
        </thead>
        <!--PhP for fetching Client info from client table -->
        <?php
        global $connectingdb;
        $sql = "SELECT *FROM client ";
        $stmt = $connectingdb->query($sql);
        while($DataRows = $stmt->fetch()){
          $id = $DataRows["id"];
          $name = $DataRows["name"];
          $email = $DataRows["email"];
          $phone = $DataRows["phone"];
          $image = $DataRows["image"];
          $type =  $DataRows["type"];

        ?>
        <tbody>
        <tr>
          <td>#</td>
          <td><?php echo $id; ?></td>
          <td><?php echo $name; ?></td>
          <td><?php echo $type; ?></td>
          <td><img src="upload/<?php echo $image; ?>" alt="img" width="170px;" height="50px"></td>
          <td><?php echo $email; ?></td>
          <td><?php echo $phone; ?></td>
          <td>
            <span>
              <a href="Edit_admin.php?id=<?php echo $id; ?>"><span class="btn btn-warning">Edit</span></a>
              <a href="Delete_admin.php?id=<?php echo $id; ?>"><span class="btn btn-danger">Delete</span></a>

            </span>

          </td>

        </tr>
        </tbody>
        <?php } ?>
      </table>

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
</body>
</html>
