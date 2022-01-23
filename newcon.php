<?php      
    $host = "sql207.unaux.com";  
    $user = "unaux_29868363";  
    $password = "19bu1ywo4cqpd5j";  
    $db_name = "unaux_29868363_chillout";  
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  
?> 