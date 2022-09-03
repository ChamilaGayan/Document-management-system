<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
// Include the database configuration file
include 'dbConfig.php';
$statusMsg = '';

// File upload path
$targetDir = "../../../data/GAP/user/";
function generateRandomString($length = 10) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', 
    ceil($length/strlen($x)) )),1,$length);
        }


if(isset($_POST["submit"])){  

    if(!empty($_FILES["file"]["name"])){

        $fileName = basename($_FILES["file"]["name"]);
        $fileName = generateRandomString() . $fileName;
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
        $uid =  $_SESSION["id"] ;
        $mon=$_POST["month"]; 
        $roll=$_SESSION["roll"]; 
   

    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            
         $insert = $db->query("INSERT into ot (file_name, uploaded_on,user_id,roll,month,stat) 
         VALUES ('".$fileName."', NOW(),'".$uid."','".$roll."','". $mon."','MSO')");
            if($insert){
                $statusMsg = "The file has been uploaded successfully.";
                
                //Button
                echo "<script>alert('Request Submit successfully');</script>";
                echo '<script type="text/javascript">location.href = "../view/tbl.php?type=ot";</script>';
 
            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}
}

// Display status message
echo $statusMsg;

?>
