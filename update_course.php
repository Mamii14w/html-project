
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
            if($_SESSION['role'] == 'admin')
                die(header('location:Admin_page.php')); 
            else if($_SESSION['role'] == 'registrar officer')
                die(header('location:Registrar_page.php'));
            else if($_SESSION['role'] == 'Student')
                die(header('location:Student_page.php'));
            else if($_SESSION['role'] == 'Instructor')
                die(header('location:Instructor_page.php'));
            else if($_SESSION['role'] == 'Associated Directorate')
                die(header('location:Associated_page.php'));
            else if($_SESSION['role'] == 'Directorate')
                die(header('location:Directorate_page.php'));
        }
        else{
            die(header('location:login.php'));
                   }


              $staff_id = $_SESSION['user_id'];
              $req = mysqli_query($con,"SELECT *FROM staff WHERE s_id = $staff_id");
               $rowd = mysqli_fetch_array($req);
               $dept_id = $rowd['Department'];  
               $rse = mysqli_query($con,"SELECT *FROM department WHERE dept_id = $dept_id");
               $rowdd = mysqli_fetch_array($rse); 
                            

                   $message="";
                       $errors=array(); 
                      
                       $updated_id = $_GET['c_id'];

       $sqll="SELECT *FROM course WHERE id ='".$updated_id."' ";
        $res=mysqli_query($con,$sqll);

       $rows=mysqli_fetch_array($res); 
       
        if(isset($_POST['upt_submit']))
                                          
                {
                   
           $c_code=$_POST['c_code'];
          $c_name=$_POST['c_name'];
          $credit_hour=$_POST['c_hr'];
          $dept=$rowd['Department'];
          $year=$_POST['year'];
          $term=$_POST['sem'];
           $id= $_POST['id'];
         $sql= mysqli_query($con,"UPDATE course SET course_code = '$c_code', course_name = '$c_name',cr_hr = '$credit_hour',dept_id = '$dept', year = '$year', term ='$term'  WHERE id='$id'") or die(mysqli_error($con)); 
          if($sql) {

       $_SESSION['msg']="course Updated Succesfuly";
       header("location:Manage_course.php");
         }
       else
       {
           $_SESSION['msg']="Course data Does Not Updated";
           header("location:Manage_course.php");
      }  

                                }     
           
                   ?>

            <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Academic page</title>
    
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
    margin-left: 250px;
}

 </style>
</head>
<body>
 <table border="0" width="1280px" bgcolor="lightgrey" align="center"  >
    <tr>
        <td height="40px" bgcolor="grey" colspan="4">
            
        </td>
    </tr>
    <tr>
        <td height="90px" width="100px" colspan="2" bgcolor="Greece" >
          
            <img src="images/p2.png" width="300px" height="90px" style="margin-left: 70px">
        </td>

        <td width="100px" height="90px" colspan="2" bgcolor="Greece" >
       <ul>
           <li class="li"><a class="btn btn-default" href="Academic_page.php"> Home</a></li>
           <li class="li">Academic page</li>
           <li class="li"><?php echo date('d-m-y');?></li>
           <li class="li"><a id="logout" class="btn btn-primary" href="logout.php"> Logout</a></li>
       </ul>              
        </td>
    </tr>
    <tr>
        <td height="400px" colspan="2">
           <?Php 
              include('Side_bar_academic.php');
           ?>
     </td>
      <form  method='POST' action="<?= $_SERVER["PHP_SELF"];?>" enctype="multipart/form-data">
                <table align="center" id="tr" style="border:1px solid black; border-radius:10px;margin-left:300px; margin-bottom: 50px; margin-top:-350px;box-shadow:5px 5px 5px black;" width="600" height="500px">
                <tr bgcolor="lightblue"><td colspan=2 align=center><font color=black> Course Edit Form
                </td></tr>
                
                <tr><td><input  type="hidden" name="id"  value="<?php echo"{$rows['id']}" ?>"></td></tr>

                <tr><td>Course Code :</td><td><input class="form-control" type="text" name="c_code" value="<?php echo "{$rows['course_code']}" ?>" required pattern=[a-zA-Z0-9]{5,15} required=""oninvalid="this.setCustomValidity('Please enter valid course code')"oninput="setCustomValidity('')"></td></tr>

                <tr><td>Course Name </td><td><input class="form-control" type="text"   name="c_name" value="<?php echo "{$rows['course_name']}" ?>" placeholder='Course Title' required pattern=[a-zA-Z ]{1,40} required=""oninvalid="this.setCustomValidity('Please enter valid course name')"oninput="setCustomValidity('')"></font></td></tr>

                <tr><td>Credit Hour </td><td><input class="form-control" type="number" min="1"max="36"  name="c_hr" value="<?php echo "{$rows['cr_hr']}" ?>" placeholder='Credit Hour' required pattern=[0-9]{1,2} required=""oninvalid="this.setCustomValidity('Please enter valid course credit hour')"oninput="setCustomValidity('')"></font></td></tr>

                           
            <tr><td> Department:</td><td><input type="text" class="form-control" name="dept_id" value="<?php echo "{$rowdd['dept_name']}" ?>" readonly>

                            </td>
                   </tr>
            <tr><td> Year: </td><td><select  class="form-control" name="year" value="<?php echo "{$rows['year']}" ?>" required="oninvalid='this.setCustomValidity('Please select year')"oninput="setCustomValidity('')">
                                    <?php
                                $result = mysqli_query($con,"SELECT *FROM year");
                                while ($row = mysqli_fetch_array($result)) {
                                
                                echo "<option value='".$row['year_id']."' "; 
                                if(isset($_POST['dep']) && $_POST['dep'] == $row['year_id']) //keep order of option
                                echo "selected";
                                echo " >".$row['year_name']."</option>";
                                }
                                     ?>
                                </select></td></tr>
                <tr><td> Term: </td><td><select  class="form-control" name="sem" value="<?php echo "{$rows['term']}" ?>" required="oninvalid='this.setCustomValidity('Please select term')"oninput="setCustomValidity('')">
                                    <?php
                                $result = mysqli_query($con,"SELECT *FROM term");
                                while ($row = mysqli_fetch_array($result)) {
                                
                                echo "<option value='".$row['term_id']."' "; 
                                if(isset($_POST['ter']) && $_POST['ter'] == $row['term_id']) //keep order of option
                                echo "selected";
                                echo " >".$row['term_name']."</option>";
                                }
                                     ?>
                                </select></td></tr>

                <tr><td colspan="2" align="center"><input id="btn" class="btn btn-success" type='submit' value='Update' name='upt_submit' Onclick="return check(this.form);"/>
                <input id="btn" class="btn btn-primary" type='reset' value='cancel'/></td></tr>
                </form>  
        
          </table>
     </td>
   </tr>
   <tr>
    <td height="30px" colspan="4" bgcolor ="#06213F">
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