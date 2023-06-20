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
        

        error_reporting(0);
                   ?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Approval page</title>
	
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
    <td style="padding-bottom: 30px;">
        <?php
       
        $res = mysqli_query($con,"SELECT * FROM student WHERE Request= 'pending' ");
        $count = mysqli_num_rows($res);
             if ($count>0) {
            echo "<script type = 'text/javascript'> 
             alert(' you have $count Applicant');
            </script>";
             }
        ?>
        
    <div class="container">

         <table class="table table-striped table-bordered table-hover" border="1" style="top: 0; margin-top: 20px; margin-left: -350px;">
            <tr>
                <td colspan="19">
                  
                  <font style="font-weight: bold; font-size: 3">Students:  <?php  echo "$count" ?></font>
                </td>
            </tr>
            <tr>
                <th class="t_th" width="30px"> Fname</th>
                <th class="t_th" width="30px">Mname</th>
                <th class="t_th" width="200px"> Lname </th>
                <th class="t_th" width="200px"> DOB </th>
                <th class="t_th" width="200px"> Gender </th>
                <th class="t_th" width="200px"> Mother name </th>
                <th class="t_th" width="200px"> Nationality </th>
                <th class="t_th" width="200px"> Departiment </th>
                <th class="t_th" width="200px"> Email </th>
                <th class="t_th" width="50px"> Phone </th>
                <th class="t_th" width="100px">Zone</th>
                <th class="t_th" width="100px">Woreda</th>
                <th class="t_th" width="100px">Kebele</th>
                <th class="t_th" width="100px">Elementary</th>
                <th class="t_th" width="100px">Preparatory</th>
                <th class="t_th" width="100px">Doc Download</th>
                <th class="t_th" width="100px">Request</th>
                <th class="t_th" width="100px">Request</th>
            </tr>
           
              <?php
              include('connection.php');
              error_reporting(0);
                $sql="SELECT *FROM student WHERE Request = 'pending'  ";
                $res=mysqli_query($con,$sql);

                while ($rows=mysqli_fetch_assoc($res)) {
               
               $first_name = $rows['Fname'];
               $email = $rows['Email'];
                $dept=$rows['Dept_id'];
                $file = $rows['Upload_doc'];
              $deptt=mysqli_query($con,"SELECT dept_name FROM department WHERE dept_id='$dept'");
              $rowss=mysqli_fetch_array($deptt);
              echo "<tr>";
              echo "<td >" .$rows['Fname']."</td>";  
              echo "<td >" .$rows['Mname']."</td>";
              echo "<td >" .$rows['Lname']."</td>";
              echo "<td >" .$rows['DOB']."</td>";
              echo "<td >" .$rows['sex']."</td>";
              echo "<td >" .$rows['Mother_name']."</td>";
              echo "<td >" .$rows['Nationality']."</td>";
              echo "<td >" .$rowss['dept_name']."</td>";
              echo "<td >" .$rows['Email']."</td>";
              echo "<td >" .$rows['Phone']."</td>";
              echo "<td >" .$rows['Zone'] ."</td>"; 
              echo "<td >" .$rows['Woreda'] ."</td>"; 
              echo "<td >" .$rows['Kebele'] ."</td>"; 
              echo "<td >" .$rows['Elementary'] ."</td>"; 
              echo "<td >" .$rows['Preparatory'] ."</td>"; 
              echo "<td >" ."<a href='Documents/$file'><i class='fa fa-download'></i>"."</td>"; 
              ?>
              <td>
                  <form action="#" method="POST">
                      <input type="hidden" name="id" value="<?php echo $rows['stud_id']; ?>">
                      <input type="submit" class="btn btn-success" name="Approve" value="Approve">
              </td>
             <td>
          <input type="submit" name="deny" class="btn btn-danger" value="Deny">
                  </form> 
       </td> 
         <?php
         echo" </tr> "; 
          }
          ?>
            
          </table>
   
</div>
                     <?php 

         if (isset($_POST['Approve']) && !empty($first_name)) {
           $id = $_POST['id'];

        $res = mysqli_query($con,"UPDATE student SET Request='Approved' WHERE stud_id = '$id' ");
           
           
          if ($res) {
              
                    $string="abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                    $password = substr(str_shuffle($string),0,6);
                      
                     $last_id= $id;

                     if ($last_id) {
                        $username = "HRU/DS".$last_id."/".date('y');
                     
                    $query2="INSERT INTO student_account(id,student_id,Uname ,Password,  Role, Status) VALUES ('','$last_id','$username','$password','student','1')";
                    $query3=mysqli_query($con,$query2);
                  
                   $to=$email;
                   $subject= "your username and password";
                   $message= "your username is $username  and your password is $password";
                   mail($to,$subject,$message);
                  
                    if($query3){
                     echo "<script type = 'text/javascript'> 
                        alert('Account $first_name created successfully, we have sent username and password to your email -$email');
                          </script>";
                          header('location: screening.php');
                    } 
                    else
                    {
                         echo "<script type = 'text/javascript'> 
                        alert('Account $first_name is not created please try again later');
                            </script>";
                            header('location: screening.php');
                          print ( mysqli_error($con));

                    }}
                
            }
                else{
                    echo "<script type = 'text/javascript'> 
                        alert('Account is not created please try again later');
                          </script>";
                          header('location: screening.php');
                 }       
             
         }
         if (isset($_POST['deny']) && !empty($first_name)) {

                 $id = $_POST['id'];
                 $to = $email;

                   $subject= "your username and password";
                   $message= "your Application is not appropraite so, you are denied to register. you can contact us";
                   mail($to,$subject,$message);

            $id = $_POST['id'];       
            $query = mysqli_query($con, "DELETE FROM student WHERE stud_id = '$id' ");
              if ($query) {
              
          echo "<script type = 'text/javascript'> 
                        alert('request denied');
                          </script>";
                          header('location: screening.php');
         }
     }
        ?>

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