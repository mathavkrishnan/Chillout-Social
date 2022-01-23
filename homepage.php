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
      <form method="POST" action="search.php">
        <button style="background-color:red;padding: 10px;color:white;borderborder-style: solid;position:relative;top:100px;left:400px;">Search</button>
</form>
     <form method="GET" action="chat.php">
        <button style="background-color:green;padding: 10px;color:white;borderborder-style: double;position:relative;top:60px;left:700px;">Chat</button>
</form>
     <form method="GET" action="post.php">
        <button  style="background-color:blue;padding: 10px;color:white;borderborder-style: double;position:relative;top:20px;left:1000px;">Post</button>
</form>
     <div class="imgprop">
        <?php
        $hello = $_SESSION['username'];
        include('newcon.php');
        $sql = "SELECT photo FROM posts WHERE name = '$hello'";
        $result = $con->query($sql);
        $sql2 = "SELECT text FROM posts WHERE name = '$hello'";
        $result2 = $con->query($sql2);
        if($result->num_rows > 0){
         while($row = $result->fetch_assoc()) {?>
          <div><img style="width:600px;height:500px;position:relative;left:400px;top:100px;border-style: solid;border-radius:10px;" src="log/posts/<?php echo $row["photo"]; ?>"/>
          <?php
          if($result2->num_rows > 0){
            $col = $result2->fetch_assoc();?>
              <h3 style="position:relative;text-align: center;padding-top:100px;right:40px;color:black"><?php echo ucwords($col["text"]); ?></h3>
              <?php
            }  
      ?>
          <?php
          }
        }
      ?>
     </div>
        <section style="padding-bottom:100px;position:relative;">
        <div class="cont">
        <?php
          $hello = $_SESSION['username'];
          $username = ucfirst(substr($_SESSION['username'], 0, strpos($_SESSION['username'], "@")));
          include('newcon.php');
          $sql = "SELECT photo FROM log WHERE 1viewid = '$hello'";
          $result = $con->query($sql);
          if ($result->num_rows > 0) {
           while($row = $result->fetch_assoc()) { ?>
            <a href="changeimage.php"><div><img class="imaging"  src="log/<?php echo $row["photo"]; ?>"/></a>
            <?php
          }
        }
        ?>
        <h2 class = 'nameofuser'>
        <?php 
          echo $username?>
        </h2>
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
              echo "Branch: " .$row["branch"]; 
          }
        }
        ?>
        <a href="edit2.php"><img class = "pencil" src = "penciledit.png"/></a>
        </h3>
    </div>
        </section>
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