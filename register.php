<?php
    include('connection.php');
    $username = $_POST['1viewid'];     
    $username = stripcslashes($username);   
    $username = mysqli_real_escape_string($con, $username);
    $mob = $_POST['mob'];
    $pattern = "/@vitstudent.ac.in/i";
    $store = preg_match($pattern, $username);
    if($store == 1 || mb_strlen(mob) == 10){
        if(isset($_POST['sub'])){ 
            $filename = $_FILES["file"]["name"];
            $tempname = $_FILES["file"]["tmp_name"];    
            $folder = "log/".$filename;
            $data = "select photo from log where photo = '$filename'";  
            $result = mysqli_query($con, $data);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
            $count = mysqli_num_rows($result); 
            $name = ucfirst(substr($username, 0, strpos($username, "@")));     
            if($result->num_rows == 0){
                $sql = "INSERT INTO `log`(`1viewid`, `photo`, `mobile`, `yr`,`branch`,`name`) VALUES ('$username','$filename','$mob','1st year','no branch','$name')";
                mysqli_query($con, $sql);
                if(move_uploaded_file($tempname, $folder)){
                    header("Location:index.html");
                }
            }
            else{
                header("Location:renameit.html");
            }
        }
    }
    else{
        header("Location: invalidreg.html");
    }
?>