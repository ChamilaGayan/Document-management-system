<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
// Include the database configuration file
include 'dbConfig.php';
$statusMsg = '';

// File upload path
$targetDir = "C:/xampp/htdocs/Office_System/user/uploads/requset/";


if(isset($_POST["submit"])){

    if(!empty($_FILES["file"]["name"])){

        $fileName = basename($_FILES["file"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
        $uid =  $_SESSION["id"] ;
        $res = $_POST["reason"];
      

    // Allow certain file format
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            
         $insert = $db->query("INSERT into images (file_name, uploaded_on,reason,fromDate,toDate,user_id) 
           VALUES ('".$fileName."', NOW(),'".$res."',NOW(),NOW(),'".$uid."')");

            if($insert){
                $statusMsg = "The file has been uploaded successfully.";
                
                //Button
                echo '<a href="../index.php">Click here to go back</a>';
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
