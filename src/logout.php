<?php require_once("include/DB.php"); ?>
<?php require_once("include/function.php"); ?>
<?php require_once("include/session.php"); ?>
<?php
$_SESSION["UserId"]=null;
$_SESSION["UserName"]=null;
$_SESSION["EmaiL"]=null;
$_SESSION["PhonE"]=null;
$_SESSION["TypE"]=null;

session_destroy();
Redirect_to("login_UI.php");



?>
