<?php
if(isset($_POST['posted'])){
  $filename = $_FILES["file"]["name"];
  $tempname = $_FILES["file"]["tmp_name"];    
  $folder = "log/posts".$filename;
  $text = $_POST['text']; 
  $text = stripcslashes($text);   
  $text = mysqli_real_escape_string($con, $text);
  $sql = "INSERT INTO posts(`name`, `photo`, `text`) VALUES ('$hello','$filename','$text')";
   mysqli_query($con, $sql);
   if(move_uploaded_file($tempname, $folder)){
    header("Location:homepage.php");
   }
  }
}
?>