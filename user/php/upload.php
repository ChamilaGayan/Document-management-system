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
        $type= $_GET['type'];
        $uid =  $_SESSION["id"] ;
        $roll=$_SESSION["roll"];
        $mon=$_POST["month"];
        $fd=$_POST["fromDate"];
        $td=$_POST["toDate"];
        $nod=$_POST["nod"];
        $ltype=$_POST["ltype"];

    // Allow certain file format
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            
            $sql="INSERT into images (file_name, uploaded_on,fromDate,toDate,user_id,roll,month,nod,ltype,stat) 
            VALUES ('".$fileName."', NOW(),'". $fd."','". $td."','".$uid."','".$roll."','". $mon."','". $nod."','". $ltype."','MSO')";

        $insert = $db->query($sql)  ;
                //$insert=mysqli_query($db,$sql) or die (mysqli_error($db));

            if($insert){
                $statusMsg = "The file has been uploaded successfully.";
                
                //Button
                echo "<script>alert('Request Submit successfully');</script>";
                echo '<script type="text/javascript">location.href = "../view/tbl.php?type=leave";</script>';
                
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
