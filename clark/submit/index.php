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
<?php 
$rId = $_GET['reqId'];
$_SESSION['rid'] = "65";
$uid =  $_SESSION["id"] ;
include '../php/dbConfig.php';
//need if else query
  $type= $_GET['type'];

  if($type == 'leave')
  {
    $query = $db->query("SELECT * FROM images WHERE id = $rId");
    $tit="Leave Details";

  }else if($type == 'efuel')

  {
    $query = $db->query("SELECT * FROM extra_fuel WHERE id = $rId");
    $tit="Extra Fuel Details";

  }
  else if($type == 'wworks')

  {
    $query = $db->query("SELECT * FROM weekend_works WHERE id = $rId ");
    $tit="Holiday Pay Details";

  }
  else if($type == 'pperfromed')

  {
    $query = $db->query("SELECT * FROM program_perfomed WHERE id = $rId");
    $tit="Work Done Details";

  }
  else if($type == 'wexpected')

  {
    $query = $db->query("SELECT * FROM work_expected WHERE id = $rId");
    $tit="Advanced Program Details";

  }
  else if($type == 'ot')

  {
    $query = $db->query("SELECT * FROM ot WHERE id = $rId");
    $tit="Over Time Details";

  }

  if($query !== false && $query->num_rows > 0){
    while($row=$query->fetch_assoc()){

      $id=$row["id"];

      $imageURL='../../../data/GAP/user/'.$row["file_name"];
      $img='../../../data/GAP/user/'.$row["page2"];
    }
  }
  else{
    ?> 
    <p>No Request.....</p>
    <?php
    
  }
  ?>
    
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/tablemod.css">
  </head>
  <body>
</body>
  <div style="background-size: cover ;background-image: url('../../login/images/bg.jpg') ; background-repeat: no-repeat;background-attachment: fixed">
 <?php
 include 'sidebar.php';
 ?>
 
      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      <script>
      $( function() {
        $( "#draggable" ).draggable();
      } );
      </script>
        
        <!-- Title -->
        <title>Preview</title>
  
        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="assets/plugins/materialize/css/materialize.min.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
       <!-- <link href="assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>-->

<!-- this script helps us to capture any div --> 
<script src="assets/js/html2canvas.js"></script>
<script>
        function allowDrop(ev) {
          ev.preventDefault();
        }
        
        function drag(ev) {
          ev.dataTransfer.setData("text", ev.target.id);
        }
        
        function drop(ev) {
          ev.preventDefault();
          var data = ev.dataTransfer.getData("text");
          ev.target.appendChild(document.getElementById(data));
        }
    </script>

 <style>
 .button {
  background-color: #00d761a8;
  border: none;
  color: white;
  padding: 10px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 13px;
  margin: 4px 2px;
  cursor: pointer;
}
.button1 {background-color: #f44336;}
 #canvas{
   background-color: white;
margin: 0 auto;
}
.movable_div{
color: white;
font-family: Verdana;
cursor: move;
position: absolute;
}
        .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.error {color: #FF0000;}
.test {
  position: relative;
  display: inline-block;
}
    #div1 {
  width: 350px;
  height: 70px;
  padding: 100px;
  border: 1px solid #aaaaaa;
}
        </style>
        <script type="text/javascript">
				function ShowHideDiv(val){
					
					var element=document.getElementById('otheraction');

				 if(val==8){
					 element.style.display='block';
					
				 }   
				 else  {
					 element.style.display='none';
					
				 }
				}

		</script>
    </head> 
     <body>

<img id="scream" width="1" height="1"
src="<?php echo $imageURL; ?>" alt="The Scream">

<canvas id="myCanvas" width="800" height="1123">
</canvas>

<script>
   var canvas = document.getElementById('myCanvas');
      var context = canvas.getContext('2d');
      var x = 1;
      var y = 1;
      var width = 800;
      var height = 1123;
      var imageObj = new Image();

      imageObj.onload = function() {
        context.drawImage(imageObj, x, y, width, height);
      };
      imageObj.src = "<?php echo $imageURL; ?>";
    </script>
  </body>
</script> 
 
<div id="wrapper">
  <div id="container">
    <br>

<!-- Leave Type And Total Count -->   
<?php
if($type == 'leave'){
echo
     ' <center>
     <table border="2">
     <tr>
     <th style="padding:5px!important">
     
     <h6 style="color:green">Casual</h6>
         </th>
     <th style="padding:5px!important">
     
     <h6 style="color:blue">Medical</h6>
     </th>
     
     <th style="padding:5px!important">
     <h6 style="color:red">Official</h6>
     </th>
         </tr>';
         
echo '<tr>
<td>
<center>';

  $usid= $_GET['usid'];
  include '../php/dbConfig.php';
$sql_qry = "SELECT SUM(nod) AS count,stat
    FROM images WHERE ltype='casual' AND user_id=$usid"; 
$duration = $db->query($sql_qry);
$record = $duration->fetch_array();
$stat = $record['stat'];
$total = $record['count'];

if($stat=='Approved')
{
echo $total;
}
echo '</center>
</td>

<td>
  <center>';

  include '../php/dbConfig.php';
$sql_qry = "SELECT SUM(nod) AS count,stat 
    FROM images WHERE ltype='medical'AND user_id=$usid"; 
$duration = $db->query($sql_qry);
$record = $duration->fetch_array();
$stat = $record['stat'];
$total = $record['count'];

if($stat=='Approved')
{
echo $total;
}

echo '</center>
</td>

<td>
<center>';
  
  include '../php/dbConfig.php';
$sql_qry = "SELECT SUM(nod) AS count,stat 
    FROM images WHERE ltype='Office'AND user_id=$usid"; 
$duration = $db->query($sql_qry);
$record = $duration->fetch_array();
$stat = $record['stat'];
$total = $record['count'];

if($stat=='Approved')
{
echo $total;
}

echo'

</center>
</td>

    </tr>  
</table>
</center>';
}

