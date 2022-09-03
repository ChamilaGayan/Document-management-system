<?php session_start();
require_once('login/dbconnection.php');
error_reporting(0);
//Code for Registration 
if(isset($_POST['signup']))
{
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$contact=$_POST['contact'];
	$enc_password=$password;
$sql=mysqli_query($con,"select id from users where email='$email'");
$row=mysqli_num_rows($sql);

if($row>0)
{
	echo "<script>alert('Email id already exist with another account. Please try with other email id');</script>";
} else{
	$msg=mysqli_query($con,"insert into users(fname,lname,email,password,contactno) values('$fname','$lname','$email','$enc_password','$contact')");

if($msg)
{
	echo "<script>alert('Register successfully');</script>";
}
}
}
// Code for login 
if(isset($_POST['login']))
{
$password=$_POST['password'];
$dec_password=$password;
$useremail=$_POST['uemail'];
$ret= mysqli_query($con,"SELECT * FROM users WHERE email='$useremail' and password='$dec_password'");
$num=mysqli_fetch_array($ret);
$_SESSION['id']=$num['id'];
$_SESSION['roll']=$num['roll'];
$_SESSION['name']=$num['name'];
if($num>0)
{

	if($num["roll"]=="admin")
	{	

		$_SESSION["email"]=$useremail;
		

	header("location:admin/index.php");
	}

	else if($num["roll"]=="ads")
	{	

		$_SESSION["email"]=$useremail;


	header("location:ads/index.php");
	}


	else if($num["roll"]=="clark")
	{	

		$_SESSION["email"]=$useremail;

	
	header("location:clark/index.php");
	}else
	{
		header("location:user/index.php");
	}

	}
	else
	{
		echo "<script>alert('Invalid username or password');</script>";

		echo '<script type="text/javascript">location.href = "index.php";</script>';
		//header("location:login.php");
		exit();
	
	} 
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="user/css/tablemod.css">

<link href="login/css/style.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Elegent Tab Forms,Login Forms,Sign up Forms,Registration Forms,News latter Forms,Elements"./>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
</script>
<script src="login/js/jquery.min.js"></script>
<script src="login/js/easyResponsiveTabs.js" type="text/javascript"></script>
				<script type="text/javascript">
					$(document).ready(function () {
						$('#horizontalTab').easyResponsiveTabs({
							type: 'default',       
							width: 'auto', 
							fit: true 
						});
					});
				   </script>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,400,600,700,200italic,300italic,400italic,600italic|Lora:400,700,400italic,700italic|Raleway:400,500,300,600,700,200,100' rel='stylesheet' type='text/css'>
</head>
<body>

<center><img id="Page 1" width="100" height="120" src="login/images/logo.png" alt="Page 1" ></center>

<center><h1 style="font-size:25px; font-weight: bold;">දිස්ත්‍රික් ලේකම් කාර්යාලය මාතලේ </h1></center>
<center><h1 style="font-size:20px; font-weight: bold;">Login</h1></center>

<div class="main">
		<br> 
	 <div class="sap_tabs">	
			<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
			  <ul class="resp-tabs-list">
			  <li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><div class="top-img"><img src="images/top-lock.png" alt=""/></div><span></span></li>

			  	  <li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><div class="top-img"><img src="images/top-note.png" alt=""/></div><span></span>
			  	  	
				</li>
				  <li class="resp-tab-item lost" aria-controls="tab_item-2" role="tab"><div class="top-img"><img src="images/top-key.png" alt=""/></div><span></span></li>
				  <div class="clear"></div>
			  </ul>		
			  	 

			  <div class="tab-2 resp-tab-content" aria-labelledby="tab_item-1">
					 	<div class="facts">
							 <div class="login">
							<div class="buttons">
								
							</div>
							<form name="login" action="" method="post">
								
								<input type="text" class="text" name="uemail" value="" placeholder="Enter your registered email"  ><a href="#" class=" icon email"></a>

								<input type="password" value="" name="password" placeholder="Enter valid password"><a href="#" class=" icon lock"></a>

								<div class="p-container">
								
									<div class="submit two">
									<input type="submit" name="login" value="LOG IN" >
									</div>
									<div class="clear"> </div>
								</div>

							</form>
					</div>
				</div> 
			</div> 


			
						        					 
				 <div class="tab-2 resp-tab-content" aria-labelledby="tab_item-1">
					 	<div class="facts">
							 <div class="login">
							<div class="buttons">
								
							</div>
							<form name="login" action="" method="post">
							
											<code>Welcome! <br> Please login for access the system</code>
				
									</form>
									</div>
				         	</div>           	      
				        </div>	
				     </div>	
		        </div>
	        </div>
	     </div>
</body>
</html>