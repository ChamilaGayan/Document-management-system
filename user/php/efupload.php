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

    if(!empty($_FILES["file"]["name"])  ||   !empty($_FILES["file2"]["name"])   ){ 

        $fileName = basename($_FILES["file"]["name"]);
        $fileName = generateRandomString() . $fileName;
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
        
        $uid =  $_SESSION["id"];
        $mon=$_POST["month"];
        $roll=$_SESSION["roll"];

        $page2 = basename($_FILES["file2"]["name"]);
        $page2 = generateRandomString() . $page2;
        $targetFilePath2 = $targetDir . $page2;
        $fileType2 = pathinfo($targetFilePath2,PATHINFO_EXTENSION);
        
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes) || in_array($fileType2, $allowTypes)){
        // Upload file to server
        if(  empty($_FILES["file"]["name"]) ||   move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            if( empty($_FILES["file2"]["name"]) || move_uploaded_file($_FILES["file2"]["tmp_name"], $targetFilePath2)){

         $insert = $db->query("INSERT into extra_fuel (file_name, uploaded_on,user_id,roll,month,page2,stat) 
           VALUES ('".$fileName."', NOW(),'".$uid."','".$roll."','". $mon."','". $page2."','MSO')");

            if($insert){
                $statusMsg = "The file has been uploaded successfully.";
                
                //Button
                echo "<script>alert('Request Submit successfully');</script>";
                echo '<script type="text/javascript">location.href = "../view/tbl.php?type=efuel";</script>';

            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.  ";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}
}
}
// Display status message
echo $statusMsg;

?>