?>

<?php
echo '<form  method="post" enctype="multipart/form-data">
<br><br><br><br><br>&emsp;' ?>

<input type="button" id="apr" name="approveBtn" value="Send for Approval" class="button" style="height:60px;Width:210px">

<?php
echo'
<input type="hidden" name="rId" id="rId" value="'.$rId.'">
<input type="hidden" name="type" id="type" value="'.$type.'">';
?>
</form> 

<br><br><br>

   <?php
echo '<form action="../reason.php?rId=',$rId,'&& type=',$type,'"  method="post" enctype="multipart/form-data">
&emsp;'; ?><textarea name="r_reason" rows="5" cols="22" class="dasho" placeholder="Type Your Comment Here...!" required></textarea><br>
&emsp; 

<input type="submit" name="reject" class="button" value="Send Back" style="height:60px;Width:210px" onClick="return confirm('Are you sure you want submit this file ?')">

</form>

    </div>
    </div>

<script>
  var canvas = document.getElementById('myCanvas'),
    ctx = canvas.getContext('2d'),
    font = '14px sans-serif',
    hasInput = false;

canvas.onclick = function(e) {
    if (hasInput) return;
    addInput(e.clientX,e.offsetY);
}

//Function to dynamically add an input box: 
function addInput(x, y) {

    var input = document.createElement('input');

    input.type = 'text';
    input.style.position = 'absolute';
    input.style.left = (x - 1) + 'px';
    input.style.top = (y - 1) + 'px';

    input.onkeydown = handleEnter;

    document.body.appendChild(input);

    input.focus();

    hasInput = true;
}

//Key handler for input box:
function handleEnter(e) {
    var keyCode = e.keyCode;
    if (keyCode === 13) {
        drawText(this.value, parseInt(this.style.left, 10), parseInt(this.style.top, 10));
        document.body.removeChild(this);
        hasInput = false;
    }
}
//Draw the text onto canvas:
function drawText(txt, x, y) {
    ctx.textBaseline = 'top';
    ctx.textAlign = 'left';
    ctx.font = font;
    ctx.fillText(txt, x - 300, y - 1);
}
</script>



<div id="draggable" class="movable_div">
                </div>
                </div>

       <br>         

              
<script type="text/javascript"> 
$(function(){
   
   $('.movable_div').draggable(
{scroll: false}
);

//here is the hero, after the capture button is clicked
//he will take the screen shot of the div and save it as image.
$('#capture').click(function(){
//get the div content
div_content = document.querySelector("#canvas")
//make it as html5 canvas
html2canvas(div_content).then(function(canvas) {
//change the canvas to jpeg image
data = canvas.toDataURL('image/jpeg');

//then call a super hero php to save the image
save_img(data);
});
}); 
});

//to save the canvas image
function save_img(data){
//ajax method.
$.post('save_jpg.php', {data: data}, function(res){
document.cookie = "name=" + res;

if(res != ''){
   alert('Approved image saved! It will send after approval');
 
}
else{
alert('something wrong');
}

});
}
    </script>
    
    <script>
function enableButton() {
  document.getElementById("submit").disabled = false;
  document.getElementById("capture").disabled = true;
  
}
</script>

   <style>.top{margin-top:10px;}</style>
      
      <script>
         $("#apr").click(function(){
        var cn=confirm (" Are you sure you want submit this file ? ") 
        if (cn== true ) {

        html2canvas($("#myCanvas"), {
         	onrendered: function(canvas) {
         	var imgsrc = canvas.toDataURL("image/png");
          var rId = $('#rId').val();
          var type = $('#type').val();
         	console.log(imgsrc);
         	
         var dataURL = canvas.toDataURL();  
            $.ajax({
              
           type: "POST",
           url: "../script.php",
           data: { 
              imgBase64: dataURL,
              rId: rId,
              type: type
           }
         }).done(function(o) {
          
          alert("Send Successfully");
          window.location.href = "../index.php";

         });
         }
         });


}

        
         });
      </script>
     <center>&emsp;&emsp;&emsp;&emsp;<img id="Page 1" width="800" height="800" src="<?php echo $img; ?>" alt="." ></center>

    </body>
</html>
