<!Doctype html>
<html>
<head>
<title> Home page </title>

<link href="style_signup.css" rel="stylesheet" type="text/css">


</head>

<?php
include_once "connect.php" ;
echo "<br>";

$test1="1";
$test2="2";
/*$select1="SELECT * FROM chef";
$select2="SELECT * FROM photographer";
$select3="SELECT * FROM decorator"; */
$name=$_POST['type'];


/*
$sql = "SELECT *FROM chef";
$result = $conn->query($sql);

  //  echo "First: " . $row["firstname"].  "Lastname: " .$row["lastname"]. "</br>";
  //  echo "</br>";
  //}
//} else {

//  echo "0 results";
//}

*/
if ($name == $test1){
  $sql = "SELECT *FROM chef";
  $result = $conn->query($sql);
 ?>
      <!--echo "Firstname: " . $row["firstname"]. "</br>". "Lastname: " .$row["lastname"]. "</br>";
    echo "<script>window.open('member.php','_self')</script>";
      echo "</br>";
-->
<!--Table-->

<table class="table">
  <thead>
    <tr>
      <th scope="col">First</th>
      <th scope="col">Last</th>
    </tr>
  </thead>
  <tbody>

    <?php
    if ($result->num_rows > 0){
      while($row = $result->fetch_assoc()){?>
    <tr>

      <td><?php echo $row['firstname']; ?></td>
      <td><?php echo $row['lastname']; ?></td>
    </tr>

    <?php

  }}?>
  </tbody>
</table>

<?php
} elseif ($name == $test2) {
  $sql = "SELECT  *FROM photographer ";
  $result = $conn->query($sql); ?>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">First</th>
        <th scope="col">Last</th>
      </tr>
    </thead>
    <tbody>

      <?php
      if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()){?>
      <tr>

        <td><?php echo $row['firstname']; ?></td>
        <td><?php echo $row['lastname']; ?></td>
      </tr>

      <?php

    }}?>
    </tbody>
  </table>
<?php

} else {
  $sql = "SELECT  *FROM decorator ";
  $result = $conn->query($sql); ?>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">First</th>
        <th scope="col">Last</th>
      </tr>
    </thead>
    <tbody>

      <?php
      if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()){?>
      <tr>

        <td><?php echo $row['firstname']; ?></td>
        <td><?php echo $row['lastname']; ?></td>
      </tr>

      <?php

    }}?>
    </tbody>
  </table>
  <?php

} ?>
</html>
