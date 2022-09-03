<?php
include 'php/upload.php';
?>
<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
  $_SESSION['type'] = "type";
?>
<!doctype html>
<html lang="en">
  <head>
  	<title>MSO</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/tablemod.css">
  </head>
  <body> 
  <div style="background-size: cover ;background-image: url('login/images/bg.jpg') ; background-repeat: no-repeat;background-attachment: fixed">

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
              <h5>Request Summary</h5>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
              <a class="nav-link" href="change_pw.php">Change Your Password</a>

              <a class="nav-link" href="../login/logout.php">Logout</a>
               
              </ul>
              </div>
             </div>
        </nav>

   <!-- Show Dashboard -->
        <div class="gallery">
          <div class = "gcon">
          
        <table  id="customers" class="table">
        <tr>
        <th>Advanced Program</th>
        <th>Work Done</th>
          <th>Leave <br></th>
          <th>Extra Fuel</th>
          
          <th>Over Time</th>
          <th>Holiday Pay</th>
          
         
       </tr> 
  <tr>

  <td>
          <input type="button" class="gobtn" onclick="location.href='adminview.php?type=wexpected';" value="View" />
      </td>
      <td>
          <input type="button" class="gobtn" onclick="location.href='adminview.php?type=pperfromed';" value="View" />
      </td>
      <td>
          <input type="button" class="gobtn" onclick="location.href='adminview.php?type=leave';"  value="View" />  
      </td>
      <td>
          <input type="button" class="gobtn" onclick="location.href='adminview.php?type=efuel';" value="View" />
      </td>
    
     
      
      <td>
          <input type="button" class="gobtn" onclick="location.href='adminview.php?type=ot';" value="View" />
      </td>
      <td>
          <input type="button" class="gobtn" onclick="location.href='adminview.php?type=wworks';" value="View" />
      </td>
  </tr>
        
  <tr>
  <td>
      <!--count-->
      <?php
          $sql = "SELECT COUNT(isRead) as isRead  FROM work_expected WHERE isRead = 0";     
          $result = $db ->query($sql);
          
          if ($result !== false && $result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                echo '<span style="color:black;text-align:center;font-size: 16px;">New : <span style="color:red;text-align:center;">'. $row["isRead"]. '</span>';
              }
          } else {
              echo "0 results";
          }      
      
      ?>
