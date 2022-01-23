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
if (!empty($_SESSION['logged_in']))
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
      <div class = "buttons">
        <button style="background-color:red;padding: 10px;color:white;borderborder-style: solid;position:relative;top:100px;left:400px;">Search</button>
     </div>
     <form method="GET" action="homepage.php">
        <button style="background-color:green;padding: 10px;color:white;borderborder-style: double;position:relative;top:60px;left:700px;">Profile</button>
     </form>
     <form method="GET" action="post.php">
        <button style="background-color:blue;padding: 10px;color:white;borderborder-style: double;position:relative;top:20px;left:1000px;">Post</button>
     </form>
     <h2 style="position:relative;left:300px">Chat</h2>
     <section style="border-style:solid;height:800px;width:800px;left:300px;position:relative;padding:1px;color:white;">
     <form method="POST" action="
     <?php
     include('newcon.php');
     $hello = $_SESSION['username'];
     if(isset($_POST['texted'])){
        $text = $_POST['text']; 
        $text = stripcslashes($text);   
        $text = mysqli_real_escape_string($con, $text);
        $sq = "INSERT INTO chats(`name`, `message`) VALUES('$hello','$text')";
        mysqli_query($con, $sq);
     }
     ?>
     ">
     <?php 
     $msg = "SELECT name,message FROM chats";
     $result = $con->query($msg);
     if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){?>
         <h3 style="color:red;"><?php echo  ucfirst(substr($row["name"], 0, strpos($row["name"], "@")))." :";?></h3><h3 style="color:green;"><?php echo $row["message"]; ?></h3>
        <?php
        }
    }
     ?>
     <input name="text" style="border-style:solid;width:500px;height:50px;background-color:green;position:relative;top:100px;border-radius:50px;" type="text">
     <button name = "texted" style="position:relative;padding:10px;background-color:white;left:50px;top:100px;" type="submit">Send</button>
     </form>
    </section>
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