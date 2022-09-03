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
  	<title>Print</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="css/tablemod.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/tablemod.css">


    <script>
        function printDiv() {
            var divContents = document.getElementById("GFG").innerHTML;
            var a = window.open('', '', 'height=720, width=1280');
            a.document.write('<html>');
            a.document.write('<body > <h1><br>');
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }
    </script>


  </head>
  <body>
	
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
              <a class="nav-link"  onclick="window.history.back()">Go Back</a>
              </ul>
            </div>
          </div>
          
        </nav>
       
    
  <!-- Database View -->
  
  <?php

  include 'php/dbConfig.php';
  
  $rId = $_GET['reqId'];
  $uid =  $_SESSION["id"] ;

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
    $imageURL='../../data/GAP/ga/'.$row["new_name"];
    $img='../../../data/GAP/user/'.$row["page2"];
     
echo'<h5>&nbsp;Preview</h5>';
echo '<div id="GFG"> ';

    if(empty($row["page2"]))
    {
    echo "<img id='Page 1 width='800' height='800' src='$imageURL' alt='.' >";
    }
    else
    {
      echo "<img id='Page 1' width='570' height='800' src='$img' alt='.' >";
      echo "<img id='Page 1 width='800' height='800' src='$imageURL' alt='.' >";
    }
echo'</div>';

    }
  }
  else{
    ?> 
    <p>No Preview.....</p>
    <?php
  }

  ?>


<!-- canvas -->



<!-- print -->

</head>
<body>
    <div style="width: 400px; float: left;">
       
    <center>
<input class="myButton" type="button" value="Print" onclick="printDiv()"> 
</center>
     
      </form>
      </div>
    
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
    
