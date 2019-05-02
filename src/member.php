<?php
include_once "includes/nav.php";

include_once "connect.php" ;

echo "<br>";
?>

<!Doctype html>
<html>
<head>
<title> Home page </title>

<link href="style_signup.css" rel="stylesheet" type="text/css">


</head>

<body>



<center>
  <h1> Choose a Type To see Memberlist</h1>


  <form name="member_registraion" method="post" action="memberlist.php">

  <p>
  <strong>TYPE</strong> <br/>
  <select  name="type">
    <option value="1">Chef</option>
    <option value="2">Photographer</option>
    <option value="3">Decorator</option>

  </select>
  </p>

<!--  <p>
  <strong>Subscription</strong> <br/>
  <input type="checkbox" name="subscription" value="daily"/>   &nbsp; Daily   </br>
  <input type="checkbox" name="subscription" value="weekly"/>  &nbsp; Weekly  </br>
  <input type="checkbox" name="subscription" value="monthly"/> &nbsp; Monthly </br>

  </p>
-->

  <p>
    <input type="submit" name="submit" value="Enter">
  </p>






  </form>

  </Center>





</body>

</html>
