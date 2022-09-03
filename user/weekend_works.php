<?php

include 'php/wwupload.php';
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
  	<title>Holiday Pay</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/tablemod.css">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
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
       <h5>Holiday Pay</h5>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
          <a class="nav-link" href="index.php">Go Back</a>
          <a class="nav-link" href="../login/logout.php">Logout</a>
          </ul>
        </div>
      </div>
    </nav>

    
  <!-- Details Enter -->

<div class ="container">
  <div class="upfrm">
    <?php if(!empty($statusMsg)){ ?>
      <p class="status-msg"> <?php echo $statusMsg; ?> </p>
      <?php } ?>

<!--Upload images-->
    <form action="php/wwupload.php" method="post" enctype="multipart/form-data">
    
    <code>* Please note that if you have one page it should be uploaded into the page number 2 </code> <br><br>
<table><tr><td>
 <label style="color:black">Month</label>
</td><td>

<select name="month" style="color:black;" class="dash" id="month" required>
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
</select></tr><tr><td>
  <label style="color:black">Page 1</label>
  </td><td>
  <input type="file" name="file2" style="color:black;" class="dash"><br>
      </tr><tr><td>
    <label style="color:black">Page 2</label> </td><td> 
    <input type="file" name="file" style="color:black;" class="dash">
	  <td></tr><tr><td></td><td>
<td></tr><tr><td></td><td>
      <input type="submit" name="submit" value="Upload" style="color:black;" class="up btn btn-outline-success" onClick="return confirm('Are you sure you want submit this file ?')">
     
     </td></tr></table>   
     
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
    