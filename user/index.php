<?php

include 'php/upload.php';
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    if (strlen($_SESSION['id']==0)) {
      header('<location:login/logout.php');
      } else{
      } 
?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Select</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link rel="stylesheet" href="css/tablemod.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/refmod.css">
  </head>
  <body>

  <div style="background-size: cover ;background-image: url('images/bg.jpg') ; background-repeat: no-repeat;background-attachment: fixed">
<?php
 $uid =  $_SESSION["id"] ;
 include 'include/sidebar.php';
?>
 
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
			  <h5>Select Reason</h5>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;

        <a class="nav-link" href="change_pw.php">Change Your Password</a>
              <a class="nav-link" href="../login/logout.php">Logout</a>
                
              </ul>
            </div>
          </div>
        </nav>
<br><br>

        <table align="center">
	<tr>
	<td>
		<!-- Request form card  -->
			<div class="card">
			<?php
          $sql = "SELECT COUNT(isRead) as isRead  FROM work_expected WHERE isRead = 1 AND user_id = $uid";
          $result = $db ->query($sql);
          
          if ($result !== false && $result->num_rows > 0) {
              // output data of each row
              
              while($row = $result->fetch_assoc()) {
                echo 'Approval Status : <span style="color:red;text-align:center;">'. $row["isRead"]. "<br>";
              }
          } else {
              echo "0 results";
          }      
      
         ?>     <input type="button" style="color:black" class="sel" onclick="location.href='view.php?type=wexpected';" value="View Approval"/>
		 <input type="button" style="color:black" class="ll" onclick="location.href='view/tbl.php?type=wexpected';" value="View Request"/> 
			<p><button onclick="document.location='work_expected.php';">Advanced Program</button></p>
			</div>
		</td>
    <td>
		<!-- model papers card  -->
			<div class="card">
			<?php
          $sql = "SELECT COUNT(isRead) as isRead  FROM program_perfomed WHERE isRead = 1 AND user_id = $uid ";
          $result = $db ->query($sql);
          
          if ($result !== false && $result->num_rows > 0) {
              // output data of each row
              
              while($row = $result->fetch_assoc()) {
                echo 'Approval Status : <span style="color:red;text-align:center;">'. $row["isRead"]. "<br>";
              }
          } else {
              echo "0 results";
          }      
      
         ?> <input type="button" style="color:black" class="sel" onclick="location.href='view.php?type=pperfromed';" value="View Approval"/>
		 <input type="button" style="color:black" class="ll" onclick="location.href='view/tbl.php?type=pperfromed';" value="View Request"/> 
			 <p><button style="height: 90px;"  onclick="document.location='programe_performed.php';">Work Done</button></p>
			</div>
		</td>
		



		<td>
		<!-- New Updates card  -->
			<div class="card">
			<?php
		      $uid =  $_SESSION["id"] ;
          $sql = "SELECT COUNT(isRead) as isRead  FROM images WHERE isRead = 1 AND user_id = $uid ";
          $result = $db ->query($sql);
          
          if ($result !== false && $result->num_rows > 0) {
              // output data of each row
              
              while($row = $result->fetch_assoc()) {
                echo 'Approval Status : <span style="color:red;text-align:center;">'. $row["isRead"]. "<br>";
              }
          } else {
              echo "0 results";
          }      
         ?>
			<input type="button" style="color:black" class="sel" onclick="location.href='view.php?type=leave';" value="View Approval"/>
     <input type="button" style="color:black" class="ll" onclick="location.href='view/tbl.php?type=leave';" value="View Request"/> 
			 <p><button  style="height:90px" onclick="document.location='leave.php';">Leave</button></p>
			</div>
		</td>
		
		<td>
		<!-- books card  -->
			<div class="card">
			<?php
          $sql = "SELECT COUNT(isRead) as isRead  FROM extra_fuel WHERE isRead = 1 AND user_id = $uid ";
          $result = $db ->query($sql);
          
          if ($result !== false && $result->num_rows > 0) {
              // output data of each row
              
              while($row = $result->fetch_assoc()) {
                echo 'Approval Status : <span style="color:red;text-align:center;">'. $row["isRead"]. "<br>";
              }
          } else {
              echo "0 results";
          }      
      
         ?> <input type="button" style="color:black" class="sel" onclick="location.href='view.php?type=efuel';" value="View Approval"/>
		 <input type="button" style="color:black" class="ll" onclick="location.href='view/tbl.php?type=efuel';" value="View Request"/>
			<p><button  style="height:90px" onclick="document.location='extra_fuel.php';">Extra Fuel</button></p>
			</div>
		</td>
		
		<td>
		<!-- past papers card  -->
			<div class="card">
			<?php
          $sql = "SELECT COUNT(isRead) as isRead  FROM ot WHERE isRead = 1 AND user_id = $uid";
          $result = $db ->query($sql);
          
          if ($result !== false && $result->num_rows > 0) {
              // output data of each row
              
              while($row = $result->fetch_assoc()) {
                echo 'Approval Status : <span style="color:red;text-align:center;">'. $row["isRead"]. "<br>";
              }
          } else {
              echo "0 results";
          }      
      
         ?>     <input type="button" style="color:black" class="sel" onclick="location.href='view.php?type=ot';" value="View Approval"/>
		 <input type="button" style="color:black" class="ll" onclick="location.href='view/tbl.php?type=ot';" value="View Request"/>
			<p><button  style="height:90px" onclick="document.location='ot.php';">Over Time</button></p>
			</div>
		</td>
	
	
		
		
		<td>
		<!-- Store card  -->
			<div class="card">
			<?php
          $sql = "SELECT COUNT(isRead) as isRead  FROM weekend_works WHERE isRead = 1 AND user_id = $uid";
          $result = $db ->query($sql);
          
          if ($result !== false && $result->num_rows > 0) {
              // output data of each row
              
              while($row = $result->fetch_assoc()) {
                echo 'Approval Status : <span style="color:red;text-align:center;">'. $row["isRead"]. "<br>";
              }
          } else {
              echo "0 results";
          }      
      
         ?>
			<input type="button" style="color:black" class="sel" onclick="location.href='view.php?type=wworks';" value="View Approval"/>
     <input type="button" style="color:black" class="ll" onclick="location.href='view/tbl.php?type=wworks';" value="View Requests"/>
			<p><button style="height: 90px;" onclick="document.location='weekend_works.php';">Holiday Pay</button></p>
			</div>
		</td>
	
	</tr>

</table>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
    