
<?php 
            session_start();
           if(isset($_SESSION["username"])) 
        {
            if($_SESSION['role'] == 'admin')
                die(header('location:Admin_page.php')); 
            else if($_SESSION['role'] == 'registrar officer')
                die(header('location:Registrar_page.php'));
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
	<title>Student page</title>
	
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
           <li class="li"><a class="btn btn-default" href="Student_page.php"> Home</a></li>
           <li class="li">Student page</li>
           <li class="li"><?php echo date('d-m-y');?></li>
           <li class="li"><a id="logout" class="btn btn-primary" href="logout.php"> Logout</a></li>
       </ul>              
        </td>
    </tr>
 	<tr>
 		<td height="400px" colspan="2">
           <?Php 
              include('Side_bar_student.php');
           ?>
     </td>
     <td width="500px" colspan="4"><font color="red" size="4" style=" font-weight: bold; ">
     	 <?php
         include('connection.php');
        
           if (isset($_SESSION["student_id"])) {
            $student_id = $_SESSION["student_id"];
            $sql = mysqli_query($con,"SELECT *FROM student WHERE stud_id = '$student_id' ");
            $row = mysqli_fetch_array($sql);
           
            echo "Welcome  ".$row['Fname']. " ".$row['Mname'] ;
           }
          unset($_SESSION['student_id']); 
        ?>
    </font>
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