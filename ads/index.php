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
  	<title>Additional District Secretariat</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/tablemod.css">
  </head>
  <body> 
  <div style="background-size: cover ;background-image: url('images/bg.jpg') ; background-repeat: no-repeat;background-attachment: fixed">

	<?php
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
              <h5>View Page</h5> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
              <a class="nav-link" href="change_pw.php">Change Your Password</a>

              <a class="nav-link" href="../login/logout.php">Logout</a>
               
              </ul>
              </div>
             </div>
        </nav>
<br>
   <!-- Show Dashboard -->
        <div class="gallery">
          <div class = "gcon">
          <center>
        <table id="customers">
        <tr>
      <!--  <th>Advanced Program</th>  -->
       <th>   <center>Holiday Pay </center></th> 
       
          
       </tr>
  
  
      

     

       
       <!--   <td>
    
      <?php

      /*
          $sql = "SELECT COUNT(isRead) as isRead  FROM work_expected WHERE isRead = 2 ";
          $result = $db ->query($sql);
          
          if ($result !== false && $result->num_rows > 0) {
             
              while($row = $result->fetch_assoc()) {
                echo '<span style="color:black;text-align:center;font-size: 16px;">New : <span style="color:red;text-align:center;">'. $row["isRead"]. '</span>';
              }
          } else {
              echo "0 results";
          }      
      */
      ?>
       </td> -->

       <td>
      <!--count-->
      <?php
          $sql = "SELECT COUNT(isRead) as isRead  FROM weekend_works WHERE isRead = 2 ";
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
       </td>

  </tr>
</tr>

<tr>
     
     
     
    <!--  <td>
           <input style="color:black;width:120px" type="button" class="gobtn" onclick="location.href='adminview.php?type=wexpected';" value="View" /> 
      </td>-->
      <td>
          <input style="color:black;width:120px" type="button" class="gobtn" onclick="location.href='adminview.php?type=wworks';" value="View" />
      </td>
  </tr>
   
      </table>
      </center>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>