<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/uistyle.css">

	<link rel="stylesheet" href="bootstrap-4.0.0-dist/css/bootstrap.min.css" >
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script src="bootstrap-4.0.0-dist/js/bootstrap.min.js"></script>

	<title>Home</title>

<!--<link rel="stylesheet" href="style.css">-->
<script type="text/javascript">
if (document.images) {     // Preloaded images
demo1 = new Image();
demo1.src="images/p5.png"
demo2 = new Image();
demo2.src="images/p4.png"
demo3 = new Image();
demo3.src="images/p2.png"

demo4 = new Image();
demo4.src="images/p3.png"
demo5 = new Image();
demo5.src="images/p6.png" 
demo6 = new Image();
demo6.src="images/p7.png"
demo7 = new Image();
demo7.src="images/p3.png" 

}
function timeimgs(numb) {  // Reusable timer
thetimer = setTimeout("imgturn('" +numb+ "')", 2000);
}

function imgturn(numb) {   // Reusable image turner
if (document.images) {

if (numb == "7") {         // This will loop the image
document["demo"].src = eval("demo7.src");
timeimgs('1');
}

else {
document["demo"].src = eval("demo" + numb + ".src");

timeimgs(numb = ++numb);
}
}
}

</script>


</head>

<body bgcolor="lightgrey" onLoad="timeimgs('1');">
<table class= "table" border="0" align="center"  width="1200px" height="900px">
	<tr>
		<td height="125px" colspan="3" width="1250px">
			
			<img src="images/p2.png" width="300px" height="125px">
			<img src="images/p1.png" width="630px" height="125px">
			<img src="images/p4.png" width="310px" height="125px">
		</td>
	</tr>
  <tr>
	<td bgcolor="#047B5A" height="05px" colspan="3">
		<div id="header" >
			<ul>
			    <li class="li"><a class="id" href="index.php">Home</a></li>
			    <li class="li"><a class="id" href="Apply.php">Apply</a></li>
			    <li class="li"><a class="id" href="about.php">About</a></li>
			    <li class="li"><a class="id" href="contact.php">Contact</a></li>
			    <li class="li"><a class="id" href="#">News</a></li>
			    <li class="li"><a class="id" href="help.php">Help</a></li>
			    <li class="log"><a class="login" href="login.php">Login</a></li>
		    </ul>
	    </div>

	</td >
</tr>
<tr>
	<td  colspan="3">
		<img src="" height="300px" width="1250px" name="demo" >
	</td>
</tr>
<tr>
	<td height="500px" width="700px" colspan="2" bgcolor="whitegreen" style="margin-top: -150px"><font  color="red" face="monotype corsiva" size="4" align = "center">
		<h2 >Welcome To CCDE of Haramaya University</h2></font>
		<img src="images/p6.png" width="700px" height="300px" align="left" style="margin-top: ">
		<font valign = "top" color="black" size="2" face="monotype corsiva" padding-left >
		<h2  class="note">Haramaya university is one of the higher institutions involved in continuing and distance 
		education. The university offers the non-regular educational provesions through continuing, distance and summer modalities.
	 CCDE of haramaya university teaches many first degree programs with the 
	 collaboration of the university college`s, departments and its branches
	 those are found in different area in our countery. College of countinuing and distance education directorate.</h2>
		</font>

	</td>
	<td height="500px" colspan="2" width="400px">
		<br><br>
		
		<font color="red"><h2 align="center" >Calendar </h2></font>
		<br><br>
         <font color="blu" >
         <h2 align="center">
		<?php
		echo date('d-m-y: h:m:s');
		 ?>
			
		</h2>
     </font>
     <br><br>
           
		<img src="calendar/cala.gif" width="450" height="170" style="float:left; align: center;"> 
	</td>
</tr>
<tr>
	<td height="30px" colspan="3" >
		<?php
          
            include ('footer.php');
		?>
	</td>
</tr>
</table>
</body>
</html>
