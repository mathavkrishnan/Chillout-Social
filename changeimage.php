<html>
<head>
<title>Chill Out</title>
<link rel="stylesheet" type="text/css"href="homepage.css">
<meta charset="utf-8">
<meta name="Mathav Krishnan" content="" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="refresh" content="50s" >
<link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet'/>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link rel="icon" href="/favicon.ico" type="image/x-icon">
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
    <header>
        <h1 style="padding-left:50px ;font-family: Lobster;">Chill Out</h1>
        <div style="position: relative;left: 1300px;bottom: 60px;">
            <?php
session_start();
if (! empty($_SESSION['logged_in']))
{
    ?>
    <a href="logout.php" style="color: white;text-decoration: none;"><h1>Exit</h1></a>

    <?php
}
else
{
    header("Location: index.html");
}
?>
        </div>
    </header>
    <main>
        <div class="cont">
        <?php
          $hello = $_SESSION['username'];
          include('newcon.php');?>
        <form method = "POST" enctype="multipart/form-data" action ="<?php
        if(isset($_POST['change'])){
          $filename = $_FILES["file"]["name"];
          $tempname = $_FILES["file"]["tmp_name"];    
          $folder = "log/".$filename;
          $data = "select photo from log where photo = '$filename'";  
          $result = mysqli_query($con, $data);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
            $count = mysqli_num_rows($result); 
            $name = ucfirst(substr($username, 0, strpos($username, "@")));     
          if($result->num_rows == 0){
           $sql = "UPDATE log SET photo = '$filename' WHERE 1viewid = '$hello'";
           mysqli_query($con, $sql);
           if(move_uploaded_file($tempname, $folder)){
            header("Location:homepage.php");
           }
          }
}
?>">
         <div>
            <input type="file" name="file" id="file">
         </div><br><br>
         <button type="submit" style="postion:relative;top: 20px;" name="change" id="change">Change</button>
        </form>
        <h2 class = 'nameofuser'>
        <?php 
          echo ucfirst(substr($_SESSION['username'], 0, strpos($_SESSION['username'], "@")));?>
        </h2>
        <h3 class="yr">
        <?php
          $hello = $_SESSION['username'];
          
          $sql = "SELECT yr FROM log WHERE 1viewid = '$hello'";
          $result = $con->query($sql);
          if ($result->num_rows > 0) {
           while($row = $result->fetch_assoc()) { 
              echo "Year: " .$row["yr"]; 
          }
        }
        ?>
        <a href="edit.php"><img class = "pencil" src = "penciledit.png"/></a>
        </h3>
        <h3 class="bra">
        <?php
          $hello = $_SESSION['username'];
          include('newcon.php');
          $sql = "SELECT branch FROM log WHERE 1viewid = '$hello'";
          $result = $con->query($sql);
          if ($result->num_rows > 0) {
           while($row = $result->fetch_assoc()) { 
              echo "Branch: " .$row["branch"]; 
          }
        }
        ?>
        <a href="edit2.php"><img class = "pencil" src = "penciledit.png"/></a>
        </h3>
    </div>
    </main>
    <script>
        function func() {
          var x = document.getElementById("1viewid");
          if (x.type === "password") {
            x.type = "text";
            document.getElementById("myImg").src = "nonvisibility.png";
          }
          else{
              x.type = "password";
              document.getElementById("myImg").src = "visibility.png";
          }
        }
        </script>
</body>
</html>