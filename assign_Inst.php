<script type="text/javascript"> <!--------------------------TO PREVENT BACK AFTER SIGN OUT PROCESS--------------------
   function preventBack(){window.history.forward();}
    setTimeout("preventBack()", 0);
    window.onunload=function(){null};
 </script>

<?php 
        include('connection.php');
        
        error_reporting(0);


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
     <td width="500px" colspan="4"><font size="4">
        
         <div id="right-panel" class="right-panel">

       <form method="POST" action="#">
         <div class="row" style="margin-right: 100px;">
            <div class="col-6">
                 <div class="form-group">
                  <label for="x_card_code" class="control-label mb-1">Department</label>
                 <?php 
                   $query=mysqli_query($con,"SELECT * from department ORDER BY dept_name ASC");                        
                  $count = mysqli_num_rows($query);
                   if($count > 0){                       
                   echo ' <select required name="deptId" class="custom-select form-control">';
                     echo'<option value="">--Select department--</option>';
                      while ($row = mysqli_fetch_array($query)) {
                      echo "<option value='".$row['dept_id']."' "; 
                                if(isset($_POST['dep']) && $_POST['dep'] == $row['dept_id']) //keep order of option
                                echo "selected";
                                echo " >".$row['dept_name']."</option>";
                       }
                   echo '</select>';
                       }
                      ?> 
                       </div>
                            </div>
              <div class="col-6">
                 <div class="form-group">
                  <label for="x_card_code" class="control-label mb-1">year</label>
                 <?php 
                   $query=mysqli_query($con,"SELECT *FROM year ORDER BY year_name ASC");                        
                  $count = mysqli_num_rows($query);
                   if($count > 0){                       
                   echo ' <select required name="yearId" class="custom-select form-control">';
                     echo'<option value="">--Select year--</option>';
                      while ($row = mysqli_fetch_array($query)) {
                      echo'<option value="'.$row['year_id'].'" >'.$row['year_name'].'</option>';
                       }
                   echo '</select>';
                       }
                      ?> 
                       </div>
                            </div>
                     <div class="col-6">
                          <div class="form-group">
                                <label for="x_card_code" class="control-label mb-1">Session</label>
                               <?php 
                               $query=mysqli_query($con,"select * from session where status = 1");                        
                               $count = mysqli_num_rows($query);
                              if($count > 0){                       
                             echo ' <select required name="sessionId" class="custom-select form-control">';
                               echo'<option value="">--Select Session--</option>';
                                while ($row = mysqli_fetch_array($query)) {
                            echo'<option value="'.$row['id'].'" >'.$row['session_name'].'</option>';
                             }
                                 echo '</select>';
                             }
                                ?>   
                                </div>
                                    </div>
                                         
                                        <div class="col-6">
                                         <div class="form-group">
                                          <label for="x_card_code" class="control-label mb-1">Term</label>
                                             <?php 
                                        $query=mysqli_query($con,"SELECT *from term ");                        
                                      $count = mysqli_num_rows($query);
                                    if($count > 0){                       
                                    echo ' <select required name="termId" class="custom-select form-control">';
                                     echo'<option value="">--Select Term--</option>';
                                   while ($row = mysqli_fetch_array($query)) {
                                     echo'<option value="'.$row['term_id'].'" >'.$row['term name'].'</option>';
                                            }
                                        echo '</select>';
                                          }
                                                    ?>                                                     
                                                 </div>
                                                </div>
                                                
                                             </div>
                                                <div>
                                  <button type="submit" name="submit" class="btn btn-success">submit</button>
                                            </div>
       </form>

