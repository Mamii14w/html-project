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
                   ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add department</title>
	
  <link rel="stylesheet" href="bootstrap-4.0.0-dist/css/bootstrap.min.css" >
  
  <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
     <script src="bootstrap-4.0.0-dist/js/bootstrap.min.js"></script> 
     <script src="bootsrap/js/all.js"></script> -->
  
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
    margin-left: 300px;
}

 </style>

</head>
<body >
 <table border="0" width="1280px" bgcolor="lightgrey" align="center"  >
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
           <li class="li"><a class="btn btn-default" href="Registrar_page.php"> Home</a></li>
           <li class="li">Registrar page</li>
           <li class="li"><?php echo date('d-m-y');?></li>
           
       </ul>              
 		</td>
 	</tr>
 	<tr>
 		<td height="500px" colspan="1" width="270px">
           
          <?Php 
              include('Side_bar_registrar.php');
           ?>
  
     </td>
     <td style="padding-bottom: 100px; ">

        <a style="margin-top: 10px;" class="btn btn-success" href="Add_dept_form.php" > +Add </a> <font size="4" face="monotype corsiva"  style="font-weight: bold; margin-top: 50px">Departments </font>
        
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

         <table class="table table-striped table-bordered table-hover" border="1" style="top: 0; margin-top: 20px; margin-left: -80px;">
            <tr>
                <td colspan="4"> 
                   <?php 
                   include('connection.php'); 
                     $sql="SELECT *FROM department";
                    $res=mysqli_query($con,$sql);
                    $count=mysqli_num_rows($res);   
                   ?>
                  <font style="font-weight: bold; font-size: 3">Departments:  <?php  echo "$count" ?></font>
                </td>
            </tr>
            <tr>
                <th class="t_th" width="30px"> # </th>
                <th class="t_th" width="350px"> Name </th>
                <th class="t_th" width="100px"> Action </th>
            <th class="t_th" width="100px">Action</th>
            </tr>
              <?php
              
                $sql="SELECT *FROM department";
                $res=mysqli_query($con,$sql);
                $count=mysqli_num_rows($res);
                while ($rows=mysqli_fetch_assoc($res)) {
               ?>
              <tr>
                <td class="t_td"><?php echo "{$rows['dept_id']}"; ?></td>
                  <td class="t_td"><?php echo "{$rows['dept_name']}"; ?></td>
              
               <td class="t_td"><a href= "update_dept.php?d_id=<?php echo $rows['dept_id'];?>" title="Edit Session Details" ><i class="fa fa-edit fa-1x"></i></a>
               </td>
               <td class="t_td">
              <a onClick= "return confirm('Are you sure you want to delete')" 
                 href="delete_dept.php?d_id=<?php echo $rows['dept_id'];?>" title="Delete Session" > <i class="fa fa-trash fa-1x"></i></a> 
               </td>
             
              </tr>
              <?php
                }
              ?>
          </table>
   
</div>

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