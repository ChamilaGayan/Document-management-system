<?php
	include 'php/dbConfig.php';

	if(!isset($_SESSION)) 
	{ 
    session_start(); 
	} 

	define('UPLOAD_DIR', '../../data/GAP/mso/');
	$img = $_POST['imgBase64']; 
	$img = str_replace('data:image/png;base64,', '', $img);
	$img = str_replace(' ', '+', $img);
	$data = base64_decode($img);
	$uniqueid = uniqid();
	$file = UPLOAD_DIR . $uniqueid . '.png'; 
	$success = file_put_contents($file, $data); 
	$fileName = $uniqueid . '.png'; 
	if(!empty($file)&&isset($file)){ 
		$type= $_POST['type'];
		$rId = $_POST['rId'];

	
		if($type == 'wworks')

		{
			$sql = "UPDATE weekend_works SET clark = '$fileName',isRead = 4,stat = 'GA' where id = $rId";

		} else if($type == 'wexpected')

		{
			$sql = "UPDATE work_expected SET clark = '$fileName',isRead = 4 where id = $rId";
	
		} 



}
	 
	if($db -> query($sql)){
        echo 'Success';
    }
	else{
		echo "<script>alert ('Check you entered Details and Try Again..!')</script>".$db->error;
	}
	mysqli_close($db);
?>