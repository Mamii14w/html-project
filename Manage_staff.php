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
                   ?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Manage staff</title>
	
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
           <li class="li"><a class="btn btn-default" href="Admin_page.php"> Home</a></li>
           <li class="li">Admin page</li>
           <li class="li"><?php echo date('d-m-y');?></li>
           
       </ul>              
 		</td>
 	</tr>
 	<tr>
 		<td height="500px" colspan="1" width="270px">
           
          <?Php 
              include('Side_bar_admin.php');
           ?>
  
     </td>
     <td style="padding-bottom: 100px;">

        <a style="margin-top: 10px;" class="btn btn-success" href="crt_staff_account.php" > +Add </a> <font size="4" face="monotype corsiva"  style="font-weight: bold; margin-top: 50px">Staffs </font>
        
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
                <td colspan="12">
                   <?php 
                   include('connection.php'); 
                     $sql="SELECT *FROM staff";
                    $res=mysqli_query($con,$sql);
                    $count=mysqli_num_rows($res);   
                   ?>
        <font style="font-weight: bold; font-size: 20; font-family: italic;">Staffs:  <?php  echo "$count" ?></font>
                </td>
            </tr>
            <tr>
                <th class="t_th" width="30px"> # </th>
                <th class="t_th" width="30px"> Status</th>
                <th class="t_th" width="200px"> user name </th>
                <th class="t_th" width="200px"> Fname </th>
                 <th class="t_th" width="200px"> Lname </th>
                 <th class="t_th" width="200px"> Department </th>
                  <th class="t_th" width="200px"> Sex </th>
                   <th class="t_th" width="200px"> Phone </th>
                    <th class="t_th" width="200px"> Email </th>
                    <th class="t_th" width="200px"> Role </th>
                <th class="t_th" width="50px"> Action </th>
            <th class="t_th" width="100px">Action</th>
            </tr>
              <?php
              include('connection.php');
                $sql="SELECT *FROM staff_account INNER JOIN staff ON staff_account.Staff_id=staff.s_id";
                $res=mysqli_query($con,$sql);
                
                if ($count>0) {
                   
             $num = 1;
                while ($rows=mysqli_fetch_assoc($res)) {
               $id = $rows['s_id'];
               $dept=$rows['Department'];
              $deptt=mysqli_query($con,"SELECT *FROM department WHERE dept_id='$dept'");
              $rowss=mysqli_fetch_array($deptt);

             echo "<tr>";
              echo "<td >" .$num."</td>";
              if($rows['Status']==1)
                    {

                        echo"<td ><a class='btn btn-success' href = 'deactivate_staff.php?enable=".$id."'>
                        <span  title='disable' onclick='isendis();'>Activated</span></a></td>";
                    }
                    else if($rows['Status']==0)
                    {
                       echo"<td style='height:30px;' align = 'center' width = '1'><a class='btn btn-warning' href = 'activate_staff.php?disable=".$id."'>
                       <span  title='enable' onclick='isendis();'>Deactivated</span></a></td>";
                    }   
              echo "<td >" .$rows['Uname']."</td>";
              echo "<td >" .$rows['Fname']."</td>";
              echo "<td >" .$rows['Lname']."</td>";
              echo "<td >" .$rowss['dept_name']."</td>";
              echo "<td >" .$rows['sex']."</td>";
              echo "<td >" .$rows['Pnumber']."</td>";
              echo "<td >" .$rows['Email']."</td>";
              echo "<td >" .$rows['Role'] ."</td>";
              ?>
         <!--   echo "<td> <a onClick=\" javascript:return confirm('Are you sure to delete')\" 
                class='btn btn-danger' href='delete_staff.php?s_id={$rows['s_id']}'> Delete</a>" 
               ."</td>";
             
             echo "<td ><a class='btn btn-warning' href='update_staff.php?s_id={$rows['s_id']}'> Edit</a>" ."</td>"; -->
             <td><a href="update_staff.php?s_id=<?php echo $rows['id'];?>" title="Edit student Details"><i class="fa fa-edit fa-1x"></i></a></td>
              <td><a onclick="return confirm('Are you sure you want to delete?')" href="delete_staff.php?s_id={<?php echo $rows['id'];?>" title="delete student"><i class="fa fa-trash fa-1x"></i></a></td>
             <?php
             $num++;
                }
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