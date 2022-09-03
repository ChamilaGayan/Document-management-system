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
  $uid =  $_SESSION["id"] ;
if (count($_POST) > 0) {
    $result = mysqli_query($db, "SELECT *from users WHERE id='" . $_SESSION["id"] . "'");
    $row = mysqli_fetch_array($result);
    if ($_POST["currentPassword"] == $row["password"]) {
        mysqli_query($db, "UPDATE users set password='" . $_POST["newPassword"] . "' WHERE id='" . $_SESSION["id"] . "'");
        $message = "Password Changed Successfully!";
    } else
        $message = "Current Password is not correct";
}
?>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="css/tablemod.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
<title>Change Password</title>
<link rel="stylesheet" type="text/css" href="css/styles.css" />
<script>
function validatePassword() {
var currentPassword,newPassword,confirmPassword,output = true;

currentPassword = document.frmChange.currentPassword;
newPassword = document.frmChange.newPassword;
confirmPassword = document.frmChange.confirmPassword;

if(!currentPassword.value) {
	currentPassword.focus();
	document.getElementById("currentPassword").innerHTML = "required";
	output = false;
}
else if(!newPassword.value) {
	newPassword.focus();
	document.getElementById("newPassword").innerHTML = "required";
	output = false;
}
else if(!confirmPassword.value) {
	confirmPassword.focus();
	document.getElementById("confirmPassword").innerHTML = "required";
	output = false;
}
if(newPassword.value != confirmPassword.value) {
	newPassword.value="";
	confirmPassword.value="";
	newPassword.focus();
	document.getElementById("confirmPassword").innerHTML = "not same";
	output = false;
} 	
return output;
}
</script>
</head>
<body>

<?php

include 'include/sidebar.php';
$uid =  $_SESSION["id"] ;
?>
          </li>
        </ul>

    <!-- Page Content  -->
  <div id="content" class="p-4 p-md-5">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">

        <button type="button" id="sidebarCollapse" class="btn btn-primary">
          <i class="fa fa-bars"></i>
          <span class="sr-only">Toggle Menu</span>
        </button>
        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="nav navbar-nav ml-auto">
       <h5>Change Password</h5> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
          <a class="nav-link" href="index.php">Go Back</a>
          <a class="nav-link" href="../login/logout.php">Logout</a>
          </ul>
        </div>
      </div>
    </nav>


<center>
    <form name="frmChange" method="post" action=""
        onSubmit="return validatePassword()">
        <div style="width: 500px;">
            <div class="message"><?php if(isset($message)) { echo $message; } ?></div>
            <table border="0" cellpadding="10" cellspacing="0"
                width="500" align="center" class="tblSaveForm">
                <tr class="tableheader">
                    <td colspan="2" style="color:white;">Change Password</td>
                </tr>
                <tr>
                    <td width="40%"><label>Current Password</label></td>
                    <td width="60%"><input type="password"
                        name="currentPassword" class="txtField" /><span
                        id="currentPassword" class="required"></span></td>
                </tr>
                <tr>
                    <td><label>New Password</label></td>
                    <td><input type="password" name="newPassword"
                        class="txtField" /><span id="newPassword"
                        class="required"></span></td>
                </tr>
                <td><label>Confirm Password</label></td>
                <td><input type="password" name="confirmPassword"
                    class="txtField" /><span id="confirmPassword"
                    class="required"></span></td>
                </tr>
                <tr style="text-align: center;">
                    <td colspan="2"><input type="submit" name="submit"
                        value="Submit" class="btnSubmit"></td>
                </tr>
            </table>
        
        </div>
    </form>
    </center>
</body>
</html>