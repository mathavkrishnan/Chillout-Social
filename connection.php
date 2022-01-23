<?php 
    session_start();     
    $host = "sql106.epizy.com";  
    $user = "epiz_30643874";  
    $password = "cIA4BJHLPjrV";  
    $db_name = "epiz_30643874_chillout";  
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  
?> 