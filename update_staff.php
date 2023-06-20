<script type="text/javascript"> <!--------------------------TO PREVENT BACK AFTER SIGN OUT PROCESS--------------------
   function preventBack(){window.history.forward();}
    setTimeout("preventBack()", 0);
    window.onunload=function(){null};
 </script>

<?php 
        include('connection.php');
        
         session_start();
           if(isset($_SESSION["username"])) 
        {
            if($_SESSION['role'] == 'registrar officer')
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
        else{
            die(header('location:login.php'));
                   }
                   
                   


                   
                       $message="";
                       $errors=array(); 
                      
                       $updated_id = $_GET['s_id'];

       $sqll="SELECT * FROM staff WHERE s_id ='".$updated_id."' ";

       $res=mysqli_query($con,$sqll);

       $rows=mysqli_fetch_array($res); 

       $sql1="SELECT * FROM staff_account WHERE Staff_id ='".$updated_id."' ";

       $ress=mysqli_query($con,$sql1);

       $rows2=mysqli_fetch_array($ress);   
     
           
            if(isset($_POST['upt_submit']))
                                          
                {
                   
            $first_name = $_POST['fname'];
            $last_name = $_POST['lname'];
            $dept = $_POST['depart'];
            $role = $_POST['role'];
            $sex = $_POST['gender'];
            $age = $_POST['age'];
            $phone = $_POST['phone'];
            $email=$_POST['mail'];
            $id= $_POST['id'];
                        
         if(!preg_match('/^[a-zA-Z]+$/',$first_name) || empty($first_name) || preg_match( '/[\s]+/',$first_name))
                          {
                    array_push($errors," first name must be characters or alphabets!!");
                    }
                    if(!preg_match('/^[a-zA-Z]+$/',$last_name) || empty($last_name) ||preg_match( '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/' , $last_name) || preg_match( '/[\s]+/',$last_name))
                   {
                    array_push($errors," last name must be character or alphabets!!");
                    }
                    
                            
                            if(empty($sex))
                            {
                            array_push($errors,"sex is required");
                            }
                             if(empty($dept))
                            {
                            array_push($errors,"Department is required");
                            }

                            if(empty($phone) || !preg_match("/^(00|[+])(251)[0-9]{9}$/",$phone))
                            {
                            array_push($errors,"phone number is invalid format");
                            }
                            
                            if(empty($email) || !filter_var($email,FILTER_VALIDATE_EMAIL))
                            {
                            array_push($errors,"invalid email format");
                            }
                            
                            if(empty($role))
                            {
                            array_push($errors,"Role is required");
                            }
                            if(count($errors)==0)
                            {
        
        $sql= mysqli_query($con,"UPDATE staff SET Fname = '$first_name', Lname = '$last_name',Department = '$dept', sex='$sex', DOB='$age', Pnumber='$phone', Email='$email' WHERE s_id='$id'") or die(mysqli_error($con));
        $sql1=mysqli_query($con, "UPDATE staff_account SET Role='$role' WHERE Staff_id='$id'") or die(mysqli_error($con));

       if($sql && $sql1) {

       $_SESSION['msg']="Staff Updated Succesfuly";
       header("location:Manage_staff.php");
         }
       else
       {
           $_SESSION['msg']="Staff data Does Not Updated";
           header("location:Manage_staff.php");
      }  

                                }
                            }
                            ?>
                <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin page</title>
    
   <!--<link rel="stylesheet" href="bootstrap-4.0.0-dist/css/bootstrap.min.css" >
   <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
   <script src="bootstrap-4.0.0-dist/js/bootstrap.min.js"></script> -->
    
<link rel="stylesheet" href="bootstrap-4.0.0-dist/css/bootstrap.min.css" >
  <link rel="stylesheet" href="bootsrap/css/all.css" > 
  <script src="bootstrap-4.0.0-dist/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="bootstrap-4.0.0-dist/jss/jquery.js"></script>
<!--<script src="bootsrap/js/all.js"></script> -->
<link rel="stylesheet" type="text/css" href="stylle.css">

<style type="text/css">
    #tr{
    background:steelblue;
      }
       #td{
    width:300px;
    height:30px;
    background:#E6E6FA;
    border:1px solid #87CEFA;
    border-radius:9px;
      }
       ul{
    position: relative;
     margin-left: 05%;
    display: flex;
}

ul .li {
    padding-left: 50px;
    list-style: none;   
}
#logout{
    margin-left: 300px;
}
</style>

