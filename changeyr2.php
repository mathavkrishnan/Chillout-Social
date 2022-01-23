<?php
 include('newcon.php');
 include('homepage.php');
  $ye = $_POST['year'];
  $ye = stripcslashes($ye);   
  $ye = mysqli_real_escape_string($con, $ye);
  $sql = "UPDATE log SET branch ='$ye' WHERE 1viewid = '$hello'";
 if ($con->query($sql) === TRUE){
  header("Location:homepage.php");
 } 
?>