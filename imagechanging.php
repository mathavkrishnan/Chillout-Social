<?php
    include('newcon.php');
        if(isset($_POST['change'])){ 
            $filename = $_FILES["file"]["name"];
            $tempname = $_FILES["file"]["tmp_name"];    
            $folder = "log/".$filename;
            $data = "select photo from log where photo = '$filename'";  
            $result = mysqli_query($con, $data);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
            $count = mysqli_num_rows($result);     
            if($result->num_rows == 0){
                $sql = "INSERT INTO `log`(`photo`) VALUES ('$filename')";
                mysqli_query($con, $sql);
                if(move_uploaded_file($tempname, $folder)){
                    header("homepage.php");
                }
            }
        }
?>