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


<?php 
					include('connection.php');
					session_start();
          
          error_reporting(0);

					  $message=$errors="";
					$errors=array();
					 if (isset($_POST['Apply']))
					{ 
						$f_name=$_POST['fname'];
						$m_name=$_POST['mname'];
						$l_name=$_POST['lname'];
						$age=$_POST['age'];
						$sex=$_POST['sex'];
						$mo_name=$_POST['mothername'];
						$nation=$_POST['na'];
						$depart=$_POST['dept'];
						$email=$_POST['mail'];
						$phon=$_POST['phone'];
						$zone=$_POST['zo'];
						$woreda=$_POST['wo'];
						$kebele=$_POST['ke'];
						$element=$_POST['el'];
						$prep=$_POST['pr'];
						
						$role="student";
						if(!preg_match('/^[a-zA-Z]+$/',$f_name) || empty($f_name) ||preg_match( '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/' , $f_name) || preg_match( '/[\s]+/',$f_name))
										{
						   array_push($errors," first name must be characters or alphabets!!");
										}
						if(!preg_match('/^[a-zA-Z]+$/',$m_name) || empty($m_name)  || preg_match( '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/' , $m_name) ||preg_match( '/[\s]+/',$m_name))
										{
						array_push($errors," midle name must be characters or alphabets!!");
										}
						if(!preg_match('/^[a-zA-Z]+$/',$l_name) || empty($l_name) || preg_match( '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/' , $l_name) || preg_match( '/[\s]+/',$l_name))
										{
						array_push($errors," last name must be character or alphabets!!");
										}
										
										
						if(empty($sex))
										{
						array_push($errors,"sex is required");
										}
						if(!preg_match('/^[a-zA-Z]+$/',$mo_name) || empty($mo_name) || preg_match( '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/' , $mo_name) ||preg_match( '/[\s]+/',$mo_name))
										{
						array_push($errors," mother name must be character or alphabets!!");
										}
						if(!preg_match('/^[a-zA-Z]+$/',$nation) || empty($nation) || preg_match( '/[\s]+/',$nation))
										{
						array_push($errors,"  nationality must be character or alphabets!!");
										}
						if(empty($email) || !filter_var($email,FILTER_VALIDATE_EMAIL))
							{
						array_push($errors,"invalid email format");
							}
						if(empty($phon) || !preg_match("/^(00|[+])(251)[0-9]{9}$/",$phon))
										{
						array_push($errors,"phone number is invalid format");
										}
						if(!preg_match('/^[a-zA-Z]+$/',$zone) || empty($zone)  || preg_match( '/[\s]+/',$zone))
										{
						array_push($errors,"  zone must be insert character or alphabets!!");
										}
						if(!preg_match('/^[a-zA-Z]+$/',$woreda) || empty($woreda) || preg_match( '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/' , $woreda) || preg_match( '/[\s]+/',$woreda))
										{
						array_push($errors,"  Woreda must be insert character or alphabets!!");
										}
										
						if(!preg_match('/^[a-zA-Z0-9]+$/',$kebele) || empty($kebele) || preg_match( '/[\s]+/',$kebele))
										{
						array_push($errors,"  Kebele must be insert character or numbers !!");
										}
						if(!preg_match('/^[a-zA-Z]+$/',$element) || empty($element) || preg_match( '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/' , $element) || preg_match( '/[\s]+/',$element))
										{
						array_push($errors," school name must be character or alphabets!!");
										}	
						if(!preg_match('/^[a-zA-Z]+$/',$prep) || empty($prep) || preg_match( '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/' , $prep) || preg_match( '/[\s]+/',$prep))
										{
						array_push($errors," school name must be character or alphabets!!");
										}
					    $destinat = "Documents/".basename($_FILES['files']['name']);
						$files = $_FILES['files']['name'];
						move_uploaded_file($_FILES['files']['tmp_name'],$destinat);
										
						if(count($errors)==0)
						{
							$sql="INSERT INTO student VALUES ('','$f_name','$m_name','$l_name','$age','$sex','$mo_name','$nation','$depart','$email','$phon','$zone','$woreda'  ,'$kebele','$element','$prep','$files','pending')";
							  $result2= mysqli_query($con,$sql);

							  if ($result2)
								{

				    	$_SESSION['msg'] = "Your Application is now pending for approval! we will send you username and password to your email -$email";
                          header('location:login.php');
								}
								else
								{

						echo "<script type = 'text/javascript'> 
                        alert('your Aplication is not sent try again later');
                          </script>";
                          echo mysqli_error($con);
								}

								/*$sql2=mysqli_query($con,"select*from student");
							$user_id=null;
							while ($row=mysqli_fetch_array($sql2)) 
							{
								$user_id=$row['s_id'];
							}
							
							$query2="insert into student_account values('','$user_id','$f_name','$mo_name','$role','0')";
							$query3=mysqli_query($con,$query2);
							if($query3)
							{
							$message="Register succesfully!";
							}
							else
							{
							$message="Not register succesfully!".mysqli_error($con);
							}*/
						}
						else{
							echo "error";
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
		
						   <div id="mainpage">
								
					
										 <center>
							<form  method='POST' action="<?php echo $_SERVER["PHP_SELF"];?>" enctype="multipart/form-data">
							<table id="tr" border="1" style="border:1px solid black; border-radius:05px;margin-top:-40px;box-shadow:5px 5px 5px black;" width="540" height="400px">
							<tr bgcolor="lightblue" ><td height="50px" colspan=3 align=center><font color=black> Student Application Form
							</td></tr><br>
							<tr id="mess"><td><?php echo $message;
											 include('errors.php');
							?></td></tr>
							<tr><td>First Name </td><td><input class="form-control" type="text"   name="fname" placeholder='fname' required></td></tr>
							<tr><td>Midle Name</td><td><input class="form-control" type="text" name="mname" placeholder='mname' required></td></tr><br>
							<tr><td>Last Name</td><td><input class="form-control" type="text" name="lname"  placeholder='lname'required></td></tr>
							<tr><td>Date of birth(E.C)</td><td><input class="form-control" type="date" name="age"   placeholder=''required></td></tr>
							<tr><td>Sex </td>
									   <td>
										  <input type="radio" name="sex" value="male">Male
										  <input type="radio" name="sex" value="female">Female
										 </td>
							</tr>
							<tr><td>Mother Name</td><td><input class="form-control" type="text" name="mothername" placeholder='mothername' required></td></tr>
							<tr><td>Nationality</td><td><input class="form-control" type="text" name="na"  placeholder='nationality'required></td></tr>
							<tr><td>Department :</td>
							<td>
								<select  id="td" name="dept">
									<?php
								$result = mysqli_query($con,"select *from department");
								while ($row = mysqli_fetch_array($result)) {
								echo "<option value='".$row['dept_id']."' "; 
								if(isset($_POST['dep']) && $_POST['dep'] == $row['d_id']) //keep order of option
								echo "selected";
								echo " >".$row['dept_name']."</option>";
								}
									 ?>
								</select>
							</td></tr>
							<tr bgcolor="lightblue"><td colspan=3 align=center><font color=black>Address</td></tr>
							<tr><td>E-mail :</td><td><input class="form-control"  type="text" name="mail"  placeholder='E-Mail'required/></td></tr>
							<tr><td>phone number</td><td><input class="form-control" type="text" name="phone" placeholder='+2519_ _ _ _ _ _ _ _' required></td></tr>
							<tr><td>Zone</td><td><input class="form-control" type="text" name="zo"   placeholder='zone'required></td></tr>
							<tr><td>Woreda</td><td><input class="form-control" type="text" name="wo"   placeholder='woreda'required></td></tr>
							<tr><td>Kebele</td><td><input class="form-control" type="text" name="ke"   placeholder='kebele'required></td></tr>
							<tr bgcolor="lightblue"><td colspan=3 align=center><font color=black>Educational Background
							</td></tr>
							<tr><td>Elementary School</td><td><input class="form-control" type="text" name="el" placeholder='elementary mschool' required></td></tr>
							<tr><td>Preparatory School</td><td><input class="form-control" type="text" name="pr" placeholder='preparatory school' required></td></tr>
							<tr><td>Upload your docoment </td><td><input class="form-control" type="file" name="files" required ></td></tr>
							<tr><td colspan="2" align="center"><input  class="btn btn-success" type='submit' value='Apply' name='Apply' Onclick="return check(this.form);"/>
							<input class="btn btn-primary" type='reset' value='clear'/></td></tr>
						</table>
							</form>	 
										 </center>
									
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



