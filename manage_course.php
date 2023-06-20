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
      <td style="padding-bottom: 100px;">

        <a style="margin-top: 10px;" class="btn btn-success" href="Add_course.php" > +Add </a> <font size="4" face="monotype corsiva"  style="font-weight: bold; margin-top: 50px">Courses </font>
        
    <div class="container">
        
     
        <?php
           if (isset($_SESSION['msg'])) {
            $val = $_SESSION['msg'];
            echo "<script type = 'text/javascript'> 
             alert(' $val');
            </script>";
           }
           unset($_SESSION['msg']); 
        ?>

         <table  class="table table-striped table-bordered table-hover" border="1" style="top: 0; margin-top: 20px; margin-left: -80px;">
            <tr>
                <td colspan="8">
                   <?php 
                   include('connection.php'); 

                   $staff_id = $_SESSION['user_id'];
              $req = mysqli_query($con,"SELECT *FROM staff WHERE s_id = $staff_id");
               $rowd = mysqli_fetch_array($req);
                $dep = $rowd['Department']; 

                     $sql="SELECT *FROM course WHERE dept_id = '$dep'";
                    $res=mysqli_query($con,$sql);
                    $count=mysqli_num_rows($res);   
                   ?>
        <font style="font-weight: bold; font-size: 20; font-family: italic;">Courses:  <?php  echo "$count" ?></font>
                </td>
            </tr>
            <tr>
                <th class="t_th" width="30px"> # </th>
                <th class="t_th" width="200px"> Course Code</th>
                <th class="t_th" width="200px"> Course Title</th>
                <th class="t_th" width="200px"> Cr.Hr </th>
                 <th class="t_th" width="200px"> Year </th>
                 <th class="t_th" width="200px"> Term </th>
                <th class="t_th" width="50px"> Action </th>
            <th class="t_th" width="100px">Action</th>
            </tr>
              <?php
              include('connection.php');
              

              $staff_id = $_SESSION['user_id'];
              $req = mysqli_query($con,"SELECT Department FROM staff WHERE s_id = $staff_id");
               $rowd = mysqli_fetch_array($req);
              $dep = $rowd['Department'];
                $sql="SELECT *FROM course WHERE dept_id = $dep ";
                $res=mysqli_query($con,$sql);
                $num=1;
                if ($count>0) {
             
                while ($rows=mysqli_fetch_assoc($res)) {
               

             echo "<tr>";
              echo "<td >" .$num."</td>";
              
              echo "<td >" .$rows['course_code']."</td>";
              echo "<td >" .$rows['course_name']."</td>";
              echo "<td >" .$rows['cr_hr']."</td>";
              echo "<td >" .$rows['year']."</td>";
              echo "<td >" .$rows['term']."</td>";

            echo "<td> <a onClick=\" javascript:return confirm('Are you sure to delete')\" 
                class='btn btn-danger' href='delete_course.php?c_id={$rows['id']}'> Delete</a>" 
               ."</td>";
             
             echo "<td ><a class='btn btn-warning' href='update_course.php?c_id={$rows['id']}'> Edit</a>" ."</td>";
             $num++;

                }
                   }
              ?>
          </table>
   
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