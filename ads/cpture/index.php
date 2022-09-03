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


$rId = $_GET['reqId'];


include '../php/dbConfig.php';
//need if else query
  $type= $_GET['type'];

  if($type == 'wworks')

  {
    $query = $db->query("SELECT * FROM weekend_works WHERE id = $rId");
    $tit="Weekend Works Details";

  }
  
  else if($type == 'wexpected')

  {
    $query = $db->query("SELECT * FROM work_expected WHERE id = $rId");
    $tit="Work Expected Details";

  }
  

  if($query !== false && $query->num_rows > 0){
    while($row=$query->fetch_assoc()){

      $id=$row["id"];

      $imageURL='../../../data/GAP/mso/'.$row["clark"];
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
  <div style="background-size: cover ;background-image: url('../images/bg.jpg') ; background-repeat: no-repeat;background-attachment: fixed">
  <?php
 include 'sidebar.php';
?>
      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>



    









     
        
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
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 10px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
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
      
<table>
<td>
<img id="Page 1" width="800" height="800" src="<?php echo $img; ?>" alt="." >
 
<div id="canvas" style="width:800px; height: 1123px;;"><img src="<?php echo $imageURL; ?>" >









<style>
  
  
  
   
  #item {



    width: 100%;
  height: 150px;
  background-image: url('ga_sign.png');
  background-repeat: no-repeat;
  background-size: contain;




    touch-action: none;
    user-select: none;
  }
 
  #item:hover {
    cursor: pointer;
    border-width: 20px;
  }
</style>
</head>

<body>

<div id="outerContainer">
  <div id="container">
    <div id="item" class="movable_div">

    </div>
  </div>
</div>

<script>
  var dragItem = document.querySelector("#item");
  var container = document.querySelector("#container");

  var active = false;
  var currentX;
  var currentY;
  var initialX;
  var initialY;
  var xOffset = 0;
  var yOffset = 0;

  container.addEventListener("touchstart", dragStart, false);
  container.addEventListener("touchend", dragEnd, false);
  container.addEventListener("touchmove", drag, false);

  container.addEventListener("mousedown", dragStart, false);
  container.addEventListener("mouseup", dragEnd, false);
  container.addEventListener("mousemove", drag, false);

  function dragStart(e) {
    if (e.type === "touchstart") {
      initialX = e.touches[0].clientX - xOffset;
      initialY = e.touches[0].clientY - yOffset;
    } else {
      initialX = e.clientX - xOffset;
      initialY = e.clientY - yOffset;
    }

    if (e.target === dragItem) {
      active = true;
    }
  }

  function dragEnd(e) {
    initialX = currentX;
    initialY = currentY;

    active = false;
  }

  function drag(e) {
    if (active) {
    
      e.preventDefault();
    
      if (e.type === "touchmove") {
        currentX = e.touches[0].clientX - initialX;
        currentY = e.touches[0].clientY - initialY;
      } else {
        currentX = e.clientX - initialX;
        currentY = e.clientY - initialY;
      }

      xOffset = currentX;
      yOffset = currentY;

      setTranslate(currentX, currentY, dragItem);
    }
  }

  function setTranslate(xPos, yPos, el) {
    el.style.transform = "translate3d(" + xPos + "px, " + yPos + "px, 0)";
  }
</script>










<!-- <div id="draggable" class="movable_div">
<br><img src="ga_sign.png" style="width:220px; height:160px;">
    
                </div> -->
                </div>
<br><br>
                <?php
echo '<form  method="post" enctype="multipart/form-data">
   <input type="button" id="apr" name="approveBtn" value="Approve" class="button" style="float: right;">
   <input type="hidden" name="rId" id="rId" value="'.$rId.'">
   <input type="hidden" name="type" id="type" value="'.$type.'">';
?>
   </form>
   <div class="input-field col s12">
                 <input type="button" value="Sign" id="capture" style="float: right;" onclick="enableButton()" class="button"/>
                 </div> 
                </td>
                
                </tr>
                                                       
                </tbody>
                </table><br><br><br><br><br><br><br>

										<textarea id="otheraction" name="otheraction" rows="5" cols="50" style='display:none;'></textarea>

										
                  </div><br>
                
                </div>
                  
                <br>
                <table>
                    <tr>
                        <td>
                          
                        </td>
                       <td><div class="input-field col s12">
                     
                
                </div></td>
               
                
                </tr></table>            </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </main>
                        </div>
                        <div class="left-sidebar-hover"></div>
                        
                        <script type="text/javascript"> 
$(function(){
   
//    $('.movable_div').draggable(
// {scroll: false}
// );

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

   alert('Approved image saved! It will send after approval');
 


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
          var cn=confirm (" Are you sure you want Approve this file ? ") 
        if (cn== true ) {
         html2canvas($("#canvas"), {
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
          alert("Approved Successfully");
          window.location.href = "../index.php";

        
 
         });
         }
         });
        }

         });
      </script>
<br><br><br>

<center>
<table>
  <tr>
    <td>
<?php
echo '<form action="../recorrect.php?rId=',$rId,'&& type=',$type,'"  method="post" enctype="multipart/form-data">
&emsp;' ?>
<textarea name="rcrt" rows="2" cols="25" class="dasho" placeholder="Enter Recorrection Information Here...!" required></textarea><br>
&emsp;

<input type="submit" name="reject" class="gobtn" value="Recorrection" style="height:45px;Width:230px" onClick="return confirm('Are you sure you want submit this file ?')">

</form>
</td>
<td>

   <?php
echo '<form action="../reason.php?rId=',$rId,'&& type=',$type,'"  method="post" enctype="multipart/form-data">
&emsp;' ?><textarea name="r_reason" rows="2" cols="25" class="dasho" placeholder="Enter Reject Reason Here...!" required></textarea><br>
&emsp;

<input type="submit" name="reject" class="gobtn4" value="Reject" style="height:45px;Width:230px" onClick="return confirm('Are you sure you want submit this file ?')">

</td>
</tr>
</form>
</table> 
</center>

    </body>
</html>