<?php
 if(isset($_POST['submit'])){
                
                $deptId = $_POST['deptId'];
                $yearId = $_POST['yearId'];
                $sessionId = $_POST['sessionId'];
                $termId = $_POST['termId'];

           $deptquery = mysqli_query($con,"SELECT *FROM department WHERE dept_id = '$deptId'");
           $rowDept = mysqli_fetch_array($deptquery);

            $semesterQuery=mysqli_query($con,"SELECT *FROM term WHERE term_id = '$termId'");
            $rowTerm = mysqli_fetch_array($semesterQuery);

                $sessionQuery=mysqli_query($con,"SELECT *FROM session WHERE id = '$sessionId'");
                $rowSession = mysqli_fetch_array($sessionQuery);

                $levelQuery=mysqli_query($con,"SELECT *FROM year WHERE year_id = '$yearId'");
                $rowYear = mysqli_fetch_array($levelQuery);
 }

               ?>
               <br><br>

                  <div class="col-md-12" style="margin-right : -500px; padding-right: 100px; margin-bottom: 100px;" >
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"><h3 align="center"><?php echo $rowDept['dept_name'] ?> Department &nbsp; <?php echo $rowYear['year_name'];?> &nbsp;<?php echo $rowTerm['term name'];?> &nbsp;<?php echo $rowSession['session_name'];?> Session</h3></strong>
                            </div>
                            <div class="card-body">
                               <table class="table table-hover table-striped table-bordered">
                                       <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Course Name</th>
                                            <th>Course Code</th>
                                            <th>Credit Hour</th>
                                            <th>instructor</th>
                                            <th>action</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                            <?php

            if(isset($_POST['submit'])){

                $deptId = $_POST['deptId'];
                $yearId = $_POST['yearId'];
                $sessionId = $_POST['sessionId'];
                $termId = $_POST['termId'];

                $ret=mysqli_query($con,"SELECT *FROM course WHERE dept_id ='$deptId' AND year ='$yearId' and term ='$termId' ");
                $cnt=1; 
                while ($row=mysqli_fetch_array($ret)) {
                    
                ?>
                <tr >
                <td bgcolor="<?php echo $color;?>"><?php  echo $cnt;?></td>
                <td bgcolor="<?php echo $color;?>"><?php  echo $row['course_code'];?></td>
                <td bgcolor="<?php echo $color;?>"><?php  echo $row['course_name'];?></td>
                <td bgcolor="<?php echo $color;?>"><?php  echo $row['cr_hr'];?></td>
                <td>
                  <form action="#" method="POST">
                      <input type="hidden" name="course_id" value="<?php echo $row['id']; ?>">
                      <input type="hidden" name="session" value="<?php echo $sessionId ?>">
                      <input type="hidden" name="dept_id" value="<?php echo $deptId ?>">
              <div class="col-6" style="margin-right: 50px; margin-left: 50px;">
                 <div class="form-group" >
                 <?php 
                 $staff_id = $_SESSION['user_id'];
              $req = mysqli_query($con,"SELECT *FROM staff WHERE s_id = $staff_id");
               $rowd = mysqli_fetch_array($req);
                $dept_id = $rowd['Department']; 

                $query1 = mysqli_query($con,"SELECT *FROM staff WHERE Department = $dept_id ORDER BY Fname ASC");                       
                  $count = mysqli_num_rows($query1);
                   if($count > 0){                       
                   echo ' <select required name="inst_id" class="custom-select form-control">';
                     echo'<option value="">--Select Instructor--</option>';
                      while ($row = mysqli_fetch_array($query1)) {
                      echo "<option value='".$row['s_id']."' "; 
                                if(isset($_POST['dep']) && $_POST['dep'] == $row['s_id']) //keep order of option
                                echo "selected";
                                echo " >".$row['Fname']." ".$row['Lname']."</option>";
                       }
                   echo '</select>';
                       }
                      ?> 
                       </div>
                            </div>
                 </td>

                
                  <td><input type="submit" name="assign" class="btn btn-success" value="Assign">  
                   </form>
                </td>
                </tr>
                <?php 
                    $cnt=$cnt+1;
                }
            }?>
                                                                       
                </tbody>
            </table>
                <?php  

                     if (isset($_POST['assign'])) {
                $deptId = $_POST['dept_id'];
                $course_id = $_POST['course_id'];
                $sess = $_POST['session'];
                $instid = $_POST['inst_id'];


                $que = mysqli_query($con,"SELECT inst_assign.inst_id,inst_assign.course_id,inst_assign.session_id,course.cr_hr,course.id,session.id,session.status FROM inst_assign INNER JOIN course ON course.id = inst_assign.course_id 
                    INNER JOIN session ON session.id = inst_assign.session_id
                     WHERE inst_assign.inst_id = '$instid' AND inst_assign.session_id = '$sess' ");

                $credit_hour = 0;
                $cont = mysqli_num_rows($que);

                if ($cont>0) {
                
                while($rw = mysqli_fetch_array($que)){
                   
                   $credit_hour += $rw['cr_hr'];
                  }

              }
             if($credit_hour<=14){
             $qwr = mysqli_query($con,"SELECT inst_assign.course_id,inst_assign.session_id,session.status FROM inst_assign INNER JOIN session ON session.id = inst_assign.session_id
                WHERE inst_assign.course_id = '$course_id' AND inst_assign.session_id = '$sess'");

               $can = mysqli_num_rows($qwr);
               if ($can == 0) {

                 
             
             $query = "INSERT INTO inst_assign values ('','$instid','$deptId','$course_id','$sess','1')";
            $res = mysqli_query($con,$query);
            if ($res) {
                 echo "<script type = 'text/javascript'> 
                        alert('course assigned successfully');
                            </script>";
            }
             else{
                 echo "<script type = 'text/javascript'> 
                        alert('course is not assigned');
                            </script>";
             }
              }
             
             else{ 
              echo "<script type = 'text/javascript'> 
                        alert('This course is assigned to other instructror');
                            </script>";
             }
         }
              else{
                 echo "<script type = 'text/javascript'> 
                        alert('Instructor credit hour is now $credit_hour, please assign to other lectur');
                            </script>";
              }
        }
                ?>
            </div>
        </div>
    </div>
</div>
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