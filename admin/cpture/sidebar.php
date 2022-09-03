
<!-- Add icon library -->
<div style="background-size: cover ;background-image: url('../images/bg.jpg') ; background-repeat: no-repeat;background-attachment: fixed">
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="p-4 pt-5">
		  		<a href="#" class="img logo rounded-circle mb-5" style="background-image: url(../images/logo.jpg);"></a>
	        <ul class="list-unstyled components mb-5">
	          <li class="active">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="../css/tablemod.css">
</head>
<body>
 
	            
<center> <h6 style="color:white">Welcome! <?php  echo $_SESSION['name']; ?> </h6></center>
          <button class="btna"><i class="fa fa-home" style="color:gold;width:210px;height:20px" onclick="document.location='../index.php';"> Dashboard</i></button><br>
          <button class="btna"><i class="fa fa-" style="color:silver;width:210px;height:20px" onclick="document.location='../adminview.php?type=wexpected';">Advanced Program</i></button> 
          <button class="btna"><i class="fa fa-" style="color:silver;width:210px;height:20px" onclick="document.location='../adminview.php?type=pperfromed';">Work Done</i></button><br>

         <button class="btna"><i class="fa fa-" style="color:silver;width:210px;height:20px" onclick="document.location='../adminview.php?type=leave';">Leave</i></button><br>
         <button class="btna"><i class="fa fa-" style="color:silver;width:210px;height:20px" onclick="document.location='../adminview.php?type=efuel';">Extra Fuel</i></button><br>

         <button class="btna"><i class="fa fa-" style="color:silver;width:210px;height:20px" onclick="document.location='../adminview.php?type=ot';">Over Time</i></button><br>
         <button class="btna"><i class="fa fa-" style="color:silver;width:210px;height:20px" onclick="document.location='../adminview.php?type=wworks';">Holiday Pay</i></button><br>
         <marquee behavior="scroll" bgcolor="#1d1919" loop="50" width="95%">
   <i>
      <font color="gold" size="2.5">
        Today's date is : 
        <strong>
         <span id="time"></span>
        </strong>           
      </font>
   </i>
</marquee> 

<script>
  var today = new Date();
document.getElementById('time').innerHTML=today;
</script>
	          </li>

	        </ul>

	      </div>
     </nav> 
  
     </body>
</html>


