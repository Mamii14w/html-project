  	
        
<script type="text/javascript"> <!--------------------------TO PREVENT BACK AFTER SIGN OUT PROCESS--------------------
   function preventBack(){window.history.forward();}
    setTimeout("preventBack()", 0);
    window.onunload=function(){null};
 </script>

<?php 
       session_start();

           if(isset($_SESSION["username"])) 
        {
            if($_SESSION['role'] == 'admin')
                die(header('location:Admin_page.php'));
            else if($_SESSION['role'] == 'registrar officer')
                die(header('location:Registrar_page.php'));
            else if($_SESSION['role'] == 'Student')
                die(header('location:Student_page.php'));
            else if($_SESSION['role'] == 'Instructor')
                die(header('location:Instructor_page.php'));
            else if($_SESSION['role'] == 'Academic head')
                die(header('location:Academic_page.php'));
            else if($_SESSION['role'] == 'Associated Directorate')
                die(header('location:Associated_page.php'));
            else if($_SESSION['role'] == 'Directorate')
                die(header('location:Directorate_page.php'));
        }
        
                   ?>


			
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/uistyle.css">

	<link rel="stylesheet" href="bootstrap-4.0.0-dist/css/bootstrap.min.css" >
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script src="bootstrap-4.0.0-dist/js/bootstrap.min.js"></script>
	<title>login</title>
  
						 <?php
						  include('connection.php');
						 $message="";
						 if (isset($_POST['login']))
						{ 
							$username=$_POST['user_name'];
							$password=$_POST['password'];
							//$password=md5($password);
							
							$sql ="SELECT * FROM user_account WHERE Uname='$username' AND Password='$password'";

							$result = mysqli_query($con, $sql); 
							$count1= mysqli_num_rows($result);
							if ($count1>0) {
							$row1=mysqli_fetch_array($result);
							$status1 = $row1['status'];
								if($status1=='1')
							{  
                                $_SESSION['msg'] = $row1['user_id'];

                                $_SESSION["username"]=$username;

								if($row1['Role']=='admin')
								{ 
                        			$_SESSION['admin_id'] = $row1['user_id'];			 
                                    $_SESSION["role"] = $row1['Role'];
								 echo "<script>window.location='Admin_page.php';</script>";
								}	
								else if($row1['Role']=='registrar officer')
								{	
									$_SESSION['registrar_id'] = $row1['user_id'];
									$_SESSION["role"]=$row1['Role'];
								 echo "<script>window.location='Registrar_page.php';</script>";
								}  	
								
								else if($row1['Role']=='Directorate')
								{
									$_SESSION['msg'] = $row1['user_id'];
									$_SESSION["role"]=$row1['Role'];
								echo "<script>window.location='Directorate_page.php';</script>";
								}
								else if(row1['Role']=='Associated Directorate')
								{
									$_SESSION['msg'] = $row1['user_id'];
                                    $_SESSION['role'] = $row1['Role'];
                                echo "<script>window.location='Associated_page.php';</script>";
								}
							  
							}
							else if($status1=='0'){
								 echo "<script type = 'text/javascript'> 
                               alert('This account is deactiveted please contact admin.);
                                </script>";
							}
							}
							

							$query2=mysqli_query($con,"SELECT *FROM student_account WHERE Uname='$username' AND Password='$password' ");
							
							$count2= mysqli_num_rows($query2);
							if ($count2>0) {
							$row2=mysqli_fetch_array($query2);
							$status2 = $row2['Status'];
							
							if($status2=='1')
								{
				            $_SESSION["student_id"] = $row2['student_id'];
                            $_SESSION['user_id'] = $row2['student_id'];
							$_SESSION["role"]=$row2['Role'];
							
							$_SESSION["username"]=$username;
								echo "<script>window.location='Student_page.php';</script>";
											
								}
							else if($status2=='0'){
                         echo "<script type = 'text/javascript'> 
                               alert('This account is deactiveted please contact admin.');
                                </script>";
							}
							}
							

							$query4=mysqli_query($con,"SELECT *FROM staff_account WHERE Uname='$username' AND Password='$password' ");
							
							$count3= mysqli_num_rows($query4);
							if ($count3>0) {
							$row3=mysqli_fetch_array($query4);
						   $status3=$row3["Status"];

						     if($status3=='1')
								{
								$_SESSION["username"]=$username;
											if($row3['Role']=='Academic head')
										{ 
											$_SESSION['staff_id'] = $row3['Staff_id'];
											$_SESSION['user_id'] = $row3['Staff_id'];
											$_SESSION["role"]=$row3['Role'];
											echo "<script>window.location='Academic_page.php';</script>";
										}
										else if($row3['Role'] == 'Instructor')
										{
											$_SESSION["staff_id"] = $row3['Staff_id'];
											$_SESSION['user_id'] = $row3['Staff_id'];
                                         	$_SESSION["role"]=$row3['Role'];
											echo "<script>window.location='Instructor_page.php';</script>";
										}
								}
                        else if($status3=='0'){
                          echo "<script type = 'text/javascript'> 
                               alert('This account is deactiveted please contact admin.');
                                </script>";
                        }
							}
							
							
							
								 else
									{
										 echo "<script type = 'text/javascript'> 
                               alert('Incorrect username and password');
                                </script>";
											 $message="Incorrect username or password";
									}
									
						}
						   
							?>

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

<style type="text/css">
	#ancor{
		color: red;
		text-decoration: none;
	}
