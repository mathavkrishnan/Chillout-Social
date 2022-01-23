<?php
    include('con.php');
    $usernames = substr($_SESSION['username'], 0, strpos($_SESSION['username'], "@"));
    if(isset($_POST['sub'])){
        $user = $_POST['user'];
        $user = stripcslashes($user);   
        $user = mysqli_real_escape_string($con, $user);
        $user1 = ucfirst(substr($user, 0, strpos($user, "@")));
        $sqz = "SELECT photo,name,yr,branch FROM log WHERE $user = $usernames and $user1 = $usernames;";
        $result = $con->query($sqz);
        $rows = $result->fetch_assoc();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) { ?>
             <div><img class="imaging"  src="log/<?php echo $row["photo"]; ?>"/>
             <?php
           }
         }
    }
?>