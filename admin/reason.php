<?php
include 'php/dbConfig.php';
?>

<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
if (strlen($_SESSION['id']==0)) {
  header('<location:login/logout.php');
  } else{
  }
  	$type= $_GET['type'];
	$res = $_POST["r_reason"];
	$rId = $_REQUEST['rId'];

	if($type == 'leave') 
	{
		$sql = "update images set r_reason='$res', isRead='1',stat='Reject' , nod='0' WHERE id='$rId'; ";
  
	}else if($type == 'efuel')

	{
		$sql = "update extra_fuel set r_reason='$res', isRead='1',stat='Reject' WHERE id='$rId'; ";

	}
	
	else if($type == 'wworks')
  
	{
		$sql = "update weekend_works set r_reason='$res', isRead='1',stat='Reject' WHERE id='$rId'; ";
  
	}
	else if($type == 'pperfromed')
  
	{
		$sql = "update program_perfomed set r_reason='$res', isRead='1',stat='Reject' WHERE id='$rId'; ";
  
	}
	else if($type == 'wexpected')
  
	{
		$sql = "update work_expected set r_reason='$res', isRead='1',stat='Reject' WHERE id='$rId'; ";
  
	}
	else if($type == 'ot')
  
	{
		$sql = "update ot set r_reason='$res', isRead='1',stat='Reject' WHERE id='$rId'; ";
  
	}
	if($db -> query($sql)){
		echo "<script>alert('Reject Successfully');</script>";
		echo '<script type="text/javascript">location.href = "index.php?type=leave";</script>';

    }
	else{
		echo "<script>alert ('Check you entered Details and Try Again..!')</script>".$db->error;
	}
	mysqli_close($db);

?>

