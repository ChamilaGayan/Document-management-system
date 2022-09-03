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

<?php
$uid =  $_SESSION["id"] ;
          include 'php/dbConfig.php';
          
          $type= $_GET['type'];
          if($type == 'leave')
          {

          $query = $db->query("SELECT * FROM images WHERE isRead = 1 AND user_id = $uid ORDER BY id DESC");
          
          $tit="Leave Details";
         
          }else if($type == 'efuel')

          {
            $query = $db->query("SELECT * FROM extra_fuel WHERE isRead = 1 AND user_id = $uid ORDER BY id DESC");
            $tit="Extra Fuel Details";
          }
          else if($type == 'wworks')

          {
            $query = $db->query("SELECT * FROM weekend_works WHERE isRead = 1 AND user_id = $uid ORDER BY id DESC");
            $tit="Weekend Works Details";
          }
          else if($type == 'pperfromed')

          {
            $query = $db->query("SELECT * FROM program_perfomed WHERE isRead = 1 AND user_id = $uid ORDER BY id DESC");
            $tit="Program Performed Details";
          }
          else if($type == 'wexpected')

          {
            $query = $db->query("SELECT * FROM work_expected WHERE isRead = 1 AND user_id = $uid ORDER BY id DESC");
            $tit="Work Expected Details";
          }
          else if($type == 'ot')

          {
            $query = $db->query("SELECT * FROM ot WHERE isRead = 1 AND user_id = $uid ORDER BY id DESC");
            $tit="Over Time Details";
          }

          ?>

<!doctype html>
<html lang="en">
  <head>
  	<title>View Approval</title>
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
    include 'include/sidebar2.php';
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
                
              &nbsp;<h5><?php echo $tit; ?></h5>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
              
              <a class="nav-link" href="index.php">Go Back</a>
                
              </ul> 
            </div>
          </div>
        </nav>
       
  <!-- Database View -->
  <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search Month Here" title="Search">

<table id="myTable">
  <tr class="header">
            <th>
              Month
            </th> 
             <th>
              ID
            </th>
            <th>
            Divisional Secretariat
            </th>
           
            <th>
              Reason Not Approved
            </th>
            <th>
              Uplaoded Date
            </th>
            <th>
           Status
            </th>
            <th>
           <center>   View  </center>
            </th>
			</tr>
  <tr>
  <?php
if($query->num_rows>0){
  while($row=$query->fetch_assoc()){
$stat=$row["stat"];

    echo "<tr>
    <td>". $row["month"]. "</td>
    <td>". $row["id"]. "</td>
    <td>". $row["roll"] ."</td>
    <td>". $row["r_reason"]. "</td>
    <td>". $row["uploaded_on"]. "</td>
    <td style=color:red>". $row["stat"]. "</td>
    <td><center> ";   
    
   
   
    
    if($stat=='Approved')
    
    
    
   echo "<a href='print.php?type=$type&&reqId=".$row["id"]."'> View </a> </center> </td>
    </tr> ";        
  }
}
else{ 
echo "No requests";
}

?>
  </tr>
</table>

<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
<br><br> 

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
    