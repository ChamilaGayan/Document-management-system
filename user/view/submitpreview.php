<?php
include '../php/upload.php';
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
  	<title>view</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <div style="background-size: cover ;background-image: url('../images/bg.jpg') ; background-repeat: no-repeat;background-attachment: fixed">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="css/tablemod.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="../css/tablemod.css">
  </head>
  <body>
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
              <a class="nav-link"  onclick="window.history.back()">Go Back</a>
              </ul>
            </div>
          </div>
          
        </nav>
       
  <!-- Database View -->
  <?php

  include '../php/dbConfig.php';
  
  $rId = $_GET['reqId'];
  

  $type= $_GET['type'];
  if($type == 'leave')
  {
   $query = $db->query("SELECT * FROM images WHERE id = $rId ");
  }else if($type == 'efuel')

  {
    $query = $db->query("SELECT * FROM extra_fuel WHERE id = $rId");
  }
  else if($type == 'wworks')

  {
    $query = $db->query("SELECT * FROM weekend_works WHERE id = $rId");
  }
  else if($type == 'pperfromed')

  {
    $query = $db->query("SELECT * FROM program_perfomed WHERE id = $rId");
  }
  else if($type == 'wexpected')

  {
    $query = $db->query("SELECT * FROM work_expected WHERE id = $rId");
  }
  else if($type == 'ot')

  {
    $query = $db->query("SELECT * FROM ot WHERE id = $rId");
  }

  if($query !== false && $query->num_rows > 0){
    while($row=$query->fetch_assoc()){
      $imageURL='../../../data/GAP/user/'.$row["file_name"];
      $img='../../../data/GAP/user/'.$row["page2"];
     
    }
  }
  else{
    ?> 
    <p>No Preview.....</p>
    <?php
  }

  ?>




<img id="Page 1" width="720" height="700"
src="<?php echo $img; ?>" alt=".">

<br><br>

<!-- canvas -->

<img id="scream" width="1" height="1"
src="<?php echo $imageURL; ?>" alt="Page 1">
<canvas id="myCanvas" width="720" height="720"
style="border:1px solid #d3d3d3;">
</canvas>

<script>
window.onload = function() {
    var canvas = document.getElementById("myCanvas");
    var ctx = canvas.getContext("2d");
    var img = document.getElementById("scream");
  // ctx.drawImage(img, 10, 10);

   var scale = Math.min(canvas.width / img.width, canvas.height / img.height);
    // get the top left position of the image
    var x = (canvas.width / 2) - (img.width / 2) * scale;
    var y = (canvas.height / 2) - (img.height / 2) * scale;
    ctx.drawImage(img, x, y, img.width * scale, img.height * scale);
};
</script>


    
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
    
