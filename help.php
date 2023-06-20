
<script type="text/javascript"> <!--------------------------TO PREVENT BACK AFTER SIGN OUT PROCESS--------------------
   function preventBack(){window.history.forward();}
    setTimeout("preventBack()", 0);
    window.onunload=function(){null};
 </script>
						
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/uistyle.css">

<link rel="stylesheet" href="bootstrap-4.0.0-dist/css/bootstrap.min.css" >
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script src="bootstrap-4.0.0-dist/js/bootstrap.min.js"></script>

	<title>Apply</title>

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
<table class= "table" border="0" align="center"  width="1214px" height = "1200px">
	<tr>
		<td height="125px" colspan="3" width="1250px">
			
			<img src="images/p2.png" width="300px" height="125px">
			<img src="images/p1.png" width="630px" height="125px">
			<img src="images/p4.png" width="300px" height="125px">
		</td>
	</tr>
  <tr>
	<td bgcolor="#047B5A" height="05px" width="1214" colspan="3">
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
	<td  height="800x" colspan="3" >
		
   		<?php
		 //include('head.html');//include menu and left side bar
		?>
		<div style="float:right;width:760px;border:2px solid yellow;border-radius:10px;margin-left:0.5px;margin-top:25px;margin-right:35px;padding:5px;font-size:20px;box-shadow: 0px 0px 0px 5px #999999;">
		<p style="color:blue;font-style:italic;font-size:20px;">
             <p>1. firstly you enter into our website.<br>
				2. if you are formal user click the log in button and enter your user name and password if 
					      you are not formal user you requist to create account by system administrator.<br>
				3. if you want to know about our university click background.<br>
				4. if you want contact with us click contact with us button and contact us by different address.<br>
				5. In the service web page you can get services that our university gives to his student, teacher,adminstrator and other user.<br><br>
				6. If you are System Adminstrator You can create user account,activate user account,deactivate user account.<br>
				7. If you are accademic dean You can register and assign instructor, ,post notice, add department and course etc.<br>
				8.If you are instructor You can upload materials,add studnt result,view notice .<br>
				9.If you are registrar officer You can register register student.<br>
				10. If you are student you are allowed to see only your result,course,notice and can download learning material by entering username and password
					   to the requiered log in page.<br>
				11. While you enter your username and password they must not be null. i.e.filled correctly.<br>
				12. while you save any record the primary key(id) must not bill null.<br>
				13. At the end you must click Log out button when you finish your work or change othe computer.<br>
				</p> 
				</div>
		<?php
		// include('footer.html');//include footer and right side bar
		?>	
   </div><!-- End of MainPage-->
            
	</td>
</tr>

<tr>
		<td height="30px" colspan="2" bgcolor ="#06213F">
        <?php 
             
            include ('footer.php');

        ?>
    </td>
	
</tr>
</table>
</body>
</html>


