<?php      
    include('connection.php');  
    $username = $_POST['1viewid'];     
    $username = stripcslashes($username);   
    $username = mysqli_real_escape_string($con, $username);
    $pattern = "/@vitstudent.ac.in/i";
    $store = preg_match($pattern, $username);
    if($store == 1){
        $sql = "select 1viewid from log where 1viewid = '$username'";  
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);      
        if($result->num_rows == 1){  
                $_SESSION['logged_in'] = true;
                $_SESSION['username'] = $username;
                header("Location: homepage.php");
                exit();
        }  
        else{  
                header("Location: failed.html"); 
        }     
    } 
    else{
        header("Location: failed2.html");  
    }   
?>  