</style>
</head>

<body bgcolor="lightgrey" onLoad="timeimgs('1');">
	<?php
           if (isset($_SESSION['msg'])) {
            $val = $_SESSION['msg'];
            echo "<script type = 'text/javascript'> 
             alert(' $val');
            </script>";
           }
           unset($_SESSION['msg']); 
        ?>

<table   class= "table" border="0" align="center" height="900px">
	<tr>
		<td height="125px" colspan="3" width="1250px">
			
			<img src="images/p2.png" width="300px" height="125px">
			<img src="images/p1.png" width="630px" height="125px">
			<img src="images/p4.png" width="310px" height="125px">
		</td>
	</tr>
  <tr>
	<td bgcolor="#047B5A" height="05px"  colspan="3">
		<div id="header" >
			<ul>
			   <li class="li"><a class="id" title="Activate Session" href="index.php">Home</a></li>
			    <li class="li"><a class="id" href="Apply.php">Apply</a></li>
			    <li class="li"><a class="id" href="about.php">About</a></li>
			    <li class="li"><a class="id" href="contact.php">Contact</a></li>
			    <li class="li"><a class="id" href="news.php">News</a></li>
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
	<td height="500px" width="700px" colspan="2" bgcolor="lightgrey">

			
         <table  border="0" style=" margin-top: -20px;box-shadow:5px 5px 5px red;" width="670px" height="400px">
			
		    <tr bgcolor="skyblue"><td width="250px" height="50px" colspan="3"> <h2 align="center">
		    <font  color="red" face="monotype corsiva" size="8" align = "center">Login Here </font></h2> </td></tr><br>

		  <tr bgcolor="black">
		     <td colspan="2">
		     	<img src="images/key.gif" width="250" height="170" style="float:left;"> 
		     </td> 
         <td>
         	<table  class=" table-hover table-striped table-bordered" border="0" width="420px" height= "250px" >

         	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="login">
            <tr ><td width="200px"> <font  color="skyblue" face="monotype corsiva" size="5" >UserName: </font></td> &nbsp; <td><input class="form-control" type="text" height="20" name="user_name" placeholder='User Name' required  required=""oninvalid="this.setCustomValidity('user name is required')"oninput="setCustomValidity('')"></td></tr><br><br>
			<tr><td><font  color="skyblue" face="monotype corsiva" size="5" align = "center">Password: </font></td>&nbsp; <td><input class="form-control" type="password" height="20" name="password" placeholder='Password' required pattern=[0-9]{[a-zA-Z]}+ required=""oninvalid="this.setCustomValidity('password is required')"oninput="setCustomValidity('')"></td></tr><br><br>
			<tr>       
			    <td colspan="2" align="center" ><input type="submit" class="btn btn-success"  value="Login" class="button" name="login" onsubmit="validateLogin()" />
			    <input  class="btn btn-primary" type="Reset" value="Cancel" class="button"/></td>
		    </tr>
		    <tr><td colspan="2" align="center"><font  face="monotype corsiva" size="5" align = "center"><a id="ancor" href="" >Forget password ?</a></td></tr>
			
			</form>	
			</table>
		</td>
		</tr>
			</table>			
	
	</td>

	<td height="500px" colspan="2" width="500px">
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
		<td height="30px" colspan="3" bgcolor ="#06213F">
        <?php 
             
            include ('footer.php');

        ?>
    </td>
</tr>
</table>
</body>
</html>