</head>
<body >
 <table width="1280px" bgcolor="lightgrey" align="center" style="top: 0;" >

    <tr>
        <td height="40px" bgcolor="grey" colspan="2">
            
        </td>
    </tr>
    <tr>
        <td height="90px" width="100px" bgcolor="Greece" >
          
            <img src="images/p2.png" width="300px" height="90px" style="margin-left: 70px">
        </td>

        <td width="100px" height="90px" colspan="2" bgcolor="Greece" >
       <ul>
           <li class="li"><a class="btn btn-default" href="Admin_page.php"> Home</a></li>
           <li class="li">Admin page</li>
           <li class="li"><?php echo date('d-m-y');?></li>
           
       </ul>              
        </td>
    </tr>
    <tr>
        <td height="500px" colspan="1">
             <?Php 
              include('Side_bar_admin.php');
           ?>
  
     </td>
     <td >

                        <form  method='POST' action="<?php echo $_SERVER["PHP_SELF"];?>" enctype="multipart/form-data">
                        <table id="tr" style="border:1px solid black; border-radius:10px;margin-left:-5px; margin-bottom: 50px; margin-top:0px;box-shadow:5px 5px 5px black;" width="600" height="500px">
                        <tr bgcolor="lightblue"><td height="50px" colspan=3 align=center><font color=black> Update Account Form
                        </td></tr>
                        <tr><td id="mess"><?php echo $message;
                        include('errors.php');
                        ?></td></tr>
                        
                        <tr><td>First Name :</td><td><input  type="text" class="form-control" name="fname"  value="<?php echo"{$rows['Fname']}" ?>" required></td></tr>
                         <tr><td><input  type="hidden" name="id"  value="<?php echo"{$rows['s_id']}" ?>"></td></tr>
                        <tr><td>Last Name :</td><td><input class="form-control"  type="text" name="lname"  value="<?php echo"{$rows['Lname']}" ?>" required></td></tr><br>

                        <tr><td>Department :</td>
                            <td>
                                <select  id="td" name="depart" required="oninvalid='this.setCustomValidity('Please select department')"oninput="setCustomValidity('')">
                                    <?php
                            $de = $rows['Department'];
                            $RE = mysqli_query($con,"SELECT *FROM department WHERE dept_id = $de");
                            $Roww = mysqli_fetch_array($RE);
                                $result = mysqli_query($con,"select *from department");
                                echo "<option selected='selected'>{$Roww['dept_name']}</option>";
                                while ($row = mysqli_fetch_array($result)) { 
                                echo "<option value='".$row['dept_id']."' "; 
                                if(isset($_POST['dep']) && $_POST['dep'] == $row['dept_id']) //keep order of option
                                echo "selected";
                                echo " >".$row['dept_name']."</option>";
                                }
                                     ?>
                                </select>
                            </td></tr>

                        <tr><td>sex :</td><td>
                                      <input type="radio" name="gender" value="male">Male
                                      <input type="radio" name="gender" value="female">Female 
                        </td></tr>
                        <tr><td>DOB :</td><td><input class="form-control"  type="date"   name="age"   value="<?php echo"{$rows['DOB']}" ?>" required></td></tr>
                        <tr><td>Phone Number :</td><td><input class="form-control"  type="txt"   name="phone"   value="<?php echo"{$rows['Pnumber']}" ?>" required></td></tr>
                        <tr><td>E-mail :</td><td><input class="form-control"  type="text" name="mail"  value="<?php echo"{$rows['Email']}" ?>" required/></td></tr>
                        <tr><td>Role:</td><td><select class="form-control"  name="role" required>
                                    <option selected="selected"><?php echo"{$rows2['Role']}" ?></option>
                                    <option>Academic head</option>
                                    <option>Instructor</option>
                                    </select></td>          
                        </tr>
                        <tr><td colspan="2" align="center"><input class="btn btn-success" id="btn"type='submit' value='Update' name='upt_submit' Onclick="return check(this.form);"/>
                        <input class="btn btn-primary" id="btn" type='reset' value='cancel'/></td></tr>
                                   </center>
                                
                           </div><!-- End of MainPage-->
                                                                                                  
                     </table>

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
 
 <script type="text/javascript">
    $(document). ready(function(){
        $('.sub_btn').click(function(){
            $(this).next('.sub_menu').slideToggle();
            $(this).find('.dropdown').toggleClass('rotate');
        });
        $('.menu_btn').click(function(){
         $('.side_bar').addClass('active');
        });
        $('.close-btn').click(function(){
         $('.side_bar').removeClass('active');
        });
    });

 </script> 
</body>
</html>
        
