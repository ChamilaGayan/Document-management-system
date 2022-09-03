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
          include 'php/dbConfig.php';
          $type= $_GET['type'];
          
          if($type == 'leave')
          {
          $query = $db->query("SELECT * FROM images WHERE isRead = 2");
          $tit="Leave Details";
          }else if($type == 'efuel')
          {
            $query = $db->query("SELECT * FROM extra_fuel WHERE isRead = 2");
            $tit="Extra Fuel Details";
          }
          else if($type == 'wworks')

          {
            $query = $db->query("SELECT * FROM weekend_works WHERE isRead = 4");
            $tit="Holiday Pay Details";
          }
          else if($type == 'pperfromed')

          {
            $query = $db->query("SELECT * FROM program_perfomed WHERE isRead = 2");
            $tit="Work Done Details";
          }
          else if($type == 'wexpected')

          {
            $query = $db->query("SELECT * FROM work_expected WHERE isRead = 2");
            $tit="Advanced Program Details";
          }
          else if($type == 'ot')

          {
            $query = $db->query("SELECT * FROM ot WHERE isRead = 2");
            $tit="Over Time Details";
          }
          ?>


<!doctype html>
<html lang="en">
  <head>
  	<title>View Requests</title>
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
                
              &nbsp;<h5><?php echo $tit; ?></h5>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
              
              <a class="nav-link" href="index.php">Go Back</a>
                
              </ul>
            </div>
          </div>
        </nav>
    
  <!-- Database View -->
  <table border = 1px style="width:100%" >

				<tr>
         
            <th>
            Divisional Secretariat
            </th>
            <th>
              Uplaoded Date
            </th>     
            <th>
           <center>   View  </center>
            </th>
            <?php
            if($query->num_rows>0){
            while($row=$query->fetch_assoc()){
              $row["id"];
             $row["user_id"];
              echo "<tr>
           
              <td>". $row["roll"] ."</td>
              <td>". $row["uploaded_on"]. "</td>
              <td> <center> <a href='cpture/index.php?type=$type&&reqId=".$row["id"]."&&usid=".$row["user_id"]."'> View </a> </center> </td>
              </tr>";           
            }
          }
          else{ 
          echo "No Records";
          }
          ?>
			</tr>
     
</table>
<br><br> 


    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
    