<?php require_once("include/DB.php"); ?>
<?php require_once("include/function.php"); ?>
<?php require_once("include/session.php"); ?>
<?php
if (isset($_POST["Submit"])){
  $email = $_POST["email"];
  $password= $_POST["Password"];
  if(empty($email) || empty($password)){
    $_SESSION["ErrorMessage"]="All fields must be filled out";
    Redirect_to("login_UI.php");

  }else {

$Found_Account=Login_Attempt($email,$password);
if ($Found_Account) {
$_SESSION["UserId"]=$Found_Account["id"];
$_SESSION["UserName"]=$Found_Account["name"];
$_SESSION["EmaiL"]=$Found_Account["email"];
$_SESSION["PhonE"]=$Found_Account["phone"];
$_SESSION["TypE"]=$Found_Account["type"];



  $_SESSION["SuccessMessage"]="Login Succesfull.";
  Redirect_to("profile.php");
}else {
    $_SESSION["ErrorMessage"]="Incorrect Username or Password ";
    Redirect_to("login_UI.php");
}
  }
}

?>
