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
          include('newcon.php');
          $sql = "SELECT photo FROM log WHERE 1viewid = '$hello'";
          $result = $con->query($sql);
          if ($result->num_rows > 0) {
           while($row = $result->fetch_assoc()) { ?>
            <img class="imaging"  src="log/<?php echo $row["photo"]; ?>"/>
            <?php
          }
        }
        ?>
        <h2 class = 'nameofuser'>
        <?php 
          echo ucfirst(substr($_SESSION['username'], 0, strpos($_SESSION['username'], "@")));?>
        <h3 class="yr">
        <?php
          $hello = $_SESSION['username'];
          include('newcon.php');
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
              echo "Branch: "; 
          }
        }
        ?>
        <div class='changepos'>
        <form method="POST" action="changeyr2.php">
        <input class = "inp" name = "year" id = "year" type="text">
        <button type = "image"><img class = "pencil" src = "penciledit.png"/></button>
    </form>
    </div>
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