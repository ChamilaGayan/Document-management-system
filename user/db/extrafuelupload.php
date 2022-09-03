<?php
// Include the database configuration file
include 'dbConfig.php';
$statusMsg = '';

// File upload path
$targetDir = "C:/xampp/htdocs/Office_System/uploads/";


if(isset($_POST["submit"])){

    if(!empty($_FILES["file"]["name"])){

        $fileName = basename($_FILES["file"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
        
        $res = $_POST["reason"];
        $loc = $_POST["loc"];

    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            
         $insert = $db->query("INSERT into extra_fuel (file_name, uploaded_on,locations,reason,fromDate,toDate) 
           VALUES ('".$fileName."', NOW(),'".$loc."','".$res."',NOW(),NOW())");

            if($insert){
                $statusMsg = "The file has been uploaded successfully.";
                
                //Button
                echo '<a href="../extra_fuel.php">Click here to go back</a>';
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