<br>
<?php
          $sql = "SELECT COUNT(isRead) as isRead  FROM work_expected WHERE isRead = 5";     
          $result = $db ->query($sql);
          
          if ($result !== false && $result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                echo '<span style="color:black;text-align:center;font-size: 16px;">Recorrection : <span style="color:blue;text-align:center;">'. $row["isRead"]. '</span>';
              }
          } else {
              echo "0 results";
          }      
      
      ?>
       </td>
       
       <td>
      <!--count-->
      <?php
          $sql = "SELECT COUNT(isRead) as isRead  FROM program_perfomed WHERE isRead = 0 ";    
          $result = $db ->query($sql);
          
          if ($result !== false && $result->num_rows > 0) {
              // output data of each row
              
              while($row = $result->fetch_assoc()) {
                echo '<span style="color:black;text-align:center;font-size: 16px;">New : <span style="color:red;text-align:center;">'. $row["isRead"]. '</span>';
              }
          } else {
              echo "0 results";
          }      
      
      ?>
      <br>
      <?php
          $sql = "SELECT COUNT(isRead) as isRead  FROM program_perfomed WHERE isRead = 5 ";    
          $result = $db ->query($sql);
          
          if ($result !== false && $result->num_rows > 0) {
              // output data of each row
              
              while($row = $result->fetch_assoc()) {
                echo '<span style="color:black;text-align:center;font-size: 16px;">Recorrection : <span style="color:blue;text-align:center;">'. $row["isRead"]. '</span>';
              }
          } else {
              echo "0 results";
          }      
      
      ?>
       </td>

      <td>
      <!--count-->
      <?php
          $sql = "SELECT COUNT(isRead) as isRead  FROM images WHERE isRead = 0  ";      
          $result = $db ->query($sql);
          
          if ($result !== false && $result->num_rows > 0) {
              // output data of each row
              
              while($row = $result->fetch_assoc()) {
                echo '<span style="color:black;text-align:center;font-size: 16px;">New : <span style="color:red;text-align:center;">'. $row["isRead"]. '</span>';
              }
          } else {
              echo "0 results";
          }      
       ?>
       <br>
        <?php
          $sql = "SELECT COUNT(isRead) as isRead  FROM images WHERE isRead = 5  ";      
          $result = $db ->query($sql);
          
          if ($result !== false && $result->num_rows > 0) {
              // output data of each row
              
              while($row = $result->fetch_assoc()) {
                echo '<span style="color:black;text-align:center;font-size: 16px;">Recorrection : <span style="color:blue;text-align:center;">'. $row["isRead"]. '</span>';
              }
          } else {
              echo "0 results";
          }      
       ?>
       </td>
       <td>
      <!--count-->
      <?php
          $sql = "SELECT COUNT(isRead) as isRead  FROM extra_fuel WHERE isRead = 0";       
          $result = $db ->query($sql);
          
          if ($result !== false && $result->num_rows > 0) {
              // output data of each row
              
              while($row = $result->fetch_assoc()) {
                echo '<span style="color:black;text-align:center;font-size: 16px;">New : <span style="color:red;text-align:center;">'. $row["isRead"]. '</span>';
              }
          } else {
              echo "0 results";
          }      
      ?>
      <br>
      <?php
          $sql = "SELECT COUNT(isRead) as isRead  FROM extra_fuel WHERE isRead = 5";       
          $result = $db ->query($sql);
          
          if ($result !== false && $result->num_rows > 0) {
              // output data of each row
              
              while($row = $result->fetch_assoc()) {
                echo '<span style="color:black;text-align:center;font-size: 16px;">Recorrection : <span style="color:blue;text-align:center;">'. $row["isRead"]. '</span>';
              }
          } else {
              echo "0 results";
          }      
      ?>
       </td>

    

       
       <td>
      <!--count-->
      <?php
          $sql = "SELECT COUNT(isRead) as isRead  FROM ot WHERE isRead = 0 ";          
          $result = $db ->query($sql);
          
          if ($result !== false && $result->num_rows > 0) {
              // output data of each row
              
              while($row = $result->fetch_assoc()) {
                echo '<span style="color:black;text-align:center;font-size: 16px;">New : <span style="color:red;text-align:center;">'. $row["isRead"]. '</span>';
              }
          } else {
              echo "0 results";
          }      
      
      ?>
      <br>
      <?php
          $sql = "SELECT COUNT(isRead) as isRead  FROM ot WHERE isRead = 5 ";          
          $result = $db ->query($sql);
          
          if ($result !== false && $result->num_rows > 0) {
              // output data of each row
              
              while($row = $result->fetch_assoc()) {
                echo '<span style="color:black;text-align:center;font-size: 16px;">Recorrection : <span style="color:blue;text-align:center;">'. $row["isRead"]. '</span>';
              }
          } else {
              echo "0 results";
          }      
      
      ?>
       </td>
       <td>
      <!--count-->
      <?php
          $sql = "SELECT COUNT(isRead) as isRead  FROM weekend_works WHERE isRead = 0 ";     
          $result = $db ->query($sql);
          
          if ($result !== false && $result->num_rows > 0) {
              // output data of each row
              
              while($row = $result->fetch_assoc()) {
                echo '<span style="color:black;text-align:center;font-size: 16px;">New : <span style="color:red;text-align:center;">'. $row["isRead"]. '</span>';
              }
          } else {
              echo "0 results";
          }      
      
       ?>
<br>
<?php
          $sql = "SELECT COUNT(isRead) as isRead  FROM weekend_works WHERE isRead = 5 ";     
          $result = $db ->query($sql);
          
          if ($result !== false && $result->num_rows > 0) {
              // output data of each row
              
              while($row = $result->fetch_assoc()) {
                echo '<span style="color:black;text-align:center;font-size: 16px;">Recorrection : <span style="color:blue;text-align:center;">'. $row["isRead"]. '</span>';
              }
          } else {
              echo "0 results";
          }      
      
       ?>
       </td>
  </tr>
</tr>
   
      </table>
      <br>
  <center>  <h5>View All Summary</h5> </center>
      <table id="customers" class="table">
        <tr>
        <th>
        <input style="height:50px" type="button" class="view" onclick="location.href='view.php?type=wexpected';" value="Advanced Program" /> 
        </th>
        <th>
        <input style="height:50px" type="button" class="view" onclick="location.href='view.php?type=pperfromed';" value="Work Done" /> 
        </th>
          <th><input style="height:50px" type="button" class="view" onclick="location.href='view.php?type=leave';" value="Leave" /> </th>
        </th>
          <th><input style="height:50px" type="button" class="view" onclick="location.href='view.php?type=efuel';" value="Extra Fuel" /> 
        </th>
      
       
        
        <th>
        <input style="height:50px" type="button" class="view" onclick="location.href='view.php?type=ot';" value="Over Time" /> 
        </th>
        <th>
        <input style="height:50px" type="button" class="view" onclick="location.href='view.php?type=wworks';" value="Holiday Pay" /> 
        </th>
        </tr>
        </table>
     
     

    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    
  </body>
</html>