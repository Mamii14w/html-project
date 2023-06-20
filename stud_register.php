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
     include('connection.php');
                   ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registrar page</title>
	
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
           <li class="li"><a class="btn btn-default" href="Registrar_page.php"> Home</a></li>
           <li class="li">Registrar page</li>
           <li class="li"><?php echo date('d-m-y');?></li>
           <li class="li"><a id="logout" class="btn btn-primary" href="logout.php"> Logout</a></li>
       </ul>              
        </td>
    </tr>
 	<tr>
 		<td height="400px" colspan="2">
           <?Php 
              include('Side_bar_registrar.php');
           ?>
     </td>
     <td width="500px" colspan="4">

       <div id="right-panel" class="right-panel">

       <form method="POST" action="#">
         <div class="row" style="margin-right: 100px;">
            <div class="col-6">
                 <div class="form-group">
                  <label for="x_card_code" class="control-label mb-1">student username: </label>
                 <input type="text" name="uname" class="form-control" placeholder="student username">
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
                                     echo'<option value="'.$row['term_id'].'" >'.$row['term_name'].'</option>';
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
      if (isset($_POST['submit'])) {
          $user_name = $_POST['uname'];
          $year  = $_POST['yearId'];
          $term = $_POST['termId'];
        $session = $_POST['sessionId'];

        $query = mysqli_query($con,"SELECT *FROM student_account INNER JOIN student ON student_account.student_id=student.stud_id WHERE student_account.Uname = '$user_name' ");
         $count = mysqli_num_rows($query);
        
         if ($count>0) {
        $row =  mysqli_fetch_array($query);
         $student_id = $row['student_id'];
         $dept = $row['Dept_id'];
           $wew = mysqli_query($con,"SELECT *FROM student_course WHERE stud_id = '$student_id' AND session = '$session' ");
           $con = mysqli_num_rows($wew);
           if ($con > 0) {
               echo "<script type = 'text/javascript'> 
                        alert('The student is registered previously for the semister');
                            </script>";
           }
         
             
    
          else {

              $qew = "INSERT INTO  student_course VALUES ('' ,'$student_id','$dept','$year','$term','$session','1')"; 
              $ress = mysqli_query($con,$qew);
              if ($ress) {
                  echo "<script type = 'text/javascript'> 
                        alert('The student is registered successfully');
                            </script>";
              }
              else{
                echo "<script type = 'text/javascript'> 
                        alert('error is occured please try again later');
                            </script>";
              }

          }


     }
         else{
             echo "<script type = 'text/javascript'> 
                        alert('Username is not found please inseret the correct one');
                            </script>";
         }

        
      }

       ?>
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