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
  	<title>Leave</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="css/tablemod.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">

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
           <h5>Leave</h5> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
              <a class="nav-link" href="index.php">Go Back</a>
              <a class="nav-link" href="../login/logout.php">Logout</a>
              </ul>
            </div>
          </div>
        </nav>


     <!-- Leave Type And Total Count -->   
    <center>
<table border="2"  >
<tr >
<th style="padding:5px!important">

<h6 style="color:green">Casual</h6>
    </th>
<th style="padding:5px!important">

<h6 style="color:blue">Medical</h6>
</th>

<th style="padding:5px!important">
<h6 style="color:red">Official</h6>
</th>
    </tr>

<tr>
<td >
<center>
  <?php
  include 'php/dbConfig.php';
$sql_qry = "SELECT SUM(nod) AS count,stat 
    FROM images WHERE ltype='casual' AND user_id=$uid"; 
$duration = $db->query($sql_qry);
$record = $duration->fetch_array();
$stat = $record['stat'];
$total = $record['count'];

if($stat=='Approved')
{
echo $total;
}
?>
</center>
</td>

<td>
  <center>
  <?php
  include 'php/dbConfig.php';
$sql_qry = "SELECT SUM(nod) AS count,stat
    FROM images WHERE ltype='medical'AND user_id=$uid"; 
$duration = $db->query($sql_qry);
$record = $duration->fetch_array();
$stat = $record['stat'];
$total = $record['count'];

if($stat=='Approved')
{
echo $total;
}
?>
</center>
</td>

<td>
<center>
  <?php
  include 'php/dbConfig.php';
$sql_qry = "SELECT SUM(nod) AS count,stat 
    FROM images WHERE ltype='Office'AND user_id=$uid"; 
$duration = $db->query($sql_qry);
$record = $duration->fetch_array();
$stat = $record['stat'];
$total = $record['count'];

if($stat=='Approved')
{
echo $total;
}
?>
</center>
</td>

    </tr>  
</table>
</center>



  <!-- Details Enter -->
<div class ="container">
  <div class="upfrm">
    <?php if(!empty($statusMsg)){ ?>
    <p class="status-msg"> <?php echo $statusMsg; ?> </p>
    <?php } ?>
<br><br>
<!--Upload images-->
<form action="php/upload.php?type='leave';" method="post" enctype="multipart/form-data">
<table><tr><td>
 <label style="color:black">Month</label>
</td><td>

<select  name="month" style="color:black;width:216px" class="dash" id="month" required>
<option value="">None</option>
  <option value="january">January</option>
  <option value="february">February</option>
  <option value="march">March</option>
  <option value="aprial">Aprial</option>
  <option value=" may"> May</option>
  <option value="june">June</option>
  <option value="jully">Jully</option>
  <option value="august">August</option>
  <option value="september">September</option>
  <option value="october">October</option>
  <option value="november">November</option>
  <option value="december">December</option>
</select>
</td></tr><tr><td>
<tr><td>
 <label style="color:black">Leave Type</label>
</td><td> 

<select name="ltype" style="color:black;width:216px" class="dash" id="month" required>
<option value="">None</option>
  <option value="casual">Casual</option>
  <option value="medical">Medical</option>
  <option value="Office">Official</option>

</select>
</td></tr><tr><td>
<label style="color:black"> From Date </label></td><td>
<input type = "date" name = "fromDate" style="color:black;" class="dash" required> 
</td></tr><tr><td>
<label style="color:black"> To Date </label></td><td>
<input type = "date" name = "toDate" style="color:black;" class="dash" required > 
<input type = "number" name = "nod" style="color:black;width:180px" class="dash" placeholder="Number of Days" required min="1" max="45"> 

</td></tr>
<tr><td>
<label style="color:black">Leave Form</label></td><td>
      <input type="file" style="color:black;width:405px"  class="dash" name="file"></td></tr> <tr><td></td><td>
      <input type="submit" style="color:black;" class="up btn btn-outline-success" name="submit" value="Upload" onClick="return confirm('Are you sure you want submit this file ?')">
   
 </td></tr> </table>
  </form>
    </div>
    </div>
    </div>
		</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
    